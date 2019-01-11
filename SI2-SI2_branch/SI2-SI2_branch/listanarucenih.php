<?php
	    $localhost = "localhost";
	    $username = "root";
	    $password = "";
	    $db_name = "SI2";
	    //echo "Uspostavljanje konekcije...<br>";
	    $konekcija = new mysqli($localhost, $username, $password);
	     mysqli_select_db($konekcija, $db_name);
	    //echo "Baza izabrana! <br>";
	    $sql = "SELECT * FROM NARUCENI";
        $result = $konekcija->query($sql);
	    
/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>". "<br>". "id: " . $row["ID"]. " - Barkod: " . $row["Barcode"]. " " . $row["Naziv"]. "<br>"?>    
        */
        ?>    <!DOCTYPE html>
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
		<link rel="stylesheet" href="naruceni.css">
		
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
		
		<div class="container naruceni">
			<table class="table" style="width: 100%">
				
				<tr>
					<th>ID</th>
					<th>Barkod</th>
					<th>Naziv</th>
					<th>Proizvodjac</th>
					<th>Cena</th>
					<th>Kolicina</th>
					<th>Dobavljac</th>
					<th>Link</th>
					<th>Email</th>
					<th>Tip</th>
					<th>Naruci</th>
				</tr>	

					<?php
					$sql = "SELECT * FROM NARUCENI";
					$result = $konekcija->query($sql);
					while ($red = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>{$red["ID"]}</td>";
					echo "<td>{$red["Barcode"]}</td>";
					echo "<td>{$red["Naziv"]}</td>";
					echo "<td>{$red["Proizvodjac"]}</td>";
					echo "<td>{$red["Cena"]}</td>";
					echo "<td>{$red["Kolicina"]}</td>";
					echo "<td>{$red["Dobavljac"]}</td>";
					echo "<td>{$red["Link"]}</td>";
					echo "<td>{$red["Email"]}</td>";
					echo "<td>{$red["Tip"]}</td>";
					$email = $red["Email"];
					$barkod = $red["Barcode"];
					$naziv = $red["Naziv"];
					$kolicina = $red ["Kolicina"];
					?>
		
					<td>
						<form action="narucivanje.php" method="POST">
							<button>Naruci</button>
							<input type="hidden" name="email" value="<?php  echo $email;       ?>">
							<input type="hidden" name="sifra" value="<?php  echo $barkod;       ?>">
							<input type="hidden" name="naziv" value="<?php  echo $naziv;       ?>">
							<input type="hidden" name="kolicina" value="<?php  echo $kolicina;       ?>">
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
