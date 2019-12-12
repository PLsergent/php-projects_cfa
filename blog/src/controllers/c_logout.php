<?

unset($_SESSION["username"]);

// Redirect to blog
header('Location: index.php?ctrl=login');      
exit();