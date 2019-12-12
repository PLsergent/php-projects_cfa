<?

// POST
if (!empty($_POST)) {

    $query = new MongoDB\Driver\Query(["username" =>$_POST["username"]]);
    $verif = $mng->executeQuery("blog.users", $query)->toArray();

    if (!empty($verif)) {
        header('Location: index.php?ctrl=signup&error=username');      
        exit();
        }
    // Insert post in db
    $bulk = new MongoDB\Driver\BulkWrite;
    // New document insert in collection "posts"
    $new_user = [
        '_id' => new MongoDB\BSON\ObjectId,
        'username' => $_POST["username"],
        'password' => sha1($_POST["password"])
    ];
    $bulk->insert($new_user);
    $mng->executeBulkWrite('blog.users', $bulk);
    
    // Redirect to blog
    header('Location: index.php?ctrl=login');      
    exit();
}