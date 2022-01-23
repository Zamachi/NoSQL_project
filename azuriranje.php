<?php

$konekcija = new mysqli('127.0.0.1','','', 'nosql');

$id = (int) $_REQUEST['id_entiteta'];

$merenje_izmene_svih = 0;
$merenje_izmene_sa_uslovom = 0;

$Entities = [];

$start = microtime(1);
$result = $konekcija->query('select * from Entity');
while ($Entity = mysqli_fetch_object($result))
{
    $result2 = $konekcija->query("select * from Attribute where Entity_ID={$Entity->ID}");
    while ($Attribute = mysqli_fetch_object($result2))
    {
        $Upit = "Update Attribute set Value='IZMENJEN' where Entity_ID={$Entity->ID} and Name='{$Attribute->Name}'";
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
               Vreme trajanja azuriranja: <?php echo $vremetrajanja;?>
           </p>
        </div>
    </body>
</html>