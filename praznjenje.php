<?php

$konekcija = new mysqli('127.0.0.1','root','', 'nosql');

$start = microtime(1);
$result = $konekcija->query('select * from Entity');
while ($Entity = $result->fetch_object())
{
    $result2 = $konekcija->query("select * from Attribute where Entity_ID={$Entity->ID}");
    while ($Attribute = $result2->fetch_object())
    {
        $Upit = "DELETE FROM Attribute where Entity_ID={$Entity->ID} and Name='{$Attribute->Name}'";
        $konekcija->query($Upit);
    }
}
$vremetrajanja = microtime(1) - $start;

$engine = $konekcija->query('
SELECT ENGINE
FROM   information_schema.TABLES
WHERE  TABLE_SCHEMA = \'nosql\'
LIMIT 1')->fetch_assoc()['ENGINE'];

$konekcija->close();
?>

<html>
    <body>
        <hr>
        <h1>
            Engine koriscen je: <?php echo $engine; ?> <br>
        </h1>
        <hr><br><hr>
       <div>
           <p>
               Vreme trajanja brisanja: <?php echo $vremetrajanja;?>
           </p>
        </div>
    </body>
</html>