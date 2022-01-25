<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once "./mongoDBManager.php";

$br_entiteta = (int) $_REQUEST['br_entiteta_mongo'];
$br_atributa = (int) $_REQUEST['br_atributa_mongo'];

$pocetak_merenja = microtime(true);
for ($i=0; $i < $br_entiteta; $i++) { 
    $entityInsertResult = $entities->insertone([]);
    for ($j=0; $j < $br_atributa ; $j++) { 
        $attributes->insertone([
            "Name" => "A{$j}",
            "Value" => "V{$j}",
            "EntityID" => $entityInsertResult->getInsertedId()
        ]);
    }
}
$kraj_svih_upisa = microtime(true) - $pocetak_merenja;
?>

<html>
    <body>
        <hr>
        <h1>
            Engine koriscen je: WireTiger storage engine za MongoDB <br>
            Broj entiteta je: <?php echo $br_entiteta; ?> <br>
            Broj atributa je: <?php echo $br_atributa; ?> <br>
        </h1>
        <div>
            <p>
                Sveukupno je trajalo: <?php echo $kraj_svih_upisa;?>&nbsp; sekundi.
            </p>
        </div>
        <hr>
    </body>
</html>

