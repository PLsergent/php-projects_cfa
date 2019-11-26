<?php

require_once("./connexion.php");

// get mondays
$mondays = array();

$date = $date = new DateTime('2019-01 monday');
$thisYear = $date->format('y');

while($date->format('y') === $thisYear) {
    array_push($mondays , $date->format("d-m-y"));
    $date->modify("next Monday");
}

// get users
$query = new MongoDB\Driver\Query([]);
$users = $mng->executeQuery("planning.users", $query)->toArray();

require_once("./templates/v_calendar.php");