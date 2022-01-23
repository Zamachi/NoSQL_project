<?php
$konekcija = new mysqli('127.0.0.1','root','', 'nosql');

$endzin = $_REQUEST['endzin'];

$konekcija->query('CREATE TABLE Entity(
    ID INTEGER UNSIGNED NOT NULL  AUTO_INCREMENT, PRIMARY KEY(ID)
)ENGINE='.$endzin);

$konekcija->query('
CREATE TABLE Attribute(
    Entity_ID INTEGER UNSIGNED NOT NULL,
    Name VARCHAR(64) NOT NULL,
    Value TEXT NULL,
    PRIMARY KEY(Name,Entity_ID),
    INDEX Attribute_FKIndex1(Entity_ID),
    FOREIGN KEY(Entity_ID) REFERENCES Entity(ID)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)ENGINE='.$endzin);

$konekcija->close();

?>