<?php
$veza = mysqli_connect("localhost", "root", "", "SI2");
if(isset($_GET["proizvodjac"])){
	$proizvodjac = $_GET["Proizvodjaci"];
	$procenat = $_GET["procenat"];
	$procenat = $procenat/100;
	$sql= "SELECT * FROM proizvodi WHERE Proizvodjac = '".$proizvodjac."'";
	$result = mysqli_query($veza, $sql);
	$cene = array();
	$barcode = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($cene, $row["Cena"]);
		array_push($barcode, $row["Barcode"]);
	}
	$arrlength = count($cene);
	$cena = array();
	for($i = 0; $i < $arrlength; $i++) {
		array_push($cena, ($cene[$i] + ($cene[$i])*$procenat));
	}
	for($i = 0; $i < $arrlength; $i++) {
		$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
		$veza->query($sql) or die($veza->error);
	}
	$procenat = $procenat * 100;
	$sql = "INSERT INTO snizenje (Vrsta, Naziv, Procenat, Vazi) VALUES ('Proizvodjac', '".$proizvodjac."', '".$procenat."', TRUE)"; 	
	mysqli_query($veza, $sql);
}
elseif(isset($_GET["vrsta_robe"])){
	$vrsta_robe = $_GET["Vrsta_robe"];
	$procenat = $_GET["procenat"];
	$procenat = $procenat/100;
	$sql= "SELECT * FROM proizvodi WHERE Tip = '".$vrsta_robe."'";
	$result = mysqli_query($veza, $sql);
	$cene = array();
	$barcode = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($cene, $row["Cena"]);
		array_push($barcode, $row["Barcode"]);
	}
	$arrlength = count($cene);
	$cena = array();
	$arrlength = count($cene);
	for($i = 0; $i < $arrlength; $i++) {
		array_push($cena, ($cene[$i] + ($cene[$i])*$procenat));
	}
	for($i = 0; $i < $arrlength; $i++) {
		$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
		$veza->query($sql) or die($veza->error);
	}	    	
	$procenat = $procenat * 100;
	$sql = "INSERT INTO snizenje (Vrsta, Naziv, Procenat, Vazi) VALUES ('Vrsta', '".$vrsta_robe."', '".$procenat."', TRUE)"; 
	mysqli_query($veza, $sql);
}
elseif(isset($_POST["remove"])){
	$id = $_POST["id"];
	$sql = "DELETE FROM snizenje WHERE ID = '".$id."'";
	mysqli_query($veza, $sql);
}
else{
	$id = $_GET["id_akcije"];
	$sql = "SELECT * FROM snizenje WHERE ID = '".$id."'";
	$result = mysqli_query($veza, $sql);
	while ($row = mysqli_fetch_assoc($result))
    {
    	$vrsta = $row["Vrsta"];
    	$naziv = $row["Naziv"];
    	$procenat = $row["Procenat"];
    	$vazi = $row["Vazi"];
    	$procenat = $procenat/100;
    }
    if($vazi == 1){
    	if($vrsta == "Proizvodjac"){
	    	$sql= "SELECT * FROM proizvodi WHERE Proizvodjac = '".$naziv."'";
			$result = mysqli_query($veza, $sql);
			$aktuelne_cene = array();
			$barcode = array();
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($aktuelne_cene, $row["Cena"]);
				array_push($barcode, $row["Barcode"]);
			}
			$arrlength = count($barcode);
			$cena = array();
			for($i = 0; $i < $arrlength; $i++) {
				array_push($cena, (($aktuelne_cene[$i]))/($procenat+1));
			}
			for($i = 0; $i < $arrlength; $i++) {
				$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
				$veza->query($sql) or die($veza->error);
			}
		}
	    elseif($vrsta == "Vrsta"){
	    	$sql= "SELECT * FROM proizvodi WHERE Tip = '".$naziv."'";
			$result = mysqli_query($veza, $sql);
			$aktuelne_cene = array();
			$barcode = array();
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($aktuelne_cene, $row["Cena"]);
				array_push($barcode, $row["Barcode"]);
			}
			$arrlength = count($barcode);
			$cena = array();
			for($i = 0; $i < $arrlength; $i++) {
				array_push($cena, (($aktuelne_cene[$i]))/($procenat+1));
			}
			for($i = 0; $i < $arrlength; $i++) {
				$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
				$veza->query($sql) or die($veza->error);
			}
		}
    	$vazi = 0;
    }
    else{
    	if($vrsta == "Proizvodjac"){
	    	$sql= "SELECT * FROM proizvodi WHERE Proizvodjac = '".$naziv."'";
			$result = mysqli_query($veza, $sql);
			$aktuelne_cene = array();
			$barcode = array();
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($aktuelne_cene, $row["Cena"]);
				array_push($barcode, $row["Barcode"]);
			}
			$arrlength = count($barcode);
			$cena = array();
			for($i = 0; $i < $arrlength; $i++) {
				array_push($cena, ($aktuelne_cene[$i] + ($aktuelne_cene[$i])*$procenat));
			}
			for($i = 0; $i < $arrlength; $i++) {
				$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
				$veza->query($sql) or die($veza->error);
			}
		}
	    elseif($vrsta == "Vrsta"){
	    	$sql= "SELECT * FROM proizvodi WHERE Tip = '".$naziv."'";
			$result = mysqli_query($veza, $sql);
			$aktuelne_cene = array();
			$barcode = array();
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($aktuelne_cene, $row["Cena"]);
				array_push($barcode, $row["Barcode"]);
			}
			$arrlength = count($barcode);
			$cena = array();
			for($i = 0; $i < $arrlength; $i++) {
				array_push($cena, ($aktuelne_cene[$i] + ($aktuelne_cene[$i])*$procenat));
			}
			for($i = 0; $i < $arrlength; $i++) {
				$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
				$veza->query($sql) or die($veza->error);
			}
		}
    	$vazi = 1;
    }
	$sql = "UPDATE snizenje SET Vazi = '".$vazi."' WHERE ID = '".$id."'";
	mysqli_query($veza, $sql);
}
?>
<script>
    window.location.href = 'promena_cene1.php';
</script>