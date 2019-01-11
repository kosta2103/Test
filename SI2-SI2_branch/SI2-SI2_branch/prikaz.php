<?php 
    session_start();
?>


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
			
    </head>

	<body>
		<?php 
            if($_SESSION['sesija'] == 'admin')
            { ?>
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
                        <li class="nav-item active">
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
            <?php
            }
            

            if($_SESSION['sesija'] == 'radnik')
            { ?>
                <nav class="navbar fixed-top navbar-expand-lg">
                    <a class="navbar-brand" href="#">Radnik</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="radnik.php">Pocetna </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="prikaz.php?Tip=proizvodi">Prikaz</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Roba
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="nema_na_stanju.php">Nema na stanju</a>
                            </div>
                        </li>               
                        </ul>
                    </div>
                </nav>
            <?php
            }
            

            if($_SESSION['sesija'] == 'komercijalista')
            { ?>
                <nav class="navbar fixed-top navbar-expand-lg">
                    <a class="navbar-brand" href="#">Komercijalista</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="komercijalista.php">Pocetna </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="prikaz.php?Tip=proizvodi">Prikaz</a>
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
            <?php
            }
            ?>
		<div class="config">								
			<div class="container big">
                <div class="row">
                    <div class="col-sm-2 rightPadding">
                        <div class="container">
							 
                            <form action="prikaz.html" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>
                            </form>

                            <div class="form-group">                    
                                <form id="form1" action="prikaz.php" method="GET">                                   
                                    <select name="Tip" onchange = "submitForm()" class="form-control selectTip">
                                        <option value="" selected disabled hidden>Tip</option>
                                        <option value="proizvodi">Svi proizvodi</option>
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

							<script type="text/javascript">
								function submitForm0()
								{
									document.getElementById('form0').submit();
								}
								function submitForm()
								{
									document.getElementById('form1').submit();
								}
                            </script>
                            
                            <?php
								if (isset($_GET["Tip"])) {
								$select = $_GET["Tip"];
						    ?>

							<form id="form2" action="prikaz.php" method="GET">								
								<div class="form-group">																			
									<input type="text" name="proizvod_barcode" placeholder="Barcode" class="form-control selectTip" autofocus>										
								</div>
								<div class="form-group">									
									<input type="text" name="naziv" placeholder="Naziv" class="form-control selectTip" autofocus>
								</div>									
								<div class="form-group">
									<input type="text" name="proizvodjac" placeholder="Proizvodjac" class="form-control selectTip" autofocus>
								</div>								
								<div class="form-group">
									<input type="text" name="cena" placeholder="Cena" class="form-control selectTip" autofocus>
								</div>
				
								<?php
								if ($select == "eksterni_disk") {
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
									if ($select == "fles_memorija") { ?>
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
									if ($select == "kablovi") { ?>
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
									if ($select == "mikrofon") { ?>
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
									if ($select == "mis") { ?>
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
									if ($select == "monitor") { ?>
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
									if ($select == "podloga") { ?>
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
									if ($select == "projektor") { ?>
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
									if ($select == "skener") { ?>
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
									if ($select == "slusalice") { ?>
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
									if ($select == "stampac") { ?>
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
									if ($select == "tastatura") { ?>
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
									if ($select == "zvucnici") { ?>
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
									?>

									<input type="hidden" name="selektovani_tip" value="<?php echo $select ?>">
									<button type="submit" name="dodaj" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-ok-circle"></i> Submit</button>

								<?php
								}
							?>
							
							</form> 

						</div>
                    </div>
                    <div class="col-sm-10 leftPadding">
                        <div class="container">
							<?php 								
								if(isset($_GET["dodaj"]) || isset($_GET["Tip"]))
								 {								
									$veza = mysqli_connect("localhost", "root", "", "SI2");									
									$barcode = @$_GET["proizvod_barcode"];
									$naziv = @$_GET["naziv"];
									$model = @$_GET["model"];
									$dimenzije = @$_GET["dimenzije"];
									$proizvodjac = @$_GET["proizvodjac"];
									$nabavna_cena = @$_GET["nabavna_cena"];
									$cena = @$_GET["cena"];
									$kolicina = @$_GET["kolicina"];
									$broj_prodatih = @$_GET["broj_prodatih_primeraka"];
									$datum_pos_prodaje = @$_GET["datum_poslednje_prodaje"];
									$duzina_gar_lista = @$_GET["duzina_gar_lista"];
									$link = @$_GET["link"];
									$slika = @$_GET["slika"];
									//$tip = @$_GET["selektovani_tip"];
									isset($_GET["Tip"]) ? $tip = $_GET["Tip"] : $tip = $_GET["selektovani_tip"];
									//echo $barcode."<br>".$naziv."<br>".$model."<br>".$dimenzije."<br>".$proizvodjac."<br>".$cena."<br>".$kolicina."<br>".$duzina_gar_lista."<br>".$link."<br>".$slika."<br>".$tip;
									
									$arr = array();
									$arr2 = array();
									if(!empty($barcode)) $arr["Barcode"] = $barcode;
									if(!empty($naziv)) $arr["Naziv"] = $naziv;
									if(!empty($model)) $arr["Model"] = $model;
									if(!empty($dimenzije)) $arr["Dimenzije"] = $dimenzije;
									if(!empty($proizvodjac)) $arr["Proizvodjac"] = $proizvodjac;
									if(!empty($nabavna_cena)) $arr["Nabavna_cena"] = $nabavna_cena;
									if(!empty($cena)) $arr["Cena"] = $cena;
									if(!empty($kolicina)) $arr["Kolicina"] = $kolicina;
									if(!empty($broj_prodatih)) $arr["Broj_prodatih_primeraka"] = $broj_prodatih;
									if(!empty($datum_pos_prodaje)) $arr["Datum_poslednje_prodaje"] = $datum_pos_prodaje;
									if(!empty($duzina_gar_lista)) $arr["Duzina_garantnog_lista"] = $duzina_gar_lista;
									if(!empty($link)) $arr["Link"] = $link;
									if(!empty($slika)) $arr["Slika"] = $slika;
									if($tip == "eksterni_disk")
									{
										$format = @$_GET["format_eksterni_disk"];
										$povezivanje = @$_GET["povezivanje"];
										$kapacitet = @$_GET["kapacitet"];
										
										if(!empty($format)) $arr2["Format"] = $format;
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($kapacitet)) $arr2["Kapacitet"] = $kapacitet;
									}
									if($tip == "fles_memorija")
									{
										$usb_type_c = @$_GET["usb_type_c"];
										$brzina_citanja_pisanja = @$_GET["brzina_citanja_pisanja"];
										$kapacitet = @$_GET["kapacitet"];
										$povezivanje = @$_GET["povezivanje"];
										if(!empty($usb_type_c)) $arr2["USB_type_C"] = $usb_type_c;
										if(!empty($brzina_citanja_pisanja)) $arr2["Brzina_citanja_pisanja"] = $brzina_citanja_pisanja;
										if(!empty($kapacitet)) $arr2["Kapacitet"] = $kapacitet;
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
									}
									if($tip == "kablovi")
									{
										$strana_1 = @$_GET["strana_1"];
										$strana_2 = @$_GET["strana_2"];
										$broj_uticnica = @$_GET["broj_uticnica"];
										$tip_kablovi = @$_GET["tip"];
										$prekidac = @$_GET["prekidac"];
										$vrsta = @$_GET["vrsta_kablovi"];
										
										if(!empty($strana_1)) $arr2["Strana_1"] = $strana_1;
										if(!empty($strana_2)) $arr2["Strana_2"] = $strana_2;
										if(!empty($broj_uticnica)) $arr2["Broj_uticnica"] = $broj_uticnica;
										if(!empty($tip_kablovi)) $arr2["Tip_kablovi"] = $tip_kablovi;
										if(!empty($prekidac)) $arr2["Prekidac"] = $prekidac;
										if(!empty($vrsta)) $arr2["Vrsta"] = $vrsta;
									}
									if($tip == "mikrofon")
									{
										$povezivanje = @$_GET["povezivanje"];
										$duzina_kabla = @$_GET["duzina_kabla"];
										$frekvencijski_raspon = @$_GET["frekvencijski_raspon"];
										
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($duzina_kabla)) $arr2["Duzina_kabla"] = $duzina_kabla;
										if(!empty($frekvencijski_raspon)) $arr2["Frekvencijski_raspon"] = $frekvencijski_raspon;
									}
									if($tip == "mis"){
										$za_obe_ruke = @$_GET["za_obe_ruke"];
										$rezolucija = @$_GET["rezolucija_mis"];
										$povezivanje = @$_GET["povezivanje_mis"];
										$gaming = @$_GET["gaming"];
										$senzor = @$_GET["senzor_mis"];
										
										if(!empty($za_obe_ruke)) $arr2["Za_obe_ruke"] = $za_obe_ruke;
										if(!empty($rezolucija)) $arr2["Rezolucija"] = $rezolucija;
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($gaming)) $arr2["Gaming"] = $gaming;
										if(!empty($senzor)) $arr2["Senzor"] = $senzor;
									}
									if($tip == "monitor")
									{
										$povezivanje = @$_GET["povezivanje"];
										$maksimalna_rezolucija = @$_GET["maksimalna_rezolucija"];
										$usb = @$_GET["usb_monitor"];
										$ugradjeni_zvucnici = @$_GET["ugradjeni_zvucnici"];
										$dijagonala_ekrana = @$_GET["dijagonala_ekrana"];
										$brzina_osvezavanja = @$_GET["brzina_osvezavanja"];
										$hdmi = @$_GET["hdmi_monitor"];
										$dvi = @$_GET["dvi"];
										$vga = @$_GET["vga"];
										$display_port = @$_GET["display_port"];
										$podesavanje_po_visini = @$_GET["podesavanje_po_visini"];
										$touchscreen = @$_GET["touchscreen"];
										$rotacija = @$_GET["rotacija"];
										
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($maksimalna_rezolucija)) $arr2["Maksimalna_rezolucija"] = $maksimalna_rezolucija;
										if(!empty($usb)) $arr2["USB"] = $usb;
										if(!empty($ugradjeni_zvucnici)) $arr2["Ugradjeni_zvucnici"] = $ugradjeni_zvucnici;
										if(!empty($dijagonala_ekrana)) $arr2["Dijagonala_ekrana"] = $dijagonala_ekrana;
										if(!empty($brzina_osvezavanja)) $arr2["Brzina_osvezavanja"] = $brzina_osvezavanja;
										if(!empty($hdmi)) $arr2["HDMI"] = $hdmi;
										if(!empty($dvi)) $arr2["DVI"] = $dvi;
										if(!empty($vga)) $arr2["VGA"] = $vga;
										if(!empty($display_port)) $arr2["Display_port"] = $display_port;
										if(!empty($podesavanje_po_visini)) $arr2["Podesavanje_po_visini"] = $podesavanje_po_visini;
										if(!empty($touchscreen)) $arr2["TouchScreen"] = $touchscreen;
										if(!empty($rotacija)) $arr2["Rotacija"] = $rotacija;
									}
									if($tip == "podloga")
									{
										$tip_podloga = @$_GET["tip_podloga"];
										$materijal = @$_GET["materijal_podloga"];
										
										if(!empty($tip_podloga)) $arr2["Tip_podloga"] = $tip_podloga;
										if(!empty($materijal)) $arr2["Materijal"] = $materijal;
									}
									if($tip == "projektor")
									{
										$povezivanje = @$_GET["povezivanje"];
										$tip_projektor = @$_GET["tip_projektor"];
										$rezolucija = @$_GET["rezolucija"];
										$osvetljenje = @$_GET["osvetljenje"];
										$wireless = @$_GET["wireless"];
										$usb = @$_GET["usb"];
										$mreza = @$_GET["mreza"];
										$hdmi = @$_GET["hdmi"];
										$dvi = @$_GET["dvi"];
										$rs232 = @$_GET["rs232"];
										$vga = @$_GET["vga"];
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($tip_projektor)) $arr2["Tip_projektor"] = $tip_projektor;
										if(!empty($rezolucija)) $arr2["Rezolucija"] = $rezolucija;
										if(!empty($osvetljenje)) $arr2["Osvetljenje"] = $osvetljenje;
										if(!empty($wireless)) $arr2["Wireless"] = $wireless;
										if(!empty($usb)) $arr2["USB"] = $usb;
										if(!empty($mreza)) $arr2["Mreza"] = $mreza;
										if(!empty($hdmi)) $arr2["HDMI"] = $hdmi;
										if(!empty($dvi)) $arr2["DVI"] = $dvi;
										if(!empty($rs232)) $arr2["RS232"] = $rs232;
										if(!empty($vga)) $arr2["VGA"] = $vga;
									}
									if($tip == "skener")
									{
										$format = @$_GET["format_skener"];
										$flatbed = @$_GET["flatbed"];
										$povezivanje = @$_GET["povezivanje"];
										$rezolucija = @$_GET["rezolucija"];
										$adf = @$_GET["adf"];
										
										if(!empty($format)) $arr2["Format"] = $format;
										if(!empty($flatbed)) $arr2["Flatbed"] = $flatbed;
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($rezolucija)) $arr2["Rezolucija"] = $rezolucija;
										if(!empty($adf)) $arr2["ADF"] = $adf;
									}
									if($tip == "slusalice")
									{
										$tip_slusalice = @$_GET["tip_slusalice"];
										$mikrofon = @$_GET["mikrofon_slusalice"];
										$zvucni_sistem = @$_GET["zvucni_sistem_slusalice"];
										$povezivanje = @$_GET["povezivanje"];
										$gaming = @$_GET["gaming"];
										$frekvencijski_raspon = @$_GET["frekvencijski_raspon"];
										
										if(!empty($tip_slusalice)) $arr2["Tip_slusalice"] = $tip_slusalice;
										if(!empty($mikrofon)) $arr2["Mikrofon"] = $mikrofon;
										if(!empty($zvucni_sistem)) $arr2["Zvucni_sistem"] = $zvucni_sistem;
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($gaming)) $arr2["Gaming"] = $gaming;
										if(!empty($frekvencijski_raspon)) $arr2["Frekvencijski_raspon"] = $frekvencijski_raspon;										
									}
									if($tip == "stampac")
									{
										$tip_stampac = @$_GET["tip_stampac"];
										$povezivanje = @$_GET["povezivanje"];
										$rezolucija = @$_GET["rezolucija"];
										$brzina_stampe = @$_GET["brzina_stampe"];
										$bar_kod = @$_GET["bar_kod"];
										$mreza = @$_GET["mreza"];
										$wireless = @$_GET["wireless"];
										
										if(!empty($tip_stampac)) $arr2["Tip_stampac"] = $tip_stampac;
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($rezolucija)) $arr2["Rezolucija"] = $rezolucija;
										if(!empty($brzina_stampe)) $arr2["Brzina_stampe"] = $brzina_stampe;
										if(!empty($bar_kod)) $arr2["Bar_kod"] = $bar_kod;
										if(!empty($mreza)) $arr2["Mreza"] = $mreza;
										if(!empty($wireless)) $arr2["Wireless"] = $wireless;	
									}
									if($tip == "tastatura")
									{
										$povezivanje = @$_GET["povezivanje"];
										$usb_port = @$_GET["usb_port"];
										$numericki_deo = @$_GET["numericki_deo"];
										$tip_tastatura = @$_GET["tip_tastatura"];
										$tip_tastera = @$_GET["tip_tastera_tastatura"];
										$programabilni_tasteri = @$_GET["programabilni_tasteri"];
										$rgb_osvetljenje = @$_GET["rgb_osvetljenje"];
										
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($usb_port)) $arr2["USB_port"] = $usb_port;
										if(!empty($numericki_deo)) $arr2["Numericki_deo"] = $numericki_deo;
										if(!empty($tip_tastatura)) $arr2["Tip_tastatura"] = $tip_tastatura;
										if(!empty($tip_tastera)) $arr2["Tip_tastera"] = $tip_tastera;
										if(!empty($programabilni_tasteri)) $arr2["Programabilni_tasteri"] = $programabilni_tasteri;
										if(!empty($rgb_osvetljenje)) $arr2["RGB_osvetljenje"] = $rgb_osvetljenje;
									}
									if($tip == "zvucnici")
									{
										$zvucni_sistem = @$_GET["zvucni_sistem_zvucnici"];
										$snaga = @$_GET["snaga"];
										$konektori = @$_GET["konektori"];
										$povezivanje = @$_GET["povezivanje"];
										$frekvencijski_raspon = @$_GET["frekvencijski_raspon"];
										
										if(!empty($zvucni_sistem)) $arr2["Zvucni_sistem"] = $zvucni_sistem;
										if(!empty($snaga)) $arr2["Snaga"] = $snaga;
										if(!empty($konektori)) $arr2["Konektori"] = $konektori;
										if(!empty($povezivanje)) $arr2["Povezivanje"] = $povezivanje;
										if(!empty($frekvencijski_raspon)) $arr2["Frekvencijski_raspon"] = $frekvencijski_raspon;
									}
									
									if($tip == "proizvodi")
									{
										$sql = "SELECT Barcode, Naziv, Proizvodjac, Cena, Kolicina, Link, Slika  FROM $tip WHERE ";
										foreach(array_keys($arr) as $line)
										{
											$sql = $sql . "$tip." .$line ." = '".$arr[$line]."' AND ";
										}
										if(empty($arr)) $sql = trim($sql, " WHERE ");
										else $sql = trim($sql, " AND ");
									}
									else if($tip == "monitor")
									{
										$sql = "SELECT proizvodi.Barcode, proizvodi.Naziv, proizvodi.Proizvodjac, proizvodi.Cena, proizvodi.Slika, $tip.Povezivanje, $tip.Maksimalna_rezolucija, $tip.Dijagonala_ekrana, $tip.Brzina_osvezavanja FROM proizvodi, $tip WHERE ";
										foreach(array_keys($arr) as $line)
										{
											$sql = $sql . "proizvodi." .$line ." = '".$arr[$line]."' AND ";
										}
										foreach(array_keys($arr2) as $line)
										{
											$sql = $sql . "$tip." .$line ." = '".$arr2[$line]."' AND ";
										}
										$sql = $sql."proizvodi.Barcode = $tip.Barcode AND ";
										$sql = $sql."proizvodi.Tip = '$tip'";
									}
									else
									{
										$sql = "SELECT proizvodi.Barcode, proizvodi.Naziv, proizvodi.Proizvodjac, proizvodi.Cena, proizvodi.Slika, $tip.* FROM proizvodi, $tip WHERE ";
										foreach(array_keys($arr) as $line)
										{
											$sql = $sql . "proizvodi." .$line ." = '".$arr[$line]."' AND ";
										}
										foreach(array_keys($arr2) as $line)
										{
											$sql = $sql . "$tip." .$line ." = '".$arr2[$line]."' AND ";
										}
										$sql = $sql."proizvodi.Barcode = $tip.Barcode AND ";
										$sql = $sql."proizvodi.Tip = '$tip'";
									}
									
									//echo $sql;
									$niz_izabranih = $veza->query($sql)->fetch_all(MYSQLI_ASSOC);																										
								?>

									

									<table align = 'center' border = 1>
										<?php
											if(!empty($niz_izabranih[0]))
											{
												echo "<tr>";
												foreach(array_keys($niz_izabranih[0]) as $line)
												{
													echo "<th>".$line."</th>";
												}
												?>												

													<th>
														<form action="korpa.php" method="POST">
															<input type="hidden" name="barkod" value="<?php echo @$bar ?>">
															<button type="submit" title="Korpa"><i class="glyphicon glyphicon-shopping-cart"></i></button>
														</form>
													</th>
												</tr>

												<?php
											}
											$i = 0;
											foreach($niz_izabranih as $line1)
											{
												echo "<tr>";
													foreach($line1 as $line2)
													{
														if(array_search($line2, $line1) == "Link")
														{
															$string = "<a href='$line2'>$line2</a>";															 
															$line2 = $string;
															echo "<td>$line2</td>";
														}
														elseif(array_search($line2, $line1) == "Slika")
														{
															$string = "<a href='$line2'>
															 <img src='$line2' alt='' class='img-thumbnail'> </a>";															 
															$line2 = $string;
															echo "<td>$line2</td>";
														}
														else echo "<td>$line2</td>";
													}	
													$bar = $niz_izabranih[$i]["Barcode"];
													?>
													<td>											 	
													 	<form action="izmeni.php" method="GET">
													 		<input type="hidden" name="barkod" value="<?php echo $bar ?>">
													 		<button type="submit" title="Edit"><i class="glyphicon glyphicon-edit"></i></button>
													 	</form>
													 	<form action="obrisi.php" method="GET">
													 		<input type="hidden" name="barkod" value="<?php echo $bar ?>">
															<button type="submit" title="Obrisi"><i class="glyphicon glyphicon-remove"></i></button>
														</form>
														<form action="" method="POST">
															<input type="hidden" name="barkod" value="<?php echo $bar ?>">
															<button type="submit" name="dodaj_u_korpu" title="Dodaj u korpu"><i class="glyphicon glyphicon-plus"></i></button>
														</form>
													 </td>

													 <?php	
													 $i++;											
												echo "</tr>";

											}
											if(isset($_POST['dodaj_u_korpu']))
											{
												$barcode = $_POST["barkod"];
												$niz = $veza->query("SELECT Kolicina FROM proizvodi WHERE Barcode = $barcode")->fetch_all();

												if($niz[0][0] > 0)
												{
													if(in_array($barcode, array_keys($_SESSION["korpa"])))
													{
														$_SESSION["korpa"][$barcode]++;
													}
													else
													{
														$_SESSION["korpa"][$barcode] = 1;
													}
												}
												else
												{
													echo '<script> alert("Proizvod nije dostupan") </script>';
												}
											}
										?>
										
									</table>
								<?php } 
							?> 
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
		</div>		
	</body>
</html>