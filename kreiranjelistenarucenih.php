<?php
echo "Lista narucenih proizvoda!";
	    $localhost = "localhost";
	    $username = "root";
	    $password = "";
	    $db_name = "SI2";
	    echo "Uspostavljanje konekcije...<br>";
	    $konekcija = new mysqli($localhost, $username, $password);
	     mysqli_select_db($konekcija, $db_name);
	    echo "Baza izabrana! <br>";
	    $tabela_naruceniproizvodi = "CREATE TABLE IF NOT EXISTS NARUCENI(
	        ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Barcode INT UNIQUE,
	        Naziv VARCHAR(100),
	        Proizvodjac VARCHAR(20),
	        Cena INT(20),
	        Kolicina INT(20),
	        Dobavljac VARCHAR(20),
	        Link VARCHAR(255),
	        Email VARCHAR(255),
	        Tip ENUM ('tastatura', 'mis', 'podloga', 'stampac', 'skener', 'monitor', 
	        'projektor', 'kablovi', 'slusalice', 'zvucnici', 'mikrofon', 'eksterni_disk', 'fles_memorija')
	    )";
	    $konekcija->query($tabela_naruceniproizvodi) or die($konekcija->error);
	     echo "Tabela je kreirana!";
        $unos_naruceniproizvodi = "INSERT INTO NARUCENI (Barcode, Naziv, Proizvodjac, Cena, Kolicina, Dobavljac, Link, Email, Tip) VALUES
	        (5219891, 'Mis', 'HP', '1588', '3', 'Emmi', 'www.emi.rs', 'eminabavka@gmail.com', 'mis')";
	        $konekcija->query($unos_naruceniproizvodi) or die($konekcija->error);
	        echo "Naruceni proizvodi su dodati!"
	        
?>