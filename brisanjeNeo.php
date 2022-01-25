<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once './Neo4jManagement.php';

$client->run('DROP DATABASE nosql IF EXISTS');
?>