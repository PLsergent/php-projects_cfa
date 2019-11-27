<?php

require_once("./connexion.php");

// Get mondays
$mondays = array();

$date = new DateTime('2019-01 monday');
$thisYear = $date->format('y');

while($date->format('y') === $thisYear) {
    array_push($mondays , $date->format("d-m-y"));
    $date->modify("next Monday");
}

// ===================================================================
// Get users
$query = new MongoDB\Driver\Query([]);
$users = $mng->executeQuery("planning.users", $query)->toArray();

// ===================================================================
// Statistics users occurrences
$occ_users = array("Vincent" => 0, "Thomas" => 0, "David" => 0, "Christophe" => 0);

// ===================================================================

// On form POST
if(!empty($_POST)) {

    // For each assignment date => name
    foreach($_POST as $date => $name) {

        // Get user from db
        $query_user = new MongoDB\Driver\Query(["name" => $name]);
        $user = $mng->executeQuery("planning.users", $query_user)->toArray();

        // Delete old assignment
        $bulk_old = new MongoDB\Driver\BulkWrite;
        $old_assignment = ['assign' => $date];
        $bulk_old->delete($old_assignment);
        $mng->executeBulkWrite('planning.assignments', $bulk_old);

        // Insert assignment in db
        $bulk = new MongoDB\Driver\BulkWrite;
        // New document insert in collection "assignments"
        $new_assignment = ['_id' => new MongoDB\BSON\ObjectId, 'user_id' => new \MongoDB\BSON\ObjectId($user[0]->_id), 'assign' => $date];
        $bulk->insert($new_assignment);
        $mng->executeBulkWrite('planning.assignments', $bulk);
        $result = $mng->executeQuery("planning.assignments", $query)->toArray();
    }

    // ===================================================================
    // Update statistics

    // Get all assignments
    $query_assign = new MongoDB\Driver\Query([]);
    $assignments = $mng->executeQuery("planning.assignments", $query_assign)->toArray();

    // For each assignments
    foreach($assignments as $value) {

        // Get the user
        $query_user = new MongoDB\Driver\Query(["_id" => new \MongoDB\BSON\ObjectId($value->user_id)]);
        $user = $mng->executeQuery("planning.users", $query_user)->toArray();

        // And increment the value $occ with key $user
        foreach($occ_users as $name => $occ) {
            if ($user[0]->name == $name) {
                $occ_users[$name]++;
            }
        }
    }
}

asort($occ_users);

require_once("./templates/v_calendar.php");