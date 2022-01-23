<?php

$konekcija = new mysqli('127.0.0.1','root','', 'nosql');

$konekcija->query('DROP TABLE Attribute');
$konekcija->query('DROP TABLE Entity');

$konekcija->close();
?>