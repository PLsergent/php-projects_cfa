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

// form post
$occ_users = array("Vincent" => 0, "Thomas" => 0, "David" => 0, "Christophe" => 0);

foreach($_POST as $date => $value) {
    foreach($occ_users as $name => $occ) {
        if ($value == $name) {
            $occ_users[$name]++;
            // Get user
            $query_user = new MongoDB\Driver\Query(["name" => $name]);
            $user = $mng->executeQuery("planning.users", $query_user)->toArray();

            // insert assignment in db
            $bulk = new MongoDB\Driver\BulkWrite;
            $new_assignment = ['_id' => new MongoDB\BSON\ObjectId, 'user_id' => new \MongoDB\BSON\ObjectId($user[0]->_id), 'assign' => $date];
            $bulk->insert($new_assignment);
            $result = $mng->executeBulkWrite('planning.assignments', $bulk);
        }
    }
    
}

asort($occ_users);

require_once("./templates/v_calendar.php");