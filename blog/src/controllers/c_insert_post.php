<?

// POST
if (!empty($_POST)) {
    $date = new DateTime('now');
    // Insert post in db
    $bulk = new MongoDB\Driver\BulkWrite;
    // New document insert in collection "posts"
    $new_assignment = [
        '_id' => new MongoDB\BSON\ObjectId,
        'title' => $_POST["title"],
        'user' => $_POST["user"],
        'date' => $date->format('Y-m-d H:i:s'),
        'content' => $_POST["content"],
        'responses' => []
    ];
    $bulk->insert($new_assignment);
    $mng->executeBulkWrite('blog.posts', $bulk);
    
    // Redirect to blog
    header('Location: index.php');      
    exit();
}