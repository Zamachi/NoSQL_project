<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once "./mongoDBManager.php";

$br_entiteta = (int) $_REQUEST['br_entiteta_mongo'];
$br_atributa = (int) $_REQUEST['br_atributa_mongo'];

$merenja_dodavanja_entiteta=[];
$merenja_dodavanja_atributa=[];
$merenje_jedne_iteracije=[];

$pocetak_merenja = microtime(true);
for ($i=0; $i < $br_entiteta; $i++) { 
    $pocetak_merenja_jedne_iteracije = microtime(true); //merimo celu iteraciju ($i)
    
    $pocetak_merenja_dodavanja_entiteta = microtime(true); //merimo dodavanje jednog reda u tabeli Entity
    $entityInsertResult = $entities->insertone([]);
    
    array_push($merenja_dodavanja_entiteta, ( microtime(true) - $pocetak_merenja_dodavanja_entiteta ));
    
    $pocetak_merenja_dodavanja_atributa = microtime(true);//merimo dodavanje jednog reda u tabeli Attribute
    for ($j=0; $j < $br_atributa ; $j++) { 
        $attributes->insertone([
            "Name" => "A{$j}",
            "Value" => "V{$j}",
            "EntityID" => $entityInsertResult->getInsertedId()
        ]);
    }

    array_push($merenja_dodavanja_atributa, ( microtime(true) - $pocetak_merenja_dodavanja_atributa ));
    
    array_push($merenje_jedne_iteracije, ( microtime(true) - $pocetak_merenja_jedne_iteracije ));
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
        <hr><br><hr>
        <div>
            <h2>
                Dodavanje entiteta
            </h2><br>
            <p>
                Dodavanje jednog cvora u proseku traje: <?php echo array_sum($merenja_dodavanja_entiteta)/count($merenja_dodavanja_entiteta); ?>&nbsp; sekundi. 
            </p>
            <p>
                Dodavanje svih cvorova trajalo je: <?php echo array_sum($merenja_dodavanja_entiteta); ?>&nbsp; sekundi. 
            </p>
        </div>
        <hr><br><hr>
        <div>
            <h2>
                Dodavanje Atributa
            </h2><br>
            <p>
                Dodavanje jednog cvora u proseku traje: <?php echo array_sum($merenja_dodavanja_atributa)/count($merenja_dodavanja_atributa); ?>&nbsp; sekundi. 
            </p>
            <p>
                Dodavanje svih cvorova trajalo je: <?php echo array_sum($merenja_dodavanja_atributa); ?>&nbsp; sekundi. 
            </p>
        </div>
        <hr><br><hr>
        <div>
            <h2>
                Jedna iteracija
            </h2><br>
            <p>
                Jedna iteracija u proseku traje: <?php echo array_sum($merenje_jedne_iteracije)/count($merenje_jedne_iteracije); ?>&nbsp; sekundi. 
            </p>
            <p>
                Cela for petlja: <?php echo array_sum($merenje_jedne_iteracije); ?>&nbsp; sekundi. 
            </p>
        </div>
        <hr><br><hr>...
        <div>
            <p>
                Sveukupno je trajalo: <?php echo $kraj_svih_upisa;?>&nbsp; sekundi.
            </p>
        </div>
        <hr>
    </body>
</html>

