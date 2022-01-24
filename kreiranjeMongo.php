<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once "./mongoDBManager.php";

$mongoDBDatabase->createCollection("Attributes");
$mongoDBDatabase->createCollection("Entities");

?>