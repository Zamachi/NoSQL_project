<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once './Neo4jManagement.php';

$start = microtime(1);
$clientNosql->run('MATCH (a:Attribute)
DETACH DELETE a');
$vremetrajanja = microtime(1) - $start;
?>
<html>
    <body>
        <hr>
        <h1>
            Engine koriscen je: Neo4j <br>
        </h1>
        <hr><br><hr>
       <div>
           <p>
               Vreme trajanja brisanja: <?php echo $vremetrajanja;?>
           </p>
        </div>
    </body>
</html>