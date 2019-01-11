<!DOCTYPE html>
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
		
	</head>

	<body>
		<nav class="navbar sticky-top navbar-expand-lg">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="admin.php">Home </a>
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
					Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
				</ul>
			</div>
		</nav>
		<div class="container izmeni">
			<div class="row">
				<div class="col-sm-4">
					<h1>Izmena</h1>
					<?php
						if(isset($_POST["izmeni"])){
							$barcode = $_POST["barcode"];
							$tip = $_POST["tip"];
							$veza = mysqli_connect("localhost", "root", "", "SI2");
							$sql = "SELECT * FROM proizvodi WHERE Barcode = '".$barcode."'";
							$result = mysqli_query($veza, $sql);
							while ($row = mysqli_fetch_assoc($result)) {
								$naziv = $row['Naziv'];
								$model = $row['Model'];
								$dimenzije = $row['Dimenzije'];
								$proizvodjac = $row['Proizvodjac'];
								$nabavna_cena = $row['Nabavna_cena'];
								$cena = $row['Cena'];
								$kolicina = $row['Kolicina'];
								$broj_prodatih_primeraka = $row['Broj_prodatih_primeraka'];
								$datum_poslednje_prodaje = $row['Datum_poslednje_prodaje'];
								$duzina_gar_lista = $row['Duzina_garantnog_lista'];
								$link = $row['Link'];
								$slika = $row['Slika'];
							}
							if(($_POST['naziv']) != ""){
								$naziv = $_POST["naziv"];
							}
							if(($_POST['model']) != ""){
								$model = $_POST["model"];
							}
							if(($_POST['dimenzije']) != ""){
								$dimenzije = $_POST["dimenzije"];
							}
							if(($_POST['proizvodjac']) != ""){
								$proizvodjac = $_POST["proizvodjac"];
							}
							if(($_POST['nabavna_cena']) != ""){
								$nabavna_cena = $_POST["nabavna_cena"];
								$cena = $nabavna_cena + $nabavna_cena*0.2;
							}
							if(($_POST['cena']) != ""){
								$cena = $_POST["cena"];
							}
							if(($_POST['kolicina']) != ""){
								$kolicina = $_POST["kolicina"];
							}
							if(($_POST['broj_prodatih_primeraka']) != ""){
								$broj_prodatih_primeraka = $_POST["broj_prodatih_primeraka"];
							}
							if(($_POST['datum_poslednje_prodaje']) != ""){
								$datum_poslednje_prodaje = $_POST["datum_poslednje_prodaje"];
							}
							if(($_POST['duzina_gar_lista']) != ""){
								$duzina_gar_lista = $_POST["duzina_gar_lista"];
							}
							if(($_POST['link']) != ""){
								$link = $_POST["link"];
							}
							if(($_POST['slika']) != ""){
								$slika = $_POST["slika"];
							}
							$sql = "UPDATE proizvodi SET Naziv ='" .$naziv. "', Model = '" .$model. "', Dimenzije = '" .$dimenzije. "', Proizvodjac = '" .$proizvodjac. "', Nabavna_cena = '" .$nabavna_cena. "', Cena = '" .$cena. "', Kolicina = '" .$kolicina. "', Broj_prodatih_primeraka = '" .$broj_prodatih_primeraka. "', Datum_poslednje_prodaje = '" .$datum_poslednje_prodaje. "', Duzina_garantnog_lista = '" .$duzina_gar_lista. "', Link = '" .$link. "', Slika = '" .$slika. "' WHERE Barcode = '" .$barcode. "'";
							$veza->query($sql) or die($veza->error);
							if($tip == "eksterni_disk"){
								$sql = "SELECT * FROM eksterni_disk WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$format = $row['Format'];
									$povezivanje = $row['Povezivanje'];
									$kapacitet = $row['Kapacitet'];
								}
								if(($_POST['format_eksterni_disk']) != ""){
									$format = $_POST["format_eksterni_disk"];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['kapacitet']) != ""){
									$kapacitet = $_POST["kapacitet"];
								}
								$sql = "UPDATE eksterni_disk SET Format ='" .$format. "', Povezivanje = '" .$povezivanje. "', Kapacitet = '" .$kapacitet. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "fles_memorija"){
								$sql = "SELECT * FROM fles_memorija WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$usb_type_c = $row['USB_type_C'];
									$brzina_citanja_pisanja = $row['Brzina_citanja_pisanja'];
									$kapacitet = $row['Kapacitet'];
									$povezivanje = $row['Povezivanje'];
								}
								if(($_POST['usb_type_c']) != ""){
									$usb_type_c = $_POST["usb_type_c"];
								}
								if(($_POST['brzina_citanja_pisanja']) != ""){
									$brzina_citanja_pisanja = $_POST["brzina_citanja_pisanja"];
								}
								if(($_POST['kapacitet']) != ""){
									$kapacitet = $_POST["kapacitet"];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								$sql = "UPDATE fles_memorija SET USB_Type_C ='" .$usb_type_c. "', Brzina_citanja_pisanja = '" .$brzina_citanja_pisanja. "', Kapacitet = '" .$kapacitet. "', Povezivanje = '" .$povezivanje. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "mikrofon"){
								$sql = "SELECT * FROM mikrofon WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$povezivanje = $row['Povezivanje'];
									$duzina_kabla = $row['Duzina_kabla'];
									$frekvencijski_raspon = $row['Frekvencijski_raspon'];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['duzina_kabla']) != ""){
									$duzina_kabla = $_POST["duzina_kabla"];
								}
								if(($_POST['frekvencijski_raspon']) != ""){
									$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
								}
								$sql = "UPDATE mikrofon SET Povezivanje ='" .$povezivanje. "', Duzina_kabla = '" .$duzina_kabla. "', Frekvencijski_raspon = '" .$frekvencijski_raspon. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "mis"){
								$sql = "SELECT * FROM mis WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$za_obe_ruke = $row['Za_obe_ruke'];
									$rezolucija = $row['Rezolucija'];
									$povezivanje = $row['Povezivanje'];
									$gaming = $row['Gaming'];
									$senzor = $row['Senzor'];
								}
								if(($_POST['za_obe_ruke']) != ""){
									$za_obe_ruke = $_POST["za_obe_ruke"];
								}
								if(($_POST['rezolucija_mis']) != ""){
									$rezolucija = $_POST["rezolucija_mis"];
								}
								if(($_POST['povezivanje_mis']) != ""){
									$povezivanje = $_POST["povezivanje_mis"];
								}
								if(($_POST['gaming']) != ""){
									$gaming = $_POST["gaming"];
								}
								if(($_POST['senzor_mis']) != ""){
									$senzor = $_POST["senzor_mis"];
								}
								$sql = "UPDATE mis SET Za_obe_ruke ='" .$za_obe_ruke. "', Rezolucija = '" .$rezolucija. "', Povezivanje = '" .$povezivanje. "', Gaming = '" .$gaming. "', Senzor = '" .$senzor. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "monitor"){
								$sql = "SELECT * FROM monitor WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$povezivanje = $row['Povezivanje'];
									$maksimalna_rezolucija = $row['Maksimalna_rezolucija'];
									$usb = $row['USB'];
									$ugradjeni_zvucnici = $row['Ugradjeni_zvucnici'];
									$dijagonala_ekrana = $row['Dijagonala_ekrana'];
									$brzina_osvezavanja = $row['Brzina_osvezavanja'];
									$hdmi = $row['HDMI'];
									$dvi = $row['DVI'];
									$vga = $row['VGA'];
									$display_port = $row['Display_port'];
									$podesavanje_po_visini = $row['Podesavanje_po_visini'];
									$touchscreen = $row['TouchScreen'];
									$rotacija = $row['Rotacija'];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['maksimalna_rezolucija']) != ""){
									$maksimalna_rezolucija = $_POST["maksimalna_rezolucija"];
								}
								if(($_POST['usb_monitor']) != ""){
									$usb = $_POST["usb_monitor"];
								}
								if(($_POST['ugradjeni_zvucnici']) != ""){
									$ugradjeni_zvucnici = $_POST["ugradjeni_zvucnici"];
								}
								if(($_POST['dijagonala_ekrana']) != ""){
									$dijagonala_ekrana = $_POST["dijagonala_ekrana"];
								}
								if(($_POST['brzina_osvezavanja']) != ""){
									$brzina_osvezavanja = $_POST["brzina_osvezavanja"];
								}
								if(($_POST['hdmi_monitor']) != ""){
									$hdmi = $_POST["hdmi_monitor"];
								}
								if(($_POST['dvi']) != ""){
									$dvi = $_POST["dvi"];
								}
								if(($_POST['vga']) != ""){
									$vga = $_POST["vga"];
								}
								if(($_POST['display_port']) != ""){
									$display_port = $_POST["display_port"];
								}
								if(($_POST['podesavanje_po_visini']) != ""){
									$podesavanje_po_visini = $_POST["podesavanje_po_visini"];
								}
								if(($_POST['touchscreen']) != ""){
									$touchscreen = $_POST["touchscreen"];
								}
								if(($_POST['rotacija']) != ""){
									$rotacija = $_POST["rotacija"];
								}
								$sql = "UPDATE monitor SET Povezivanje ='" .$povezivanje. "', Maksimalna_rezolucija = '" .$maksimalna_rezolucija. "', USB = '" .$usb. "', Ugradjeni_zvucnici = '" .$ugradjeni_zvucnici. "', Dijagonala_ekrana = '" .$dijagonala_ekrana. "', Brzina_osvezavanja = '" .$brzina_osvezavanja. "', HDMI = '" .$hdmi. "', DVI = '" .$dvi. "', VGA = '" .$vga. "', Display_port = '" .$display_port. "', Podesavanje_po_visini = '" .$podesavanje_po_visini. "', TouchScreen = '" .$touchscreen. "', Rotacija = '" .$rotacija. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "podloga"){
								$sql = "SELECT * FROM podloga WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$tip = $row['Tip_podloga'];
									$materijal = $row['Materijal'];
								}
								if(($_POST['tip_podloga']) != ""){
									$tip = $_POST["tip_podloga"];
								}
								if(($_POST['materijal_podloga']) != ""){
									$materijal = $_POST["materijal_podloga"];
								}
								$sql = "UPDATE podloga SET Tip_podloga ='" .$tip. "', Materijal = '" .$materijal. "' WHERE Barcode = '" .$barcode. "'";
								mysqli_query($veza, $sql);
							}
							if($tip == "projektor"){
								$sql = "SELECT * FROM projektor WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$povezivanje = $row['Povezivanje'];
									$tip = $row['Tip_projektor'];
									$rezolucija = $row['Rezolucija'];
									$osvetljenje = $row['Osvetljenje'];
									$wireless = $row['Wireless'];
									$usb = $row['USB'];
									$mreza = $row['Mreza'];
									$hdmi = $row['HDMI'];
									$dvi = $row['DVI'];
									$rs232 = $row['RS232'];
									$vga = $row['VGA'];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['tip_projektor']) != ""){
									$tip = $_POST["tip_projektor"];
								}
								if(($_POST['rezolucija']) != ""){
									$rezolucija = $_POST["rezolucija"];
								}
								if(($_POST['osvetljenje']) != ""){
									$osvetljenje = $_POST["osvetljenje"];
								}
								if(($_POST['wireless']) != ""){
									$wireless = $_POST["wireless"];
								}
								if(($_POST['usb']) != ""){
									$usb = $_POST["usb"];
								}
								if(($_POST['mreza']) != ""){
									$mreza = $_POST["mreza"];
								}
								if(($_POST['hdmi']) != ""){
									$hdmi = $_POST["hdmi"];
								}
								if(($_POST['dvi']) != ""){
									$dvi = $_POST["dvi"];
								}
								if(($_POST['rs232']) != ""){
									$rs232 = $_POST["rs232"];
								}
								if(($_POST['vga']) != ""){
									$vga = $_POST["vga"];
								}
								$sql = "UPDATE projektor SET Povezivanje ='" .$povezivanje. "', Tip_projektor = '" .$tip. "', Rezolucija = '" .$rezolucija. "', Osvetljenje = '" .$osvetljenje. "', Wireless = '" .$wireless. "', USB = '" .$usb. "', Mreza = '" .$mreza. "', HDMI = '" .$hdmi. "', DVI = '" .$dvi. "', RS232 = '" .$rs232. "', VGA = '" .$vga. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "skener"){
								$sql = "SELECT * FROM skener WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$format = $row['Format'];
									$flatbed = $row['Flatbed'];
									$povezivanje = $row['Povezivanje'];
									$rezolucija = $row['Rezolucija'];
									$adf = $row['ADF'];
								}
								if(($_POST['format_skener']) != ""){
									$format = $_POST["format_skener"];
								}
								if(($_POST['flatbed']) != ""){
									$flatbed = $_POST["flatbed"];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['rezolucija']) != ""){
									$rezolucija = $_POST["rezolucija"];
								}
								if(($_POST['adf']) != ""){
									$adf = $_POST["adf"];
								}
								$sql = "UPDATE skener SET Format ='" .$format. "', Flatbed = '" .$flatbed. "', Povezivanje = '" .$povezivanje. "', Rezolucija = '" .$rezolucija. "', ADF = '" .$adf. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "slusalice"){
								$sql = "SELECT * FROM slusalice WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$tip = $row['Tip_slusalice'];
									$mikrofon = $row['Mikrofon'];
									$zvucni_sistem = $row['Zvucni_sistem'];
									$povezivanje = $row['Povezivanje'];
									$gaming = $row['Gaming'];
									$frekvencijski_raspon = $row['Frekvencijski_raspon'];
								}
								if(($_POST['tip_slusalice']) != ""){
									$tip = $_POST["tip_slusalice"];
								}
								if(($_POST['mikrofon_slusalice']) != ""){
									$mikrofon = $_POST["mikrofon_slusalice"];
								}
								if(($_POST['zvucni_sistem_slusalice']) != ""){
									$zvucni_sistem = $_POST["zvucni_sistem_slusalice"];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['gaming']) != ""){
									$gaming = $_POST["gaming"];
								}
								if(($_POST['frekvencijski_raspon']) != ""){
									$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
								}
								$sql = "UPDATE slusalice SET Tip_slusalice ='" .$tip. "', Mikrofon = '" .$mikrofon. "', Zvucni_sistem = '" .$zvucni_sistem. "', Povezivanje = '" .$povezivanje. "', Gaming = '" .$gaming. "', Frekvencijski_raspon = '" .$frekvencijski_raspon. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "stampac"){
								$sql = "SELECT * FROM stampac WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$tip = $row['Tip_stampac'];
									$povezivanje = $row['Povezivanje'];
									$rezolucija = $row['Rezolucija'];
									$brzina_stampe = $row['Brzina_stampe'];
									$bar_kod = $row['Bar_kod'];
									$mreza = $row['Mreza'];
									$wireless = $row['Wireless'];
								}
								if(($_POST['tip_stampac']) != ""){
									$tip = $_POST["tip_stampac"];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['rezolucija']) != ""){
									$rezolucija = $_POST["rezolucija"];
								}
								if(($_POST['brzina_stampe']) != ""){
									$brzina_stampe = $_POST["brzina_stampe"];
								}
								if(($_POST['bar_kod']) != ""){
									$bar_kod = $_POST["bar_kod"];
								}
								if(($_POST['mreza']) != ""){
									$mreza = $_POST["mreza"];
								}
								if(($_POST['wireless']) != ""){
									$wireless = $_POST["wireless"];
								}
								$sql = "UPDATE stampac SET Tip_stampac ='" .$tip. "', Povezivanje = '" .$povezivanje. "', Rezolucija = '" .$rezolucija. "', Brzina_stampe = '" .$brzina_stampe. "', Bar_kod = '" .$bar_kod. "', Mreza = '" .$mreza. "', Wireless = '" .$wireless. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
							if($tip == "tastatura"){
								$sql = "SELECT * FROM tastatura WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$povezivanje = $row['Povezivanje'];
									$usb_port = $row['USB_port'];
									$numericki_deo = $row['Numericki_deo'];
									$tip = $row['Tip_tastatura'];
									$tip_tastera = $row['Tip_tastera'];
									$programabilni_tasteri = $row['Programabilni_tasteri'];
									$rgb_osvetljenje = $row['RGB_osvetljenje'];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['usb_port']) != ""){
									$usb_port = $_POST["usb_port"];
								}
								if(($_POST['numericki_deo']) != ""){
									$numericki_deo = $_POST["numericki_deo"];
								}
								if(($_POST['tip_tastatura']) != ""){
									$tip = $_POST["tip_tastatura"];
								}
								if(($_POST['tip_tastera_tastatura']) != ""){
									$tip_tastera = $_POST["tip_tastera_tastatura"];
								}
								if(($_POST['programabilni_tasteri']) != ""){
									$programabilni_tasteri = $_POST["programabilni_tasteri"];
								}
								if(($_POST['rgb_osvetljenje']) != ""){
									$rgb_osvetljenje = $_POST["rgb_osvetljenje"];
								}
								$sql = "UPDATE tastatura SET Povezivanje ='" .$povezivanje. "', USB_port = '" .$usb_port. "', Numericki_deo = '" .$numericki_deo. "', Tip_tastatura = '" .$tip. "', Tip_tastera = '" .$tip_tastera. "', Programabilni_tasteri = '" .$programabilni_tasteri. "', RGB_osvetljenje = '" .$rgb_osvetljenje. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}
									
							if($tip == "zvucnici"){
								$sql = "SELECT * FROM zvucnici WHERE Barcode = '".$barcode."'";
								$result = mysqli_query($veza, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$zvucni_sistem = $row['Zvucni_sistem'];
									$snaga = $row['Snaga'];
									$konektori = $row['Konektori'];
									$povezivanje = $row['Povezivanje'];
									$frekvencijski_raspon = $row['Frekvencijski_raspon'];
								}
								if(($_POST['zvucni_sistem_zvucnici']) != ""){
									$zvucni_sistem = $_POST["zvucni_sistem_zvucnici"];
								}
								if(($_POST['snaga']) != ""){
									$snaga = $_POST["snaga"];
								}
								if(($_POST['konektori']) != ""){
									$konektori = $_POST["konektori"];
								}
								if(($_POST['povezivanje']) != ""){
									$povezivanje = $_POST["povezivanje"];
								}
								if(($_POST['frekvencijski_raspon']) != ""){
									$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
								}
								$sql = "UPDATE zvucnici SET Zvucni_sistem ='" .$zvucni_sistem. "', Snaga = '" .$snaga. "', Konektori = '" .$konektori. "', Povezivanje = '" .$povezivanje. "', Frekvencijski_raspon = '" .$frekvencijski_raspon. "' WHERE Barcode = '" .$barcode. "'";
								$veza->query($sql) or die($veza->error);
							}

							header('Location:izmeni.php?barkod=' . $_POST["barcode"] . '');
						?>
						
						<?php
						}
						else{
							$barkod = $_GET["barkod"];
							$veza = mysqli_connect("localhost", "root", "", "SI2");
							$sql = "SELECT Tip FROM proizvodi WHERE Barcode = '".$barkod."'";
							$result = mysqli_query($veza, $sql);
							$tip1 = mysqli_fetch_row($result);
							$tip_proizvoda = $tip1[0];
						?>
							<form action="izmeni.php" method="POST">

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">									
											<input type="text" name="naziv" placeholder="Naziv" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="model" placeholder="Model" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="dimenzije" placeholder="Dimenzije" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="proizvodjac" placeholder="Proizvodjac" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="nabavna_cena" placeholder="Nabavna cena" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="cena" placeholder="Cena" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="kolicina" placeholder="Kolicina" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="broj_prodatih_primeraka" placeholder="Broj prodatih primeraka" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="datum_poslednje_prodaje" placeholder="Datum poslednje prodaje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="duzina_gar_lista" placeholder="Duzina garantnog lista" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="link" placeholder="Link" class="form-control selectTip" autofocus>									
										</div>
										<div class="form-group">
											<input type="text" name="slika" placeholder="Slika" class="form-control selectTip" autofocus>
										</div>
									</div>
									<div class="col-sm-6">
									<?php
								if ($tip_proizvoda == "eksterni_disk") {
									?> 
									<div class="form-group">
										<select name="format_eksterni_disk" class="form-control selectTip">
											<option value=" " selected disabled hidden>Format</option>
											<option value="2.5">2.5</option>
											<option value="3.5">3.5</option>
										</select>                                       
									</div>
									<div class="form-group">
										<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>										
									</div>
									<div class="form-group">
										<input type="text"name="kapacitet" placeholder="Kapacitet" class="form-control selectTip" autofocus>
									</div>

								<?php 
									}
									if ($tip_proizvoda == "fles_memorija") { ?>
										<div class="form-group">
											<input type="text" name="usb_type_c" placeholder="USB type C" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="brzina_citanja_pisanja" placeholder="Brzina citanja i pisanja" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="kapacitet" placeholder="Kapacitet" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										
									<?php 
									} 
									if ($tip_proizvoda == "kablovi") { ?>
										<div class="form-group">
											<input type="text" name="strana_1" placeholder="Strana 1" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="strana_2" placeholder="Strana 2" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="broj_uticnica" placeholder="Broj uticnica" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="tip" placeholder="Tip" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="prekidac" placeholder="Prekidac" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<select name="vrsta_kablovi" class="form-control selectTip">
												<option value="" selected disabled hidden>Vrsta</option>
												<option value="<Kabl">Kabl</option>
												<option value="Adapter">Adapter</option>
											</select>
										</div>
										
									<?php 
									}
									if ($tip_proizvoda == "mikrofon") { ?>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="duzina_kabla" placeholder="Duzina kabla" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control selectTip" autofocus>
										</div>
										
									<?php 
									}
									if ($tip_proizvoda == "mis") { ?>
										<div class="form-group">
											<input type="text" name="za_obe_ruke" placeholder="Za obe ruke" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<select name="rezolucija_mis" class="form-control selectTip">
												<option value="" selected disabled hidden>Rezolucija</option>
												<option value="<1000 dpi"><?php echo "<1000 dpi" ?></option>
												<option value="000-2000 dpi">000-2000 dpi</option>
												<option value="2000-3000 dpi">2000-3000 dpi</option>
												<option value="3000-4000 dpi">3000-4000 dpi</option>
												<option value=">4000 dpi"><?php echo ">4000 dpi" ?></option>
											</select>
										</div>
										<div class="form-group">
											<select name="povezivanje_mis" class="form-control selectTip">
												<option value="" selected disabled hidden>Povezivanje</option>
												<option value="USB">USB</option>
												<option value="PS/2">PS/2</option>
												<option value="Wireless">Wireless</option>
												<option value="Bluetooth">Bluetooth</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="gaming" placeholder="Gaming" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<select name="senzor_mis" class="form-control selectTip">
												<option value="" selected disabled hidden>Senzor</option>
												<option value="Opticki">Opticki</option>
												<option value="Laserski">Laserski</option>
												<option value="Hero">Hero</option>
											</select>
										</div>

									<?php 
									}
									if ($tip_proizvoda == "monitor") { ?>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="maksimalna_rezolucija" placeholder="Maksimalna rezolucija" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<select name="usb_monitor" class="form-control selectTip">
												<option value="" selected disabled hidden>USB</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value=">4"><?php echo ">4" ?></option>
												<option value="Ne">Ne</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="ugradjeni_zvucnici" placeholder="Ugradjeni zvucnici" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="dijagonala_ekrana" placeholder="Dijagonala ekrana" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="brzina_osvezavanja" placeholder="Brzina osvezavanja" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<select name="hdmi_monitor" class="form-control selectTip">
												<option value="" selected disabled hidden>HDMI</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value=">3"><?php echo ">3" ?></option>
												<option value="Ne">Ne</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="dvi" placeholder="DVI" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="vga" placeholder="VGA" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="display_port" placeholder="Display port" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="podesavanje_po_visini" placeholder="Podesavanje po visini" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="touchscreen" placeholder="TouchScreen" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="rotacija" placeholder="Rotacija" class="form-control selectTip" autofocus>
										</div>
																			
									<?php 
									}
									if ($tip_proizvoda == "podloga") { ?>
										<div class="form-group">
											<select name="tip_podloga" class="form-control selectTip">
												<option value="" selected disabled hidden>Tip</option>
												<option value="Obicna">Obicna</option>
												<option value="Sa gelom">Sa gelom</option>
												<option value="Gamerska">Gamerska</option>
											</select>
										</div>
										<div class="form-group">
											<select name="materijal_podloga" class="form-control selectTip">
												<option value="" selected disabled hidden>Materijal</option>
												<option value="PVC">PVC</option>
												<option value="Guma">Guma</option>
												<option value="Platno">Platno</option>
											</select>
										</div>
																				
									<?php 
									}
									if ($tip_proizvoda == "projektor") { ?>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<select name="tip_projektor" class="form-control selectTip">
												<option value="" selected disabled hidden>Tip</option>
												<option value="DLP">DLP</option>
												<option value="DLP LCD">DLP LCD</option>
												<option value="3LCD">3LCD</option>
												<option value="LCOS">LCOS</option>
												<option value="LCD">LCD</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="rezolucija" placeholder="Rezolucija" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="osvetljenje" placeholder="Osvetljenje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="wireless" placeholder="Wireless" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="usb" placeholder="USB" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="mreza" placeholder="Mreza" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="hdmi" placeholder="HDMI" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="dvi" placeholder="DVI" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="rs232" placeholder="RS232" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="vga" placeholder="VGA" class="form-control selectTip" autofocus>
										</div>
																				
									<?php 
									}
									if ($tip_proizvoda == "skener") { ?>
										<div class="form-group">
											<select name="format_skener" class="form-control selectTip">
												<option value="" selected disabled hidden>Format</option>
												<option value="A6">A6</option>
												<option value="A5">A5</option>
												<option value="A4">A4</option>
												<option value="A3">A3</option>
												<option value="A2">A2</option>
												<option value="A1">A1</option>
												<option value="A0">A0</option>
												<option value=">A0"><?php echo ">A0" ?></option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="flatbed" placeholder="Flatbed" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="rezolucija" placeholder="Rezolucija" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="adf" placeholder="ADF" class="form-control selectTip" autofocus>
										</div>
																				
									<?php 
									}
									if ($tip_proizvoda == "slusalice") { ?>
										<div class="form-group">
											<select name="tip_slusalice" class="form-control selectTip">
												<option value="" selected disabled hidden>Tip</option>
												<option value="Bubice">Bubice</option>
												<option value="Slusalice">Slusalice</option>
											</select>
										</div>
										<div class="form-group">
											<select name="mikrofon_slusalice" class="form-control selectTip">
												<option value="" selected disabled hidden>Mikrofon</option>
												<option value="Ne">Ne</option>
												<option value="Na rucici">Na rucici</option>
												<option value="Na slusalici">Na slusalici</option>
												<option value="Na kablu">Na kablu</option>
											</select>
										</div>
										<div class="form-group">
											<select name="zvucni_sistem_slusalice" class="form-control selectTip">
												<option value="" selected disabled hidden>Zvucni sistem</option>
												<option value="5.1">5.1</option>
												<option value="7.1">7.1</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="gaming" placeholder="Gaming" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control selectTip" autofocus>
										</div>
																																						
									<?php 
									}
									if ($tip_proizvoda == "stampac") { ?>
										<div class="form-group">
											<select name="tip_stampac" class="form-control selectTip">
												<option value="" selected disabled hidden>Tip</option>
												<option value="Matricni">Matricni</option>
												<option value="Laserski">Laserski</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="rezolucija" placeholder="Rezolucija" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="brzina_stampe" placeholder="Brzina stampe" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="bar_kod" placeholder="Bar kod" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="mreza" placeholder="Mreza" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="wireless" placeholder="Wireless" class="form-control selectTip" autofocus>
										</div>

									<?php 
									}
									if ($tip_proizvoda == "tastatura") { ?>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="usb_port" placeholder="USB" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="numericki_deo" placeholder="Numericki deo" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<select name="tip_tastatura" class="form-control selectTip">
												<option value="" selected disabled hidden>Tip</option>
												<option value="Wired">Wired</option>
												<option value="Wireless">Wireless</option>
												<option value="Bluetooth">Bluetooth</option>
											</select>
										</div>
										<div class="form-group">
											<select name="tip_tastera_tastatura" class="form-control selectTip">
												<option value="" selected disabled hidden>Tip tastera</option>
												<option value="Mehanicki">Mehanicki</option>
												<option value="X_Scissor">X_Scissor</option>
												<option value="Gumena_membrana">Gumena_membrana</option>
												<option value="Hibridni">Hibridni</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="programabilni_tasteri" placeholder="Programabilni tasteri" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="rgb_osvetljenje" placeholder="RGB osvetljenje" class="form-control selectTip" autofocus>
										</div>
																			
									<?php 
									}
									if ($tip_proizvoda == "zvucnici") { ?>
										<div class="form-group">
											<select name="zvucni_sistem_zvucnici" class="form-control selectTip">
												<option value="" selected disabled hidden>Zvucni sistem</option>
												<option value="4.1">4.1</option>
												<option value="5.1">5.1</option>
												<option value="7.1">7.1</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="snaga" placeholder="Snaga" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="konektori" placeholder="Konektori" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control selectTip" autofocus>
										</div>
										<div class="form-group">
											<input type="text" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control selectTip" autofocus>
										</div>
																				
									<?php 
									}
								
								
								}
							?>

								<input type="hidden" name="tip" value="<?php echo $tip_proizvoda ?>">
								<input type="hidden" name="barcode" value="<?php echo $barkod ?>">
								<button type="submit" name="izmeni" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-ok-circle"></i> Submit</button>
							</form>
									</div>
								</div>
								                               		
				</div>
				<div class="col-sm-8">

					<?php 	
						$niz = $veza->query("SELECT Slika, Tip FROM proizvodi WHERE Barcode = '$barkod'")->fetch_all(MYSQLI_ASSOC);
						$tip = $niz[0]["Tip"];
						$slika = $niz[0]["Slika"];

						$niz1 = $veza->query("SELECT * FROM proizvodi,$tip WHERE proizvodi.Barcode = '$barkod'")->fetch_all(MYSQLI_ASSOC);
						
						//echo $niz1[0]["Naziv"];

					?>
					<h1><?php echo $niz1[0]["Naziv"] ?></h1>
					<img src="<?php echo $slika?>" alt="" class="img">
					<table align = 'center' class = "table_izmeni">										
						<?php 
							foreach(array_keys($niz1[0]) as $element)
							{
								echo "<tr><td>".$element.": </td><td>".$niz1[0][$element]."</td></tr>";
							}
						?>
					</table>										
				</div>
			</div>
		</div>
	</body>
</html>
