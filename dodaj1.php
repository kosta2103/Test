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

        
		<link rel="stylesheet" href="dodaj1.css">
		<link rel="stylesheet" href="navbar.css">
			
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
                    <a class="nav-link" href="admin.php">Pocetna <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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

		<div class="config">								
			<div class="form-horizontal" role="form">
				<div class="container">
					<div class="row">
						<div class="col">					
							<div class="form-group">
								<label for="firstName" class="col-sm-3 control-label">Tip</label>
								<div class="col-sm-9">
									<form id="form1" action="dodaj1.php" method="POST">
										<select name="Tip" onchange = "submitForm()" class="form-control">
											<option value="" selected disabled hidden>Tip</option>
											<option value="eksterni_disk">Eksterni disk</option>
											<option value="fles_memorija">Fles memorija</option>
											<option value="kablovi">Kablovi</option>
											<option value="mikrofon">Mikrofon</option>
											<option value="mis">Mis</option>
											<option value="monitor">Monitor</option>
											<option value="podloga">Podloga</option>
											<option value="projektor">Projektor</option>
											<option value="skener">Skener</option>
											<option value="slusalice">Slusalice</option>
											<option value="stampac">Stampac</option>
											<option value="tastatura">Tastatura</option>
											<option value="zvucnici">Zvucnici</option>
										</select>                                      
									</form>
								</div>
							</div>

							<script type="text/javascript">
								function submitForm()
								{
										document.getElementById('form1').submit();
								}
							</script>

						<?php
							if (isset($_POST["Tip"])) {
								$select = $_POST["Tip"];
						?>

							<form action="dodaj2.php" method="POST">
								<div class="form-group">
									<label class="col-sm-3 control-label">Barcode</label>
									<div class="col-sm-9">
										<input type="text" name="proizvod_barcode" placeholder="Barcode" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Naziv</label>
									<div class="col-sm-9">
										<input type="text" name="naziv" placeholder="Naziv" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Model</label>
									<div class="col-sm-9">
										<input type="text" name="model" placeholder="Model" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Dimenzije</label>
									<div class="col-sm-9">
										<input type="text" name="dimenzije" placeholder="Dimenzije" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Proizvodjac</label>
									<div class="col-sm-9">
										<input type="text" name="proizvodjac" placeholder="Proizvodjac" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nabavna cena</label>
									<div class="col-sm-9">
										<input type="text" name="nabavna_cena" placeholder="Nabavna cena" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Cena</label>
									<div class="col-sm-9">
										<input type="text" name="cena" placeholder="Cena" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Kolicina</label>
									<div class="col-sm-9">
										<input type="text" name="kolicina" placeholder="Kolicina" class="form-control" autofocus>
									</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">Duzina garantnog lista</label>
										<div class="col-sm-9">
											<input type="text"name="duzina_gar_lista" placeholder="Duzina garantnog lista" class="form-control" autofocus>
										</div>
								</div>
								<div class="form-group">
										<label class="col-sm-3 control-label">Link</label>
										<div class="col-sm-9">
											<input type="text" name="link" placeholder="Link" class="form-control" autofocus>
										</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Slika</label>
									<div class="col-sm-9">
										<input type="text" name="slika" placeholder="Slika" class="form-control" autofocus>
									</div>
								</div>                               
						</div>    
						<div class="col">
								<?php
								if ($select == "eksterni_disk") {
									?> 
									<div class="form-group">
										<label class="col-sm-3 control-label">Format</label>
										<div class="col-sm-9">
											<select name="format_eksterni_disk" class="form-control">
												<option value="" selected disabled hidden>Format</option>
												<option value="<2.5">2.5</option>
												<option value="3.5">3.5</option>
											</select>                                       
											</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Povezivanje</label>
										<div class="col-sm-9">
											<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Kapacitet</label>
										<div class="col-sm-9">
											<input type="text"name="kapacitet" placeholder="Kapacitet" class="form-control" autofocus>
										</div>
									</div>

								<?php 
									}
									if ($select == "fles_memorija") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">USB Type C</label>
											<div class="col-sm-9">
												<input type="text" name="usb_type_c" placeholder="USB type C" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Brzina citanja i pisanja</label>
											<div class="col-sm-9">
												<input type="text" name="brzina_citanja_pisanja" placeholder="Brzina citanja i pisanja" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Kapacitet</label>
											<div class="col-sm-9">
												<input type="text" name="kapacitet" placeholder="Kapacitet" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										
									<?php 
									} 
									if ($select == "kablovi") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Strana 1</label>
											<div class="col-sm-9">
												<input type="text" name="strana_1" placeholder="Strana 1" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Strana 2</label>
											<div class="col-sm-9">
												<input type="text" name="strana_2" placeholder="Strana 2" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Broj uticnica</label>
											<div class="col-sm-9">
												<input type="text" name="broj_uticnica" placeholder="Broj uticnica" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tip kabla</label>
											<div class="col-sm-9">
												<input type="text" name="tip" placeholder="Tip" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Prekidac</label>
											<div class="col-sm-9">
												<input type="text" name="prekidac" placeholder="Prekidac" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Vrsta</label>
											<div class="col-sm-9">
												<select name="vrsta_kablovi" class="form-control">
													<option value="" selected disabled hidden>Vrsta</option>
													<option value="<Kabl">Kabl</option>
													<option value="Adapter">Adapter</option>
												</select>
											</div>
										</div>
										
									<?php 
									}
									if ($select == "mikrofon") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Duzina kabla</label>
											<div class="col-sm-9">
												<input type="text" name="duzina_kabla" placeholder="Duzina kabla" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Frekvencijski raspon</label>
											<div class="col-sm-9">
												<input type="text" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control" autofocus>
											</div>
										</div>
										
									<?php 
									}
									if ($select == "mis") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Za obe ruke</label>
											<div class="col-sm-9">
												<input type="text" name="za_obe_ruke" placeholder="Za obe ruke" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Rezolucija</label>
											<div class="col-sm-9">
												<select name="rezolucija_mis" class="form-control">
													<option value="" selected disabled hidden>Rezolucija</option>
													<option value="<1000 dpi"><?php echo "<1000 dpi" ?></option>
													<option value="000-2000 dpi">000-2000 dpi</option>
													<option value="2000-3000 dpi">2000-3000 dpi</option>
													<option value="3000-4000 dpi">3000-4000 dpi</option>
													<option value=">4000 dpi"><?php echo ">4000 dpi" ?></option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<select name="povezivanje_mis" class="form-control">
													<option value="" selected disabled hidden>Povezivanje</option>
													<option value="USB">USB</option>
													<option value="PS/2">PS/2</option>
													<option value="Wireless">Wireless</option>
													<option value="Bluetooth">Bluetooth</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Gaming</label>
											<div class="col-sm-9">
												<input type="text" name="gaming" placeholder="Gaming" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Senzor</label>
											<div class="col-sm-9">
												<select name="senzor_mis" class="form-control">
													<option value="" selected disabled hidden>Senzor</option>
													<option value="Opticki">Opticki</option>
													<option value="Laserski">Laserski</option>
													<option value="Hero">Hero</option>
												</select>
											</div>
										</div>

									<?php 
									}
									if ($select == "monitor") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Maksimalna rezolucija</label>
											<div class="col-sm-9">
												<input type="text" name="maksimalna_rezolucija" placeholder="Maksimalna rezolucija" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">USB</label>
											<div class="col-sm-9">
												<select name="usb_monitor" class="form-control">
													<option value="" selected disabled hidden>USB</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value=">4"><?php echo ">4" ?></option>
													<option value="Ne">Ne</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Ugradjeni zvucnici</label>
											<div class="col-sm-9">
												<input type="text" name="ugradjeni_zvucnici" placeholder="Ugradjeni zvucnici" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Dijagonala ekrana</label>
											<div class="col-sm-9">
												<input type="text" name="dijagonala_ekrana" placeholder="Dijagonala ekrana" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Brzina osvezavanja</label>
											<div class="col-sm-9">
												<input type="text" name="brzina_osvezavanja" placeholder="Brzina osvezavanja" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">HDMI</label>
											<div class="col-sm-9">
												<select name="hdmi_monitor" class="form-control">
													<option value="" selected disabled hidden>HDMI</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value=">3"><?php echo ">3" ?></option>
													<option value="Ne">Ne</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">DVI</label>
											<div class="col-sm-9">
												<input type="text" name="dvi" placeholder="DVI" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">VGA</label>
											<div class="col-sm-9">
												<input type="text" name="vga" placeholder="VGA" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Display port</label>
											<div class="col-sm-9">
												<input type="text" name="display_port" placeholder="Display port" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Podesavanje po visini</label>
											<div class="col-sm-9">
												<input type="text" name="podesavanje_po_visini" placeholder="Podesavanje po visini" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">TouchScreen</label>
											<div class="col-sm-9">
												<input type="text" name="touchscreen" placeholder="TouchScreen" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Rotacija</label>
											<div class="col-sm-9">
												<input type="text" name="rotacija" placeholder="Rotacija" class="form-control" autofocus>
											</div>
										</div>
																			
									<?php 
									}
									if ($select == "podloga") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tip podloge</label>
											<div class="col-sm-9">
												<select name="tip_podloga" class="form-control">
													<option value="" selected disabled hidden>Tip</option>
													<option value="Obicna">Obicna</option>
													<option value="Sa gelom">Sa gelom</option>
													<option value="Gamerska">Gamerska</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Materijal</label>
											<div class="col-sm-9">
												<select name="materijal_podloga" class="form-control">
													<option value="" selected disabled hidden>Materijal</option>
													<option value="PVC">PVC</option>
													<option value="Guma">Guma</option>
													<option value="Platno">Platno</option>
												</select>
											</div>
										</div>
																				
									<?php 
									}
									if ($select == "projektor") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tip projektora</label>
											<div class="col-sm-9">
												<select name="tip_projektor" class="form-control">
													<option value="" selected disabled hidden>Tip</option>
													<option value="DLP">DLP</option>
													<option value="DLP LCD">DLP LCD</option>
													<option value="3LCD">3LCD</option>
													<option value="LCOS">LCOS</option>
													<option value="LCD">LCD</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Rezolucija</label>
											<div class="col-sm-9">
												<input type="text" name="rezolucija" placeholder="Rezolucija" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Osvetljenje</label>
											<div class="col-sm-9">
												<input type="text" name="osvetljenje" placeholder="Osvetljenje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Wireless</label>
											<div class="col-sm-9">
												<input type="text" name="wireless" placeholder="Wireless" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">USB</label>
											<div class="col-sm-9">
												<input type="text" name="usb" placeholder="USB" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Mreza</label>
											<div class="col-sm-9">
												<input type="text" name="mreza" placeholder="Mreza" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">HDMI</label>
											<div class="col-sm-9">
												<input type="text" name="hdmi" placeholder="HDMI" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">DVI</label>
											<div class="col-sm-9">
												<input type="text" name="dvi" placeholder="DVI" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">RS232</label>
											<div class="col-sm-9">
												<input type="text" name="rs232" placeholder="RS232" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">VGA</label>
											<div class="col-sm-9">
												<input type="text" name="vga" placeholder="VGA" class="form-control" autofocus>
											</div>
										</div>
																				
									<?php 
									}
									if ($select == "skener") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Format</label>
											<div class="col-sm-9">
												<select name="format_skener" class="form-control">
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
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Flatbed</label>
											<div class="col-sm-9">
												<input type="text" name="flatbed" placeholder="Flatbed" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Rezolucija</label>
											<div class="col-sm-9">
												<input type="text" name="rezolucija" placeholder="Rezolucija" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">ADF</label>
											<div class="col-sm-9">
												<input type="text" name="adf" placeholder="ADF" class="form-control" autofocus>
											</div>
										</div>
																				
									<?php 
									}
									if ($select == "slusalice") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tip slusalica</label>
											<div class="col-sm-9">
												<select name="tip_slusalice" class="form-control">
													<option value="" selected disabled hidden>Tip</option>
													<option value="Bubice">Bubice</option>
													<option value="Slusalice">Slusalice</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Mikrofon</label>
											<div class="col-sm-9">
												<select name="mikrofon_slusalice" class="form-control">
													<option value="" selected disabled hidden>Mikrofon</option>
													<option value="Ne">Ne</option>
													<option value="Na rucici">Na rucici</option>
													<option value="Na slusalici">Na slusalici</option>
													<option value="Na kablu">Na kablu</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Zvucni sistem</label>
											<div class="col-sm-9">
												<select name="zvucni_sistem_slusalice" class="form-control">
													<option value="" selected disabled hidden>Zvucni sistem</option>
													<option value="5.1">5.1</option>
													<option value="7.1">7.1</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Gaming</label>
											<div class="col-sm-9">
												<input type="text" name="gaming" placeholder="Gaming" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Frekvencijski raspon</label>
											<div class="col-sm-9">
												<input type="text" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control" autofocus>
											</div>
										</div>
																																						
									<?php 
									}
									if ($select == "stampac") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tip stampaca</label>
											<div class="col-sm-9">
												<select name="tip_stampac" class="form-control">
													<option value="" selected disabled hidden>Tip</option>
													<option value="Matricni">Matricni</option>
													<option value="Laserski">Laserski</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Rezolucija</label>
											<div class="col-sm-9">
												<input type="text" name="rezolucija" placeholder="Rezolucija" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Brzina stampe</label>
											<div class="col-sm-9">
												<input type="text" name="brzina_stampe" placeholder="Brzina stampe" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Bar kod</label>
											<div class="col-sm-9">
												<input type="text" name="bar_kod" placeholder="Bar kod" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Mreza</label>
											<div class="col-sm-9">
												<input type="text" name="mreza" placeholder="Mreza" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Wireless</label>
											<div class="col-sm-9">
												<input type="text" name="wireless" placeholder="Wireless" class="form-control" autofocus>
											</div>
										</div>

									<?php 
									}
									if ($select == "tastatura") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">USB</label>
											<div class="col-sm-9">
												<input type="text" name="usb_port" placeholder="USB" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Numericki deo</label>
											<div class="col-sm-9">
												<input type="text" name="numericki_deo" placeholder="Numericki deo" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tip tastature</label>
											<div class="col-sm-9">
												<select name="tip_tastatura" class="form-control">
													<option value="" selected disabled hidden>Tip</option>
													<option value="Wired">Wired</option>
													<option value="Wireless">Wireless</option>
													<option value="Bluetooth">Bluetooth</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tip tastera</label>
											<div class="col-sm-9">
												<select name="tip_tastera_tastatura" class="form-control">
													<option value="" selected disabled hidden>Tip tastera</option>
													<option value="Mehanicki">Mehanicki</option>
													<option value="X_Scissor">X_Scissor</option>
													<option value="Gumena_membrana">Gumena_membrana</option>
													<option value="Hibridni">Hibridni</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Programabilni tasteri</label>
											<div class="col-sm-9">
												<input type="text" name="programabilni_tasteri" placeholder="Programabilni tasteri" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">RGB osvetljenje</label>
											<div class="col-sm-9">
												<input type="text" name="rgb_osvetljenje" placeholder="RGB osvetljenje" class="form-control" autofocus>
											</div>
										</div>
																			
									<?php 
									}
									if ($select == "zvucnici") { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Zvucni sistem</label>
											<div class="col-sm-9">
												<select name="zvucni_sistem_zvucnici" class="form-control">
													<option value="" selected disabled hidden>Zvucni sistem</option>
													<option value="4.1">4.1</option>
													<option value="5.1">5.1</option>
													<option value="7.1">7.1</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Snaga</label>
											<div class="col-sm-9">
												<input type="text" name="snaga" placeholder="Snaga" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Konektori</label>
											<div class="col-sm-9">
												<input type="text" name="konektori" placeholder="Konektori" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Povezivanje</label>
											<div class="col-sm-9">
												<input type="text" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Frekvencijski raspon</label>
											<div class="col-sm-9">
												<input type="text" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control" autofocus>
											</div>
										</div>
																				
									<?php 
									}
									?>

									<input type="hidden" name="selektovani_tip" value="<?php echo $select ?>">
									<button type="submit" name="dodaj" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> Add</button>
								<?php
							}
							?>
							</form>   
						</div>                                                                 
					</div>   
				</div>                                
			</div>					
		</div>
		<div class="bottom">											
			<div class="divider2">&nbsp;</div>
			<ul id="foot">
			</ul>
		</div>
	</body>
</html>