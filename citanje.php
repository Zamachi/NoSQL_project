<?php

$konekcija = new mysqli('127.0.0.1','root','', 'nosql');

$thingsToDisplay = [];
$brojac = 1;

$start = microtime(1);
$sviEntiteti = $konekcija->query("SELECT * FROM Entity");
while ($entitet = mysqli_fetch_object($sviEntiteti)) {

    $atributi = $konekcija->query("select * from Attribute where Entity_ID={$entitet->ID}");
    while ($atribut = mysqli_fetch_object($atributi)) {
        array_push($thingsToDisplay, [
            'No.' => $brojac++,
            'EntityID' => $atribut->Entity_ID,
            'Name' => $atribut->Name,
            'Value' => $atribut->Value
        ]);
    }
}
$vremetrajanja = microtime(1) - $start;
$engine = $konekcija->query('
SELECT ENGINE
FROM   information_schema.TABLES
WHERE  TABLE_SCHEMA = \'nosql\'
LIMIT 1')->fetch_assoc()['ENGINE'];
?>

<html>

<body>
    <hr>
    <h1>
        Engine koriscen je: <?php echo $engine;?> za MySQL <br>
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