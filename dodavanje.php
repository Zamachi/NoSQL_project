<?php

$konekcija = new mysqli('127.0.0.1','root','', 'nosql');

// Normalizacija ulaznih parametara
$br_entiteta = (int) $_REQUEST['br_entiteta'];
$br_atributa = (int) $_REQUEST['br_atributa'];

$merenja_dodavanja_entiteta=[];
$merenja_dodavanja_atributa=[];
$merenje_jedne_iteracije=[];

$konekcija->query('TRUNCATE TABLE Attribute');
$konekcija->query('TRUNCATE TABLE Entity');

$pocetak_merenja = microtime(true);
// Dodavanje entiteta i atributa u bazu
for ($i=0; $i<$br_entiteta; $i++)
{
    $pocetak_merenja_jedne_iteracije = microtime(true); //merimo celu iteraciju ($i)
    
    $pocetak_merenja_dodavanja_entiteta = microtime(true); //merimo dodavanje jednog reda u tabeli Entity
    $result = $konekcija->query('insert into Entity values ()'); //insertuje Entitet(ima samo polje primarnog kljuca koje se automatski inkrem.)
    array_push($merenja_dodavanja_entiteta, ( microtime(true) - $pocetak_merenja_dodavanja_entiteta ));
    
    $entity_id = $konekcija->insert_id;//dohvatamo ID generisan AUTO_INCREMENT-om iz prethodnog query-ja ^
    
    $pocetak_merenja_dodavanja_atributa = microtime(true);//merimo dodavanje jednog reda u tabeli Attribute
    for ($j=0; $j<$br_atributa; $j++)
    {
        $resu1t = $konekcija->query("insert into Attribute (Entity_ID, Name, Value) values ($entity_id, 'A{$j}', 'V{$j}')");
    }
    array_push($merenja_dodavanja_atributa, ( microtime(true) - $pocetak_merenja_dodavanja_atributa ));
    
    array_push($merenje_jedne_iteracije, ( microtime(true) - $pocetak_merenja_jedne_iteracije ));
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