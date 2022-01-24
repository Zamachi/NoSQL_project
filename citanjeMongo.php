<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once "./mongoDBManager.php";

$merenje_izmene_svih = 0;
$merenje_izmene_sa_uslovom = 0;
$thingsToDisplay = [];
$brojac = 1;

$start = microtime(1);
$sviEntiteti = $entities->find();
foreach ($sviEntiteti as $entitet) {

    $atributi = $attributes->find(['EntityID' => $entitet['_id']]);
    foreach ($atributi as $key => $value) {
        array_push($thingsToDisplay, [
            'No.' => $brojac++,
            'EntityID' => $value['EntityID'],
            'Name' => $value['Name'],
            'Value' => $value['Value']
        ]);
    }
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