<?

// POST
if (!empty($_POST)) {

    if (!empty($_SESSION["username"])) {
        $_POST["user"] = $_SESSION["username"];
    }

    $date = new DateTime('now');

    // Get ids
    $nested_resp = explode(",", $_GET["id"]);

    $query = new MongoDB\Driver\Query(["_id" => new \MongoDB\BSON\ObjectId($nested_resp[0])]);
    $parent_post = $mng->executeQuery("blog.posts", $query)->toArray();

    $new_resp = array(
        "title" => $_POST["title"],
        "user" => $_POST["user"],
        "date" => $date->format("Y-m-d H:i:s"),
        "content" => $_POST["content"],
        "responses" => []
    );

    $length = count($nested_resp);

    // Add element to the corresponding responses array (not clean)
    if ($length == 1) {
        array_push($parent_post[0]->responses, $new_resp);
    } else if ($length == 2) {
        array_push($parent_post[0]->responses[$nested_resp[1]]->responses, $new_resp);
    } else if ($length == 3) {
        array_push($parent_post[0]->responses[$nested_resp[1]]->responses[$nested_resp[2]]->responses, $new_resp);
    } else if ($length == 4) {
        array_push($parent_post[0]->responses[$nested_resp[1]]->responses[$nested_resp[2]]->responses[$nested_resp[3]]->responses, $new_resp);
    }

    // Delete old object
    $bulk_delete = new MongoDB\Driver\BulkWrite();
    $bulk_delete->delete(["_id" => new \MongoDB\BSON\ObjectId($nested_resp[0])]);
    $mng->executeBulkWrite('blog.posts', $bulk_delete);

    // Add updated object
    $bulk_insert = new MongoDB\Driver\BulkWrite();
    $bulk_insert->insert($parent_post[0]);
    $mng->executeBulkWrite('blog.posts', $bulk_insert);
    

    // Redirect to blog
    header('Location: index.php');      
    exit();
}