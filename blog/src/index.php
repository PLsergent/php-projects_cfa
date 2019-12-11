<?php

require_once("./controllers/getUsers.php");
require_once("./controllers/getPosts.php");

if (isset($_GET['ctrl'])) {
    $ctrl = $_GET['ctrl'];
} else {
    $ctrl = 'home';
}
require_once('./controllers/c_' . $ctrl . '.php');