<?php
$veza = mysqli_connect("localhost", "root", "", "SI2");
$barcode = $_POST["proizvod_barcode"];
$naziv = $_POST["naziv"];
$model = $_POST["model"];
$dimenzije = $_POST["dimenzije"];
$proizvodjac = $_POST["proizvodjac"];
$nabavna_cena = $_POST["nabavna_cena"];
if($_POST["cena"] != NULL){
	$cena = $_POST["cena"];
}
else{
	$cena = $nabavna_cena + $nabavna_cena*0.2;
}
if($_POST["kolicina"] != NULL){
	$kolicina = $_POST["kolicina"];
}
else{
	$kolicina = 0;
}
$duzina_gar_lista = $_POST["duzina_gar_lista"];
$link = $_POST["link"];
$slika = $_POST["slika"];
$tip = $_POST["selektovani_tip"];
$sql= "INSERT INTO proizvodi (Barcode, Naziv, Model, Dimenzije, Proizvodjac, Nabavna_cena, Cena, Kolicina, Broj_prodatih_primeraka, Datum_poslednje_prodaje, Duzina_garantnog_lista, Link, Slika, Tip) VALUES ('$barcode', '$naziv', '$model', '$dimenzije', '$proizvodjac', '$nabavna_cena', '$cena', '$kolicina', 0, NULL, '$duzina_gar_lista', '$link', '$slika', '$tip')";
$veza->query($sql) or die($veza->error);
if($tip == "eksterni_disk"){
	$format = $_POST["format_eksterni_disk"];
	$povezivanje = $_POST["povezivanje"];
	$kapacitet = $_POST["kapacitet"];
	$sql= "INSERT INTO eksterni_disk (Barcode, Format, Povezivanje, Kapacitet) VALUES ('$barcode', '$format', '$povezivanje', '$kapacitet')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "fles_memorija"){
	$usb_type_c = $_POST["usb_type_c"];
	$brzina_citanja_pisanja = $_POST["brzina_citanja_pisanja"];
	$kapacitet = $_POST["kapacitet"];
	$povezivanje = $_POST["povezivanje"];
	$sql= "INSERT INTO fles_memorija (Barcode, USB_Type_C, Brzina_citanja_pisanja, Kapacitet, Povezivanje) VALUES ('$barcode', '$usb_type_c', '$kapacitet', '$povezivanje')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "kablovi"){
	$strana_1 = $_POST["strana_1"];
	$strana_2 = $_POST["strana_2"];
	$broj_uticnica = $_POST["broj_uticnica"];
	$tip = $_POST["tip"];
	$prekidac = $_POST["prekidac"];
	$vrsta = $_POST["vrsta_kablovi"];
	$sql= "INSERT INTO kablovi (Barcode, Strana_1, Strana_2, Broj_uticnica, Tip_kablovi, Prekidac, Vrsta) VALUES ('$barcode', '$strana_1', '$strana_2', '$broj_uticnica', '$tip', '$prekidac', '$vrsta')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "mikrofon"){
	$povezivanje = $_POST["povezivanje"];
	$duzina_kabla = $_POST["duzina_kabla"];
	$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
	$sql= "INSERT INTO mikrofon (Barcode, Povezivanje, Duzina_kabla, Frekvencijski_raspon) VALUES ('$barcode', '$povezivanje', '$duzina_kabla', '$frekvencijski_raspon')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "mis"){
	$za_obe_ruke = $_POST["za_obe_ruke"];
	$rezolucija = $_POST["rezolucija_mis"];
	$povezivanje = $_POST["povezivanje_mis"];
	$gaming = $_POST["gaming"];
	$senzor = $_POST["senzor_mis"];
	$sql= "INSERT INTO mis (Barcode, Za_obe_ruke, Rezolucija, Povezivanje, Gaming, Senzor) VALUES ('$barcode', '$za_obe_ruke', '$rezolucija', '$povezivanje', '$gaming', '$senzor')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "monitor"){
	$povezivanje = $_POST["povezivanje"];
	$maksimalna_rezolucija = $_POST["maksimalna_rezolucija"];
	$usb = $_POST["usb_monitor"];
	$ugradjeni_zvucnici = $_POST["ugradjeni_zvucnici"];
	$dijagonala_ekrana = $_POST["dijagonala_ekrana"];
	$brzina_osvezavanja = $_POST["brzina_osvezavanja"];
	$hdmi = $_POST["hdmi_monitor"];
	$dvi = $_POST["dvi"];
	$vga = $_POST["vga"];
	$display_port = $_POST["display_port"];
	$podesavanje_po_visini = $_POST["podesavanje_po_visini"];
	$touchscreen = $_POST["touchscreen"];
	$rotacija = $_POST["rotacija"];
	$sql= "INSERT INTO monitor (Barcode, Povezivanje, Maksimalna_rezolucija, USB, Ugradjeni_zvucnici, Dijagonala_ekrana, Brzina_osvezavanja, HDMI, DVI, VGA, Display_port, Podesavanje_po_visini, TouchScreen, Rotacija) VALUES ('$barcode', '$povezivanje', '$maksimalna_rezolucija', '$usb', '$ugradjeni_zvucnici', '$dijagonala_ekrana', '$brzina_osvezavanja', '$hdmi', '$dvi', '$vga', '$display_port', '$podesavanje_po_visini', '$touchscreen', '$rotacija')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "podloga"){
	$tip = $_POST["tip_podloga"];
	$materijal = $_POST["materijal_podloga"];
	$sql= "INSERT INTO podloga (Barcode, Tip_podloga, Materijal) VALUES ('$barcode', '$tip', '$materijal')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "projektor"){
	$povezivanje = $_POST["povezivanje"];
	$tip = $_POST["tip_projektor"];
	$rezolucija = $_POST["rezolucija"];
	$osvetljenje = $_POST["osvetljenje"];
	$wireless = $_POST["wireless"];
	$usb = $_POST["usb"];
	$mreza = $_POST["mreza"];
	$hdmi = $_POST["hdmi"];
	$dvi = $_POST["dvi"];
	$rs232 = $_POST["rs232"];
	$vga = $_POST["vga"];
	$sql= "INSERT INTO projektor (Barcode, Povezivanje, Tip_projektor, Rezolucija, Osvetljenje, Wireless, USB, Mreza, HDMI, DVI, RS232, VGA) VALUES ('$barcode', '$povezivanje', '$tip', '$rezolucija', '$osvetljenje', '$wireless', '$usb', '$mreza', '$hdmi', '$dvi', '$rs232', '$vga')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "skener"){
	$format = $_POST["format_skener"];
	$flatbed = $_POST["flatbed"];
	$povezivanje = $_POST["povezivanje"];
	$rezolucija = $_POST["rezolucija"];
	$adf = $_POST["adf"];
	$sql= "INSERT INTO skener (Barcode, Format, Flatbed, Povezivanje, Rezolucija, ADF) VALUES ('$barcode', '$format', '$flatbed', '$povezivanje', '$rezolucija', '$adf')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "slusalice"){
	$tip = $_POST["tip_slusalice"];
	$mikrofon = $_POST["mikrofon_slusalice"];
	$zvucni_sistem = $_POST["zvucni_sistem_slusalice"];
	$povezivanje = $_POST["povezivanje"];
	$gaming = $_POST["gaming"];
	$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
	$sql= "INSERT INTO slusalice (Barcode, Tip_slusalice, Mikrofon, Zvucni_sistem, Povezivanje, Gaming, Frekvencijski_raspon) VALUES ('$barcode', '$tip', '$mikrofon', '$zvucni_sistem', '$povezivanje', '$gaming', '$frekvencijski_raspon')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "stampac"){
	$tip = $_POST["tip_stampac"];
	$povezivanje = $_POST["povezivanje"];
	$rezolucija = $_POST["rezolucija"];
	$brzina_stampe = $_POST["brzina_stampe"];
	$bar_kod = $_POST["bar_kod"];
	$mreza = $_POST["mreza"];
	$wireless = $_POST["wireless"];
	$sql= "INSERT INTO stampac (Barcode, Tip_stampac, Povezivanje, Rezolucija, Brzina_stampe, Bar_kod, Mreza, Wireless) VALUES ('$barcode', '$tip', '$povezivanje', '$rezolucija', '$brzina_stampe', '$bar_kod', '$mreza', '$wireless')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "tastatura"){
	$povezivanje = $_POST["povezivanje"];
	$usb_port = $_POST["usb_port"];
	$numericki_deo = $_POST["numericki_deo"];
	$tip = $_POST["tip_tastatura"];
	$tip_tastera = $_POST["tip_tastera_tastatura"];
	$programabilni_tasteri = $_POST["programabilni_tasteri"];
	$rgb_osvetljenje = $_POST["rgb_osvetljenje"];
	$sql= "INSERT INTO tastatura (Barcode, Povezivanje, USB_port, Numericki_deo, Tip_tastatura, Tip_tastera, Programabilni_tasteri, RGB_osvetljenje) VALUES ('$barcode', '$povezivanje', '$usb_port', '$numericki_deo', '$tip', '$tip_tastera', '$programabilni_tasteri', '$rgb_osvetljenje')";
	$veza->query($sql) or die($veza->error);
}
if($tip == "zvucnici"){
	$zvucni_sistem = $_POST["zvucni_sistem_zvucnici"];
	$snaga = $_POST["snaga"];
	$konektori = $_POST["konektori"];
	$povezivanje = $_POST["povezivanje"];
	$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
	$sql= "INSERT INTO zvucnici (Barcode, Zvucni_sistem, Snaga, Konektori, Povezivanje, Frekvencijski_raspon) VALUES ('$barcode', '$zvucni_sistem', '$snaga, '$konektori', '$povezivanje', '$frekvencijski_raspon')";
	$veza->query($sql) or die($veza->error);
}
?>
<script>
           window.location.href = 'dodaj1.php';
</script>
?>