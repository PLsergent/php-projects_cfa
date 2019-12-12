<?

// POST
if (!empty($_POST)) {

    $query = new MongoDB\Driver\Query(["username" => $_POST["username"]]);
    $login = $mng->executeQuery("blog.users", $query)->toArray();
    
    if (empty($login)) {
        header('Location: index.php?ctrl=login&error=username');
        exit();    
    } else {
        $db_pswd = $login[0]->password;

        if ($db_pswd != sha1($_POST["password"])) {
            header('Location: index.php?ctrl=login&error=password');
            exit(); 
        } else {
            $_SESSION["username"]=$_POST["username"];
            // Redirect to blog
            header('Location: index.php');      
            exit();
        }
    }
}