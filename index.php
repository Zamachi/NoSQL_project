<?php
require_once __DIR__ . '/vendor/autoload.php';
?>

<html>

<head>

</head>

<body>
    <div>
        <h2>SQL baza</h2>
        <fieldset>
            <legend>
                Kreiranje baze
            </legend>

            <form action="kreiranje.php" target="_blank" name="kreiranje">
                Odabir engine-a:
                <select name="endzin" for="kreiranje">
                    <option value="InnoDB">InnoDB</option>
                    <option value="MyISAM">MyISAM </option>
                </select> <br>
                <button for="kreiranje">Kreiraj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Dodavanje entiteta i atributa
            </legend>

            <form action="dodavanje.php" target="_blank" name="dodavanje">
                Broj entiteta: <input type="text" name="br_entiteta"> <br>
                Broj atributa: <input type="text" name="br_atributa"> <br>
                <button for="dodavanje">Dodaj</button>
            </form>
        </fieldset>

        <hr>

        <fieldset>
            <legend>
                Citanje iz MySQL baze
            </legend>

            <form action="citanje.php" target="_blank" name="citanje">
                <button for="citanje">Procitaj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Azuriranje atributa
            </legend>

            <form action="azuriranje.php" target="_blank" name="azuriranje">
                <br>
                <button for="azuriranje">Azuriraj</button>
            </form>
        </fieldset>

        <hr>
        <fieldset>
            <legend>
                Praznjenje baze
            </legend>

            <form action="praznjenje.php" target="_blank" name="praznjenje">
                <button for="praznjenje">Brisanje</button>
            </form>

        </fieldset>

        <hr>
        <fieldset>
            <legend>
                Brisanje iz baze(DELETE)
            </legend>

            <form action="brisanje.php" target="_blank" name="brisanje">
                <button for="brisanje">Delete</button>
            </form>

        </fieldset>

    </div>

    <div>

        <h2>NoSQL baza: MongoDB - WiredTiger storage engine</h2>

        <fieldset>
            <legend>
                Kreiranje Mongo baze i kolekcija (Attribute and Entity)
            </legend>

            <form action="kreiranjeMongo.php" target="_blamnk" name="kreiranjeMongo">
                <button for="kreiranjeMongo">Kreiraj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Dodavanje entiteta i atributa u Mongo
            </legend>

            <form action="dodavanjeMongo.php" target="_blank" name="dodavanjeMongo">
                Broj entiteta: <input type="text" name="br_entiteta_mongo"> <br>
                Broj atributa: <input type="text" name="br_atributa_mongo"> <br>
                <button for="dodavanjeMongo">Dodaj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Citanje iz Mongo baze
            </legend>

            <form action="citanjeMongo.php" target="_blank" name="citanjeMongo">
                <button for="citanjeMongo">Procitaj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Azuriranje atributa
            </legend>

            <form action="azuriranjeMongo.php" target="_blank" name="azuriranjeMongo">
                <button for="azuriranjeMongo">Azuriraj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Praznjenje Mongo baze
            </legend>

            <form action="praznjenjeMongo.php" target="_blamnk" name="praznjenjeMongo">
                <button for="praznjenjeMongo">Obrisi</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Brisanje Mongo baze
            </legend>

            <form action="brisanjeMongo.php" target="_blamnk" name="brisanjeMongo">
                <button for="brisanjeMongo">Obrisi</button>
            </form>
        </fieldset>
    </div>

    <div>

        <h2>NoSQL baza: Neo4j</h2>

        <fieldset>
            <legend>
                Kreiranje Neo baze i kolekcija (Attribute and Entity)
            </legend>

            <form action="kreiranjeNeo.php" target="_blamnk" name="kreiranjeNeo">
                <button for="kreiranjeNeo">Kreiraj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Dodavanje entiteta i atributa u Neo
            </legend>

            <form action="dodavanjeNeo.php" target="_blank" name="dodavanjeNeo">
                Broj entiteta: <input type="text" name="br_entiteta_neo4j"> <br>
                Broj atributa: <input type="text" name="br_atributa_neo4j"> <br>
                <button for="dodavanjeNeo">Dodaj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Citanje iz Neo baze
            </legend>

            <form action="citanjeNeo.php" target="_blank" name="citanjeNeo">
                <button for="citanjeNeo">Procitaj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Azuriranje atributa
            </legend>

            <form action="azuriranjeNeo.php" target="_blank" name="azuriranjeNeo">
                <button for="azuriranjeNeo">Azuriraj</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Praznjenje Neo4j baze
            </legend>

            <form action="praznjenjeNeo.php" target="_blamnk" name="praznjenjeNeo">
                <button for="praznjenjeNeo">Obrisi</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>
                Brisanje Neo baze
            </legend>

            <form action="brisanjeNeo.php" target="_blamnk" name="brisanjeNeo">
                <button for="brisanjeNeo">Obrisi</button>
            </form>
        </fieldset>
    </div>

</body>

</html>