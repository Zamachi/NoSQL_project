<?php

$konekcija = new mysqli('127.0.0.1', 'root', '', 'nosql');

// Normalizacija ulaznih parametara
$br_entiteta = (int) $_REQUEST['br_entiteta'];
$br_atributa = (int) $_REQUEST['br_atributa'];

$konekcija->query('TRUNCATE TABLE Attribute');
$konekcija->query('TRUNCATE TABLE Entity');

$pocetak_merenja = microtime(true);
// Dodavanje entiteta i atributa u bazu
for ($i = 0; $i < $br_entiteta; $i++) {
    $result = $konekcija->query('insert into Entity values ()'); //insertuje Entitet(ima samo polje primarnog kljuca koje se automatski inkrem.)
    $entity_id = $konekcija->insert_id; //dohvatamo ID generisan AUTO_INCREMENT-om iz prethodnog query-ja ^
    for ($j = 0; $j < $br_atributa; $j++) {
        $resu1t = $konekcija->query("INSERT INTO Attribute (Entity_ID, `Name`, `Value`) VALUES ($entity_id, 'A{$j}', 'V{$j}')");
    }
}
$kraj_svih_upisa = microtime(true) - $pocetak_merenja;

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
        Broj entiteta je: <?php echo $br_entiteta; ?> <br>
        Broj atributa je: <?php echo $br_atributa; ?> <br>
    </h1>
    <hr><br>
    <hr>
    <div>
        <p>
            Sveukupno je trajalo: <?php echo $kraj_svih_upisa; ?>&nbsp; sekundi.
        </p>
    </div>
    <hr>
</body>

</html>