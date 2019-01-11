<?php
	    $localhost = "localhost";
	    $username = "root";
	    $password = "";
	    $db_name = "SI2";
	   // echo "Uspostavljanje konekcije...<br>";
	    $konekcija = new mysqli($localhost, $username, $password);
	     mysqli_select_db($konekcija, $db_name);
	    //echo "Baza izabrana! <br>";
	      $tabela_pristigliproizvodi = "CREATE TABLE IF NOT EXISTS PRISTIGLIPROIZVODI(
	        ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Barcode INT UNIQUE,
	        Naziv VARCHAR(100),
	        Model VARCHAR(50),
	        Dimenzije VARCHAR(50),
	        Proizvodjac VARCHAR(20),
            Nabavna_cena INT(20),
	        Cena INT(20),
	        Kolicina INT(20),
	        Duzina_garantnog_lista VARCHAR(20),
	        Link VARCHAR(255),
	        Slika VARCHAR(255),
	        Tip ENUM ('tastatura', 'mis', 'podloga', 'stampac', 'skener', 'monitor', 
	        'projektor', 'kablovi', 'slusalice', 'zvucnici', 'mikrofon', 'eksterni_disk', 'fles_memorija')
	    )";
	    $konekcija->query($tabela_pristigliproizvodi) or die($konekcija->error);
	     //echo "Tabela je kreirana!";
	       $sql = "SELECT * FROM PRISTIGLIPROIZVODI";
        $result = $konekcija->query($sql);
	    ?>


      

    <!DOCTYPE html>
        <html>
        <head>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		

			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

			<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
			<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

			<link rel="stylesheet" href="prikaz.css">
			<link rel="stylesheet" href="navbar.css">
			<link rel="stylesheet" href="pristigla_roba.css">
        </head>
    <body>
		<nav class="navbar fixed-top navbar-expand-lg">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Pocetna </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dodaj1.php">Dodavanje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prikaz.php?Tip=proizvodi">Prikaz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="promena_cene1.php">Akcije</a>
                </li>
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Fakture
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="cuvanje_faktura.php">Upload</a>
						<a class="dropdown-item" href="prikaz_faktura.php">Prikaz</a>	
					</div>
				</li>
                <li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Roba
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="listanarucenih.php">Narucivanje</a>
						<a class="dropdown-item" href="nema_na_stanju.php">Nema na stanju</a>
						<a class="dropdown-item" href="pristigla_roba.php">Prijem</a>	
					</div>
				</li>               
                </ul>
            </div>
        </nav>
 
		<div class="container pristigla_roba">
			<table class="table" style="width: 100%">
				<tr>
					<th>ID</th>
					<th>Barkod</th>
					<th>Naziv</th>
					<th>Model</th>
					<th>Dimenzije</th>
					<th>Proizvodjac</th>
					<th>Cena</th>
					<th>Kolicina</th>
					<th>Duzina_garantnog_lista</th>
					<th>Link</th>
					<th>Slika</th>
					<th>Tip</th>
					<th>Dodaj</th>
				</tr>	

				<?php
				$sql = "SELECT * FROM PRISTIGLIPROIZVODI";
				$result = $konekcija->query($sql);
				while ($red = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>{$red["ID"]}</td>";
				echo "<td>{$red["Barcode"]}</td>";
				echo "<td>{$red["Naziv"]}</td>";
				echo "<td>{$red["Model"]}</td>";
				echo "<td>{$red["Dimenzije"]}</td>";
				echo "<td>{$red["Proizvodjac"]}</td>";
				echo "<td>{$red["Nabavna_cena"]}</td>";
				echo "<td>{$red["Kolicina"]}</td>";
				echo "<td>{$red["Duzina_garantnog_lista"]}</td>";
				echo "<td>{$red["Link"]}</td>";
				echo "<td>{$red["Slika"]}</td>";
				echo "<td>{$red["Tip"]}</td>";		
				$barkod = $red["Barcode"];
				$naziv = $red["Naziv"];
				$model = $red ["Model"];
				$dimenzije = $red["Dimenzije"];
				$proizvodjac = $red["Proizvodjac"];
				$cena = $red["Nabavna_cena"];
				$kolicina = $red["Kolicina"];
				$garancija = $red["Duzina_garantnog_lista"];
				$link = $red["Link"];
				$slika = $red["Slika"];
				$tip = $red["Tip"];
				?>
				<td>
					<form action="dodaj2.php" method="POST">
						<button>Dodaj</button>
						<input type="hidden" name="proizvod_barcode" value="<?php  echo $barkod;       ?>">
						<input type="hidden" name="naziv" value="<?php  echo $naziv;       ?>">
						<input type="hidden" name="model" value="<?php  echo $model;       ?>">
						<input type="hidden" name="dimenzije" value="<?php  echo $dimenzije;       ?>">
						<input type="hidden" name="proizvodjac" value="<?php  echo $proizvodjac;       ?>">
						<input type="hidden" name="nabavna_cena" value="<?php  echo $cena;       ?>">
						<input type="hidden" name="kolicina" value="<?php  echo $kolicina;       ?>">
						<input type="hidden" name="duzina_gar_lista" value="<?php  echo $garancija;       ?>">
						<input type="hidden" name="link" value="<?php  echo $link;       ?>">
						<input type="hidden" name="slika" value="<?php  echo $slika;       ?>">
						<input type="hidden" name="selektovani_tip" value="<?php  echo $tip;       ?>">
					</form>
				</td>

					<?php
				echo "</tr>";
				}
				?>

			</table>
		</div>
   </body>
</html>
