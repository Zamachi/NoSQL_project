<html>
    <head>
        
    </head>
    <body>
        
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
                Azuriranje atributa
            </legend>
            
            <form action="azuriranje.php" target="_blank" name="azuriranje">
                Koji ID apdejtujemo: <input type="text" name="id_entiteta"> (Ukoliko posaljemo -1 apdejtovace sve)
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
        
    </body>
</html>