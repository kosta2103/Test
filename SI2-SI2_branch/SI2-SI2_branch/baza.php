	<?php

	    $localhost = "localhost";
	    $username = "root";
	    $password = "";
	    $db_name = "SI2";
		
	    echo "Uspostavljanje konekcije...<br>";
	    $konekcija = new mysqli($localhost, $username, $password);
		
	    echo "Kreiranje baze podataka $db_name !<br>";
	    
	    $baza = "CREATE DATABASE IF NOT EXISTS SI2";
	    $konekcija->query($baza) or die("Baza $db_name vec postoji!");
	    echo "Baza kreirana! <br>";

	    mysqli_select_db($konekcija, $db_name);
	    echo "Baza izabrana! <br>";
		
	    $tabela_korisnika = "CREATE TABLE IF NOT EXISTS AUTORIZOVANI_KORISNICI (
			ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	  		Ime VARCHAR(20),
	  		Prezime VARCHAR(20),
	        E_mail_adresa VARCHAR(50),
			Password VARCHAR(50),
	        Nivo_pristupa ENUM ('Administrator', 'Vlasnik', 'Komercijalista', 'Radnik')
	    )";

	    $tabela_prozivoda = "CREATE TABLE IF NOT EXISTS PROIZVODI(
	        ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Barcode INT UNIQUE,
	        Naziv VARCHAR(100),
	        Model VARCHAR(50),
	        Dimenzije VARCHAR(50),
	        Proizvodjac VARCHAR(20),
			Nabavna_cena INT(20),
	        Cena INT(20),
	        Kolicina INT(20),
			Broj_prodatih_primeraka INT(20),
			Datum_poslednje_prodaje VARCHAR(20),
	        Duzina_garantnog_lista VARCHAR(20),
	        Link VARCHAR(255),
	        Slika VARCHAR(255),
	        Tip ENUM ('tastatura', 'mis', 'podloga', 'stampac', 'skener', 'monitor', 
	        'projektor', 'kablovi', 'slusalice', 'zvucnici', 'mikrofon', 'eksterni_disk', 'fles_memorija')
	    )";


	    $tabela_tastatura = "CREATE TABLE IF NOT EXISTS TASTATURA(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Povezivanje VARCHAR(20),
	        USB_port VARCHAR(2),
	        Numericki_deo VARCHAR(2),
	        Tip_tastatura ENUM ('Wired', 'Wireless', 'Bluetooth'),
	        Tip_tastera ENUM ('Mehanicki', 'X_Scissor', 'Gumena_membrana', 'Hibridni'),
	        Programabilni_tasteri VARCHAR(2),
	        RGB_osvetljenje VARCHAR(2)
	    ) ";

	    $tabela_mis = "CREATE TABLE IF NOT EXISTS MIS(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Za_obe_ruke VARCHAR(20),
	        Rezolucija ENUM ('<1000 dpi', '1000-2000 dpi', '2000-3000 dpi', '3000-4000 dpi', '>4000 dpi'),
	        Povezivanje ENUM ('USB', 'PS/2', 'Wireless', 'Bluetooth'),
	        Gaming VARCHAR(2),
	        Senzor ENUM ('Opticki', 'Laserski', 'Hero')
	    )";

	    $tabela_podloga = "CREATE TABLE IF NOT EXISTS PODLOGA(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Tip_podloga ENUM ('Obicna', 'Sa gelom', 'Gamerska'),
	        Materijal ENUM ('PVC', 'Guma', 'Platno')
	    )";

	    $tabela_stampac = "CREATE TABLE IF NOT EXISTS STAMPAC(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Tip_stampac ENUM ('Matricni', 'Laserski'),
	        Povezivanje VARCHAR(20),
	        Rezolucija VARCHAR(20),
	        Brzina_stampe VARCHAR(20),
	        Bar_kod VARCHAR(2),
	        Mreza VARCHAR(2),
	        Wireless VARCHAR(2)
	    )";


	    $tabela_skener = "CREATE TABLE IF NOT EXISTS SKENER(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Format ENUM('A6', 'A5', 'A4', 'A3', 'A2', 'A1', 'A0', '>A0'),
	        Flatbed VARCHAR(2),
	        Povezivanje VARCHAR(20),
	        Rezolucija VARCHAR(20),
	        ADF VARCHAR(2)
	    )";

	    $tabela_monitor = "CREATE TABLE IF NOT EXISTS MONITOR(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Povezivanje VARCHAR(50),
	        Maksimalna_rezolucija VARCHAR(20),
	        USB ENUM('1', '2', '3', '4', '>4', 'Ne'),
	        Ugradjeni_zvucnici VARCHAR(2),
	        Dijagonala_ekrana VARCHAR(20),
	        Brzina_osvezavanja VARCHAR(20),
	        HDMI ENUM('1', '2', '3', '>3', 'Ne'),
	        DVI VARCHAR(2),
	        VGA VARCHAR(2),
	        Display_port VARCHAR(2),
	        Podesavanje_po_visini VARCHAR(2),
	        TouchScreen VARCHAR(2),
	        Rotacija VARCHAR(2)
	    )";

	    $tabela_projektor = "CREATE TABLE IF NOT EXISTS PROJEKTOR(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Povezivanje VARCHAR(20),
	        Tip_projektor ENUM ('DLP', 'DLP LCD', '3LCD', 'LCOS', 'LCD'),
	        Rezolucija VARCHAR(20),
	        Osvetljenje VARCHAR(20),
	        Wireless VARCHAR(2),
	        USB VARCHAR(2),
	        Mreza VARCHAR(2),
	        HDMI VARCHAR(2),
	        DVI VARCHAR(2),
	        RS232 VARCHAR(2),
	        VGA VARCHAR(2)
	    )";

	    $tabela_kablovi = "CREATE TABLE IF NOT EXISTS KABLOVI(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Strana_1 VARCHAR(20),
	        Strana_2 VARCHAR(20),
	        Broj_uticnica VARCHAR(20),
	        Tip_kablovi VARCHAR(20),
	        Prekidac VARCHAR(2),
	        Vrsta ENUM('Kabl', 'Adapter')
	    )";


	    $tabela_slusalice = "CREATE TABLE IF NOT EXISTS SLUSALICE(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Tip_slusalice ENUM('Bubice', 'Slusalice'),
	        Mikrofon ENUM('Ne', 'Na rucici', 'Na slusalici', 'Na kablu'),
	        Zvucni_sistem ENUM('5.1', '7.1'),
	        Povezivanje VARCHAR(20),
	        Gaming VARCHAR(2),
			Frekvencijski_raspon VARCHAR(30)
	    )";


	    $tabela_zvucnici = "CREATE TABLE IF NOT EXISTS ZVUCNICI(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Zvucni_sistem ENUM('4.1', '5.1', '7.1'),
	        Snaga VARCHAR(20),
	        Konektori VARCHAR(100),
	        Povezivanje VARCHAR(50),
			Frekvencijski_raspon VARCHAR(30)
	    )";

	   
	    $tabela_mikrofon = "CREATE TABLE IF NOT EXISTS MIKROFON(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Povezivanje VARCHAR(20),
	        Duzina_kabla VARCHAR(20),
	        Frekvencijski_raspon VARCHAR(30)
	    )"; 
	    
	    
	    $tabela_ediskovi = "CREATE TABLE IF NOT EXISTS EKSTERNI_DISK(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        Format ENUM ('2.5', '3.5'),
	        Povezivanje VARCHAR(20),
	        Kapacitet VARCHAR(20)
	    )";

	    $tabela_flash = "CREATE TABLE IF NOT EXISTS FLES_MEMORIJA(
	        Barcode INT UNSIGNED PRIMARY KEY,
	        USB_type_C VARCHAR(2),
	        Brzina_citanja_pisanja VARCHAR(20),
	        Kapacitet VARCHAR(20),
	        Povezivanje VARCHAR(20)
	    )";
	     
	    
	     

	    $konekcija->query($tabela_korisnika) or die($konekcija->error);
	    $konekcija->query($tabela_prozivoda) or die($konekcija->error);
	    $konekcija->query($tabela_tastatura) or die($konekcija->error);
	    $konekcija->query($tabela_mis) or die($konekcija->error);
	    $konekcija->query($tabela_podloga) or die($konekcija->error);
	    $konekcija->query($tabela_stampac) or die($konekcija->error);
	    $konekcija->query($tabela_skener) or die($konekcija->error);
	    $konekcija->query($tabela_monitor) or die($konekcija->error);
	    $konekcija->query($tabela_projektor) or die($konekcija->error);
	    $konekcija->query($tabela_kablovi) or die($konekcija->error);
	    $konekcija->query($tabela_slusalice) or die($konekcija->error);
	    $konekcija->query($tabela_zvucnici) or die($konekcija->error);
	    $konekcija->query($tabela_mikrofon) or die($konekcija->error);
	    $konekcija->query($tabela_ediskovi) or die($konekcija->error);
	    $konekcija->query($tabela_flash) or die($konekcija->error);
	    

	    echo "Sve potrebne tabele su kreirane!";

	    $unos_korisnika = 
	    "INSERT INTO AUTORIZOVANI_KORISNICI (Ime, Prezime, E_mail_adresa, Password, Nivo_pristupa) VALUES 
	        ('Kosta','Eric','kgkosta360@gmail.com', 'kosta123', 'Vlasnik'),
	        ('Marko','Markovic', 'mare_bg@yahoo.com', 'marko123', 'Radnik'),
	        ('Jovana','Lukic','jl87@gmail.com', 'jovana123', 'Komercijalista'),
	        ('Katarina','Markovic', 'karatina@gmail.com', 'katarina123', 'Administrator')
	    ";

	    $unos_proizvoda = "INSERT INTO PROIZVODI (Barcode, Naziv, Model, Dimenzije, Proizvodjac, Nabavna_cena, Cena, Kolicina, Broj_prodatih_primeraka, Datum_poslednje_prodaje, Duzina_garantnog_lista, Link, Slika, Tip) VALUES
	        (5219891, 'Tastatura Logitech G910 Mechanical Gaming', 'G910 Orion Spark', '505 x 243.5 x 35.5mm', 'Logitech', '15350', '19190', '7', '24', '2018-03-29', '1 godina', 'https://www.logitechg.com/en-us/products/gaming-keyboards/g910-orion-rgb-gaming-keyboard.html', 'https://www.logitechg.com/content/dam/gaming/en/products/g910/g910-hero-feature-1-desktop.png.imgw.1888.1888.png', 'tastatura'),
	        (8784608, 'Tastatura USB US Logitech G613', 'G613', '478 x 216 x 33mm', 'Logitech', '12700', '15990', '4', '59', '2018-07-05', '2 godine', 'https://www.logitechg.com/en-roeu/products/gaming-keyboards/g613-wireless-mechanical-gaming-keyboard.html', 'https://www.logitechg.com/content/dam/gaming/en/products/g613/g613-intro-desktop.png.imgw.1888.1888.png', 'tastatura'),

	        (2135262, 'Mis HyperX Pulsfire FPS Pro Gaming', 'Pulse Fire FPS Pro RGB',
	        '120 x 63 x 41mm', 'HyperX', '5592', '6990', '10', '150', '2018-12-15', '1 godina', 'https://www.hyperxgaming.com/en/mice/pulsefire-fps-gaming-mouse',
	        'https://www.gigatron.rs/img/products/large/image58f8b07edd01c.png',
	        'mis'),
	        (5177568, 'Mis USB Logitech G603 Lightspeed', 'G603', '115 x 67 x 38mm', 
	        'Logitech', '7510', '9390', '2', '200', '2018-12-20', '3 godine', 'http://gaming.logitech.com/en-us/product/g603-lightspeed-wireless-gaming-mouse#specsAnchor',
	        'https://www.avadirect.com/Pictures/500/11498330_5.png',
	        'mis'),

	        (5830957, 'Podloga za mis Genesis M12 Maxi Carbon 500 Flash NPG-1282', 'M12 Maxi Carbon 500 NPG -1282', '450 × 900 x 2,5mm', 'Genesis', '1830', '2290',
	        '20', '40', '2018-09-09', '1 godina', 'http://genesis-zone.com/en/product/carbon-500-maxi-flash-gaming-mousepad/', 
	        'http://genesis-zone.com/wp-content/uploads/2018/04/maxi_flash_1000x700_3-604x270.png', 'podloga'),
	        (4317640, 'Podloga Mionix Sargas S', 'Sargas S', '270 × 400 x 2mm', 'Mionix', '790', 
	        '990','0', '44', '2018-01-25', '6 meseci', 'https://mionix.net/', 'http://gildiagraczy.pl/wp-content/uploads/2016/08/Mionix-Sargas-S-Mousepad-01.png', 'podloga'),

	        (5647681, 'Stampac A4 Epson LX-350', 'LX-350', '12.3 x 27.10 x 14.56 in', 'Epson', '20230', '25290', '2', '20', '2018-05-07', '4 godine', 'https://www.epson.eu/products/printers/dot-matrix-printers/lx-350', 'https://mediaserver.goepson.com/ImConvServlet/imconv/58d2a08a26e470ded89211dde9f6c02b71c32152/515Wx515H?use=productpictures&assetDescr=C11CC24001_Impact+Printers_Epson+LX-350_EN', 'stampac'),
	        (7049080, 'Stampac HP LaserJet Pro M501dn', 'M501dn', '16.46 x 25.16 x 11.38 in','HP', '31100', '38890', '1', '25', '2017-12-23', '4 godine', 'http://www8.hp.com/us/en/products/printers/product-detail.html?oid=7710401#!tab=specs',
	        'https://product-images.www8-hp.com/digmedialib/prodimg/lowres/c04997812.png', 'stampac'),

	        (6091935, 'Skener A3 Mustek F2400N', 'F2400N', '14 x 4 x 10 in', 'Mustek', '32790', 
	        	'40990', '0', '36', '2018-04-30', '2 godine', 'http://www.mustek.com/products/large-a3-scanner/9-a3f2400n',
	        	'https://www.mustek.de/files/23177/highres/A3F1200N.20.png',
	        	'skener'),
	        (4828429, 'Skener A4 Epson WorkForce DS-1630', 'DS-1630', '280‎ x 430 x 67 mm',
	        	'Epson', '24790', '30990', '3', '13', '2017-08-14', '2 godine', 'https://www.epson.co.uk/products/scanners/consumer-scanners/perfection-v370-photo',
	        	'https://www.epson.co.uk/files/assets/converted/1500m-1500m/2/0/4/6/20467-productpicture-lores-en-ds-1630_main.png.png', 'skener'
	        ),

	        (3799008, 'Monitor 14 HP L7014t TN', 'L7014t', '13.4 x 1.7 x 8.6 in', 'HP', '35990', '44990', '17', '78', '2018-06-13', '3 godine', 'http://www8.hp.com/us/en/products/oas/product-detail.html?oid=10691873', 'https://s0emmi.multimedija.rs/media/catalog/product/863/08/8630856.jpg', 'monitor'),
	        (3404060, 'Monitor 32 Benq PV3200PT IPS', 'PV3200PT', '18.4 x 1.7 x 14.6 in', 'Benq', '110300', '137890', '3', '57', '2018-10-03', '3 godine', 'https://www.benq.com/en/monitor/video-post-production/pv3200pt.html', 'https://www.benq.com/content/dam/b2c/en/monitors/pv/pv3200pt/gallery/pv3200pt-front.png', 'monitor'),


	        (2804973, 'Projektor Acer H6517ABD', 'H6517ABD', '296mm x 221mm x 120mm', 'Acer', '67200', '83990', '4', '15', '2017-05-25', '2 godine', 'https://www.acer.com/ac/en/SI/content/model/MR.JNB11.001', 'https://s0emmi.multimedija.rs/media/catalog/product/680/67/6806709.jpg', 'projektor'),
	        (3420597, 'Projektor ViewSonic PA502SP', 'PA502SP', '256mm x 184mm x 120mm', 'ViewSonic', '37400', '46790', '2', '27', '2018-01-25', '2 godine', 'https://www.viewsonic.com/eu/products/projectors/PA502SP.php', 'https://www.viewsonic.com/eu/asset-files/images/slides/0projector/PA502SP/scaled/PA502SP_LF01_h.jpg', 'projektor'),

	        (2217886, 'VGA Kabl za monitor 15-pin HDD na 15-pin HDD M 1.8m', 'Hama 41933', '1.8m', 'Hama', '800', '999', '30', '356', '2018-07-29', '6 meseci', 'https://www.hama.com/i/00041933/hama-vga-cable-ferrite-core-double-shielded-180-m?bySearch=41933', 'https://www.hama.com/bilder/00041/abx/00041933abx.jpg', 'kablovi'),
	        (4022441, 'Adapter 3.5mm (zenski) na 2x cinc (muski) Hama 43254', 'Hama 43254', '0.1m', 'Hama', '250', '317', '50', '420', '2018-10-10', '1 godina', 'https://www.hama.com/i/00043254/hama-audio-adapter-2-rca-male-plugs-35-mm-female-jack-stereo?bySearch=43254', 'https://www.hama.com/bilder/00043/abx/00043254abx.jpg', 'kablovi'),

			(3268589, 'Slusalice sa mikrofonom HyperX Cloud Alpha HX-HSCA-RD/EM', 'Cloud Alpha', 'duzina kabla 2m', 'HyperX', '12000', '14990', '0', '98', '2018-12-07', '3 godine', 'https://www.hyperxgaming.com/us/headsets/cloud-alpha-pro-gaming-headset',
			'https://s0emmi.multimedija.rs/media/catalog/product/861/44/8614442.jpg', 'slusalice'),
			(6882212, 'Slusalice sa mikrofonom Razer Hammerhead pro V2 RZ04', 'RZ04-01730100-R3G1', 'duzina kabla 1.3m', 'Razer', '9100', '11390', '20', '74', '2018-11-17', '2 godine', 'https://www.razer.com/gaming-audio/razer-hammerhead-pro-v2', 'https://s0emmi.multimedija.rs/media/catalog/product/863/42/8634232.jpg', 'slusalice'),
			(5941612, 'Slusalice sa mikrofonom Razer Kraken Pro V2 RZ04-02050500-R3M1', 'Kraken PRO V2 RZ04-02050500-R3M1', 'duzina kabla 3.2m', 'Razer', '9600', '11990', '5', '54', '2018-05-23', '3 godine', 'https://www.razer.com/gaming-audio/razer-kraken-pro-v2', 'https://s0emmi.multimedija.rs/media/catalog/product/863/41/8634127.jpg', 'slusalice'),
		
			(6351577, 'Zvucnici 5.1 Genius SW-G5.1 3500', 'SW-G5.1 3500', '/', 'Genius', '7990', '9990', '0', '76', '2017-12-30', '3 godine', 'http://global.geniusnet.com/Genius/wSite/ct?xItem=56291', 'https://s0emmi.multimedija.rs/media/catalog/product/116/90/1169092.jpg', 'zvucnici'),
			(6638247, 'Zvucnici 5.1 Logitech Z607 80W bluetooth', 'Z607', '/', 'Logitech', '15100', '18990', '4', '102', '2018-07-16', '4 godine', 'https://www.logitech.com/en-nz/product/z607-surround-sound-system', 'https://assets.logitech.com/assets/65551/3/z607-merida-pdp.png', 'zvucnici'),
			(6296467, 'Zvučnici 5.1 Logitech Z906', 'Z906', '/', 'Logitech', '35990', '44990', '6', '45', '2018-04-29', '4 godine', 'https://www.logitech.com/en-us/product/speaker-system-z906', 'https://assets.logitech.com/assets/54713/z906-gallery.png', 'zvucnici'),

			(1938070, 'TRUST mikrofon STARZZ', 'STARZZ', '135 x 45 x 45 mm', 'TRUST', '1600', '1999', '10', '83', '2018-02-27', '2 godine', 'https://www.trust.com/en/product/21671-starzz-all-round-microphone-for-pc-and-laptop', 'https://d7qztf2ityad6.cloudfront.net/21671/21671_pictures_product_visual_1.png?f=RM1920,800', 'mikrofon'),
			(6353093, 'Mikrofon Audio-Technica AT2020USB', 'AT2020USB+', '162 x 52 x 52', 'Audio-technica', '18800', '23590', '0', '197', '2018-11-24', '3 godine', 'https://www.audio-technica.com/cms/wired_mics/c75c5918ed57a8d0/index.html', 'https://cdn.audio-technica.com/cms/resource_library/product_images/a2b9cb16563d3b88/large/at2020_usb_1_sq@2x.jpg', 'mikrofon'),

			(9372997, 'HDD External 2.5 1TB A-Data AHD650-1TU3-CBK', 'AHD650-1TU3-CBK', '121 x 81 x 21mm', 'A-Data', '5070', '6340', '25', '34', '2018-12-21', '3 godine', 'http://www.adata.com/en/feature/260', 'https://s0emmi.multimedija.rs/media/catalog/product/680/49/6804908.jpg', 'eksterni_disk'),
			(7741000, 'HDD External 3.5 4TB Seagate USB 3.0 STEB4000200', 'STEB4000200', '176 x 120 x 30mm', 'Seagate', '11990', '14990', '10', '100', '2017-05-13', '2 godine', 'https://www.seagate.com/gb/en/consumer/backup/expansion-hard-drive/', 'https://www.seagate.com/files/www-content/product-content/expansion-fam/expansion-external/_shared/images/1-nexpansion-desk-main-400x400.jpg', 'eksterni_disk'),

			(9032190, 'USB Flash 32GB 3.1 SanDisk SDDDC2-032G-G46 Ultra Dual Drive', 'SDDDC2-032G-G46', '9.4 x 38.10 x 20.07mm', 'SanDisk', '2390', '2990', '50', '71', '2018-04-22', '2 godine', 'https://www.sandisk.com/home/mobile-device-storage/ultra-dual-drive-usb-type-c', 'https://www.sandisk.com/content/dam/sandisk-main/en_us/assets/product/retail/DualDrive_TypeC-left_TypeCopen.png', 'fles_memorija'),
			(1424316, 'USB Flash 128GB 2.0 SanDisk SDCZ50-128G-B35 Blade Teardrope', 'Blade Teardrope (SDCZ50-128G-B35)', '7.4 x 17.6 x 41.5mm', 'SanDisk', '3350', '4190', '22', '64', '2018-07-19', '3 godine', 'https://www.sandisk.com/home/usb-flash/cruzer-blade', 'https://www.sandisk.com/content/dam/sandisk-main/en_us/portal-assets/product-images/retail-products/Cruzer_Blade_angle.png', 'fles_memorija')
	    ";

	    $unos_tastature = "INSERT INTO TASTATURA (Barcode, Povezivanje, USB_port, Numericki_deo, Tip_tastatura, Tip_tastera, Programabilni_tasteri, RGB_osvetljenje) VALUES
	        (5219891, 'USB', 'Ne', 'Da', 'Wired', 'Mehanicki', 'Ne', 'Da'),
	        (8784608, 'USB, Wireless', 'Ne', 'Da', 'Wireless', 'Mehanicki', 'Ne', 'Da')
	    ";


	    $unos_misa = "INSERT INTO MIS (Barcode, Za_obe_ruke, Rezolucija, Povezivanje, Gaming, Senzor) VALUES
	    	(2135262, 'Ne', '>4000 dpi', 'USB', 'Da', 'Opticki'),
	    	(5177568, 'Ne', '>4000 dpi', 'Bluetooth', 'Da', 'Hero')
	    ";

	    $unos_podloge = "INSERT INTO PODLOGA(Barcode, Tip_podloga, Materijal) VALUES
	    	(5830957, 'Gamerska', 'Platno'),
	    	(4317640, 'Gamerska', 'Guma')
	    ";

	    $unos_stampaca = "INSERT INTO STAMPAC(Barcode, Tip_stampac, Povezivanje, Rezolucija, Brzina_stampe, Bar_kod, Mreza, Wireless) VALUES
	    	(5647681, 'Matricni', 'USB', '9pin', '347 cps', 'Da', 'Ne', 'Da'),
	    	(7049080, 'Laserski', 'USB', '4800 x 600 dpi', '45 ppm', 'Da', 'Da', 'Da')
	    ";

	    $unos_skenera = "INSERT INTO SKENER(Barcode, Format, Flatbed, Povezivanje, Rezolucija, ADF) VALUES
	    	(6091935, 'A3', 'Da', 'USB', '2400dpi', 'Ne'),
	    	(4828429, 'A4', 'Da', 'Wireless', '1200x1200 dpi', 'Da')
	    ";

	    $unos_monitora = "INSERT INTO MONITOR(Barcode, Povezivanje, Maksimalna_rezolucija, USB, Ugradjeni_zvucnici, Dijagonala_ekrana, Brzina_osvezavanja, HDMI, DVI, VGA, Display_port, Podesavanje_po_visini, TouchScreen, Rotacija) VALUES
	    	(3799008, 'DisplayPort, USB', '1366x768', '1', 'Ne', '14 in', '60Hz', 'Ne', 'Ne', 'Ne', 'Da', 'Ne', 'Da', 'Ne'),
	    	(3404060, 'HDMI, DisplayPort, USB', '3840x2160', '3', 'Da', '32 in', '60Hz', '2', 'Ne', 'Ne', 'Da', 'Da', 'Ne', 'Da')
	    ";

	    $unos_projektora = "INSERT INTO PROJEKTOR(Barcode, Povezivanje, Tip_projektor, Rezolucija, Osvetljenje, Wireless, USB, Mreza, HDMI, DVI, RS232, VGA) VALUES	    	
	    	(2804973, 'HDMI, VGA, USB', 'DLP', '1920x1080', '3200Ansi', 'Da', 'Da', 'Da', 'Da', 'Ne', 'Ne', 'Da'),
	    	(3420597, 'HDMI, USB, RS232', 'DLP', '800x600', '3500Ansi', 'Ne', 'Da', 'Da', 'Da', 'Ne', 'Da', 'Da')
	    ";

	    $unos_kablova = "INSERT INTO KABLOVI(Barcode, Strana_1, Strana_2, Broj_uticnica, Tip_kablovi, Prekidac, Vrsta) VALUES
			(2217886, '3.5 mm stereo jack', '2xRCA', '2', 'Hama adapter 43254', 'Ne', 'Kabl'),
	    	(4022441, 'VGA 15 pin HDD', 'VGA 15 pin HDD', '1', 'Hama adapter 41933', 'Ne', 'Adapter')	
	    ";

	    $unos_slusalica = "INSERT INTO SLUSALICE(Barcode, Tip_slusalice, Mikrofon, Zvucni_sistem, Povezivanje, Gaming, Frekvencijski_raspon) VALUES
	    	(3268589, 'Slusalice', 'Na slusalici', '7.1', '3.5mm', 'Da', '13Hz-27KHz'),
	    	(6882212, 'Bubice', 'Na kablu', '5.1', '3.5mm', 'Da', '20Hz-20KHz'),
			(5941612, 'Slusalice', 'Na slusalici', '7.1', '2 x Jack (3.5mm)', 'Da', '12Hz-28KHz')
	    ";

	    $unos_zvucnika = "INSERT INTO ZVUCNICI(Barcode, Zvucni_sistem, Snaga, Konektori, Povezivanje, Frekvencijski_raspon) VALUES
	    	(6351577, '5.1', '80W', 'USB', '3.5mm', '50Hz-20KHz'),
	    	(6638247, '5.1', '160W', 'RCA, USB', 'Bluetooth', '50Hz-20KHz'),
			(6296467, '5.1', '500W', '2 Digitalna opticka ulaza, 1 Digitalni koaksijalni ulaz, RCA, 3,5 mm', 'USB, 3.5mm, Bluetooth', '35Hz-20KHz')
	    ";

	    $unos_mikrofona = "INSERT INTO MIKROFON(Barcode, Povezivanje, Duzina_kabla, Frekvencijski_raspon) VALUES
	    	(1938070, '3.5mm', '2.5m', '50Hz-16KHz'),
	    	(6353093, 'USB', '/', '44Hz-48KHz')
	    ";

	    $unos_ediska = "INSERT INTO EKSTERNI_DISK(Barcode, Format, Povezivanje, Kapacitet) VALUES
	    	(9372997, '2.5', 'USB', '1TB'),
	    	(7741000, '3.5', 'USB', '4TB')
	    ";

	    $unos_fmemorije = "INSERT INTO FLES_MEMORIJA(Barcode, USB_type_C, Brzina_citanja_pisanja, Kapacitet, Povezivanje) VALUES
	    	(9032190, 'Da', '150Mb/s', '32GB', 'USB/USB C'),
	    	(1424316, 'Ne', '10Mb/s', '128GB', 'USB')
	    ";

	    $konekcija->query($unos_korisnika) or die($konekcija->error);
	    $konekcija->query($unos_proizvoda) or die($konekcija->error);
		$konekcija->query($unos_tastature) or die($konekcija->error);
		$konekcija->query($unos_misa) or die($konekcija->error);
		$konekcija->query($unos_podloge) or die($konekcija->error);
		$konekcija->query($unos_stampaca) or die($konekcija->error);
		$konekcija->query($unos_skenera) or die($konekcija->error);
		$konekcija->query($unos_projektora) or die($konekcija->error);
		$konekcija->query($unos_monitora) or die($konekcija->error);
		$konekcija->query($unos_kablova) or die($konekcija->error);
		$konekcija->query($unos_slusalica) or die($konekcija->error);
		$konekcija->query($unos_zvucnika) or die($konekcija->error);
		$konekcija->query($unos_mikrofona) or die($konekcija->error);
		$konekcija->query($unos_ediska) or die($konekcija->error);
		$konekcija->query($unos_fmemorije) or die($konekcija->error);

				

		$snizenje = "CREATE TABLE IF NOT EXISTS SNIZENJE(
			ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Vrsta ENUM('Proizvodjac', 'Vrsta'),
			Naziv VARCHAR(50),
			Procenat INT(20),
			Vazi BOOLEAN
				)";

		$dobavljaci = "CREATE TABLE IF NOT EXISTS DOBAVLJACI(
			ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Naziv VARCHAR(50),
			Email VARCHAR(50)
			)";

		$konekcija->query($snizenje) or die($konekcija->error);
		$konekcija->query($dobavljaci) or die($konekcija->error);

		$naruceni = "CREATE TABLE IF NOT EXISTS NARUCENI(
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

	    	$konekcija->query($naruceni) or die($konekcija->error);
	?>
