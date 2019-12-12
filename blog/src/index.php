<?php

require_once("./controllers/getUsers.php");
require_once("./controllers/getPosts.php");

if (isset($_GET['ctrl'])) {
    $ctrl = $_GET['ctrl'];
    if (isset($_GET['id']) && isset($_GET['indent'])) {
        $id = $_GET['id'];
        $indent = $_GET['indent'];
    }
} else {
    $ctrl = 'home';
}

require_once('./controllers/c_' . $ctrl . '.php');