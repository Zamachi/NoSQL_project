<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once './Neo4jManagement.php';

$thingsToDisplay = [];
$brojac = 1;

$start = microtime(1);
$rezultati = $clientNosql->run("MATCH (e:Entity)-[:POSEDUJE]->(a:Attribute) RETURN ID(e) as EntityID,a.Value as Value, a.Name as Name");
foreach ($rezultati as $rezultat) {
    array_push($thingsToDisplay, [
        'No.' => $brojac++,
        'EntityID' => $rezultat->get('EntityID'),
        'Name' => $rezultat->get('Name'),
        'Value' => $rezultat->get('Value')
    ]);
}
$vremetrajanja = microtime(1) - $start;
?>
<html>

<body>
    <hr>
    <h1>
        Engine koriscen je: Neo4j <br>
    </h1>
    <hr><br>
    <hr>
    <h2>Ukupno vreme pronalaska je: <?php echo $vremetrajanja; ?></h2>
    <hr><br>
    <hr>
    <div>
        <table>
            <tr>
                <th>No.</th>
                <th>EntityID.</th>
                <th>Name</th>
                <th>Value</th>
            </tr>
            <?php
            foreach ($thingsToDisplay as $atribut) {
                echo "<tr>";
                    echo "<td>" . $atribut['No.'] . "</td>";
                    echo "<td>" . $atribut['EntityID'] . "</td>";
                    echo "<td>" . $atribut['Name'] . "</td>";
                    echo "<td>" . $atribut['Value'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>