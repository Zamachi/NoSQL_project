<?php
    $databaseName = "nosql";

    $mongoDBManager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    
    $mongoDBDatabase = new MongoDB\Database($mongoDBManager, $databaseName);

    $attributes = new MongoDB\Collection($mongoDBManager, $databaseName, "Attributes");
    $entities = new MongoDB\Collection($mongoDBManager, $databaseName, "Entities");

?>