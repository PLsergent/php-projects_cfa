<?

// POST
if (!empty($_POST)) {
    $date = new DateTime('now');

    $bulk = new MongoDB\Driver\BulkWrite();
    $new_resp = array(
        "title" => $_GET["title"],
        "user" => $_GET["user"],
        "date" => $date->format("Y-m-d H:i:s"),
        "content" => $_GET["content"],
        "responses" => []
    );
    $i = 0;
    $response_insert = "responses";
    while($i < intval($_GET["id"])) {
        $response_insert = $response_insert . ".responses";
        $i++;
    }

    $bulk->update(
        array("_id" => new \MongoDB\BSON\ObjectId($_GET["id"])), 
        array('$push' => array($response_insert => $new_resp))
    );

    // Redirect to blog
    header('Location: index.php');      
    exit();
}