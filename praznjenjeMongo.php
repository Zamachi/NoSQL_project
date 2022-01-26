<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once "./mongoDBManager.php";

$start = microtime(1);
$sviEntiteti = $entities->find();
foreach ($sviEntiteti as $entitet) {

    $atributiZaDatiID = $attributes->find([ 'EntityID' => $entitet['_id']]);
    foreach ($atributiZaDatiID as $attribute) {
        $attributes->deleteMany([
            'EntityID' => $attribute['EntityID']
        ]);
    }
}
$vremetrajanja = microtime(1) - $start;
?>
<html>
    <body>
        <hr>
        <h1>
            Engine koriscen je: WireTiger <br>
        </h1>
        <hr><br><hr>
       <div>
           <p>
               Vreme trajanja brisanja: <?php echo $vremetrajanja;?>
           </p>
        </div>
    </body>
</html>