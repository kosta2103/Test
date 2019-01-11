<?php

	session_start();
	$konekcija = mysqli_connect("localhost", "root", "", "si2");
	
?>

<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		
		<link rel="stylesheet" href="prikaz.css">
		<link rel="stylesheet" href="navbar.css">
		<link rel="stylesheet" href="racun.css">
    </head>

    <body>
        <nav class="navbar sticky-top navbar-expand-lg">
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

				<li class="nav-item dropdown">
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

        <div class="container racun">
            <h3 class="h3">Racun</h3>
            <table cellspacing="0" cellpadding="0" class='table-borderless' align = 'center'>
				<tr>
					<th class='align-middle'>Naziv</th>
					<th class='align-middle'>Cena</th>
					<th class='align-middle'>Kolicina</th>
					<th class='align-middle'>Ukupno</th>
				</tr>
                <?php
                    if(isset($_POST["racun"]))
                    {
                        foreach(array_keys($_SESSION["korpa"]) as $element)
                        {
                            $kolicina = $_SESSION["korpa"][$element];
                            $konekcija->query("UPDATE proizvodi SET Kolicina = Kolicina-$kolicina WHERE Barcode = $element");
                        }
                    }

					$niz = array();
					$total = 0;

					foreach(array_keys($_SESSION["korpa"]) as $element)
					{
						$niz = $konekcija->query("SELECT Naziv, Cena FROM proizvodi WHERE Barcode = '$element'")->fetch_all(MYSQLI_ASSOC);
						$total += $niz[0]["Cena"]*$_SESSION["korpa"][$element];
						echo "<tr>";
						echo "<td class='align-middle'>".$niz[0]["Naziv"]."</td>";
						echo "<td class='align-middle'>".$niz[0]["Cena"]."</td>";
						echo "<td class='align-middle'>".$_SESSION["korpa"][$element]."</td>";
						echo "<td class='align-middle'>".$niz[0]["Cena"]*$_SESSION["korpa"][$element]."</td>";
						echo "</tr>";

						unset($niz);
					}
                    echo
                        "<tr>
							<td class='noBorder align-middle'><a href='pdf.php'>Napravi pdf</a></td>
							<td class='noBorder align-middle'></td>
							<td class='noBorder align-middle'></td>
                            <td class='align-middle'>TOTAL </td>
                            <td class='align-middle'>".$total."</td>
						</tr>";

				?>
                    
            </table>
            
        </div>
    </body>



</html>