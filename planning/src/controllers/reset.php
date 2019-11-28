<?php

require_once("./connexion.php");

// Remove all documents from assigments collection to reset the calendar
$bulk_reset = new MongoDB\Driver\BulkWrite;
$all = [];
$bulk_reset->delete($all);
$mng->executeBulkWrite('planning.assignments', $bulk_reset);

// Redirect to calendar
header('Location: /');      
exit();
