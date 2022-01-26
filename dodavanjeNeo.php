<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once './Neo4jManagement.php';

$br_entiteta = (int) $_REQUEST['br_entiteta_neo4j'];
$br_atributa = (int) $_REQUEST['br_atributa_neo4j'];

$clientNosql->run('MATCH (n)
DETACH DELETE n');

$pocetak_merenja = microtime(true);
// Dodavanje entiteta i atributa u bazu
$query = "CREATE";
for ($i=0; $i < $br_atributa; $i++) { 
    $query= $query . "(a{$i}:Attribute{Name: 'A{$i}', Value: 'A{$i}'}),";
}

for ($i=0; $i < $br_entiteta; $i++) { 
    $query = $query . "(e{$i}:Entity{}),";
}
for ($i=0; $i < $br_entiteta; $i++) { 
    for ($j=0; $j < $br_atributa; $j++) { 
        $query = $query . "((e{$i})-[:POSEDUJE]->(a{$j})),";
    }
}
$query = substr($query, 0, strlen($query)-1);
$clientNosql->run($query);
$kraj_svih_upisa = microtime(true) - $pocetak_merenja;
?>

<html>
    <body>
        <hr>
        <h1>
            Engine koriscen je: Neo4j<br>
            Broj entiteta je: <?php echo $br_entiteta; ?> <br>
            Broj atributa je: <?php echo $br_atributa; ?> <br>
        </h1>
        <hr><br><hr>
        <div>
            <p>
                Sveukupno je trajalo: <?php echo $kraj_svih_upisa;?>&nbsp; sekundi.
            </p>
        </div>
        <hr>
    </body>
</html>