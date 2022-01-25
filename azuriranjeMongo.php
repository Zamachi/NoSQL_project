<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once "./mongoDBManager.php";

$merenje_izmene_svih = 0;
$merenje_izmene_sa_uslovom = 0;

$start = microtime(1);
$sviEntiteti = $entities->find();

foreach ($sviEntiteti as $entitet) {

    $atributiZaDatiID = $attributes->find([ 'EntityID' => $entitet['_id']]);
    foreach ($atributiZaDatiID as $attribute) {
       $attributes->updateOne([
           '$and' => [
               ['EntityID' => $entitet['_id'],
               'Name' => $attribute['Name']]
           ]
       ], [
           '$set' => [ 'Value' => 'IZMENJEN']
       ]); 
    }
    // $attributes->updateMany(
    //     ['EntityID' => $entitet['_id']],
    //     [ '$set' => [ 'Name' => 'IZMENJEN', 'Value' => 'IZMENJEN']]
    // );
}
$vremetrajanja = microtime(1) - $start;
?>

<html>

<body>
    <hr>
    <h1>
        Engine koriscen je: WireTiger storage engine za MongoDB <br>
    </h1>
    <hr><br>
    <hr>
    <div>
        <p>
            Vreme trajanja azuriranja: <?php echo $vremetrajanja; ?>
        </p>
    </div>
</body>

</html>