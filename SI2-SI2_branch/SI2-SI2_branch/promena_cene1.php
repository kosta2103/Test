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
				<li class="nav-item active">
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
$veza = mysqli_connect("localhost", "root", "", "SI2");
?>

<script type="text/javascript">
	function submitForm()
	{
		document.getElementById('form1').submit();
	}
</script>
<?php
if(!(isset($_GET["potvrda"]))){ ?>
	<div class="container akcija">
		<div class="form-group">
			<form id="form1" action="promena_cene1.php" method="GET">
				<select name="Vrsta_snizenja" onchange = "submitForm()"  class="form-control selectTip">
					<option value="" selected disabled hidden>Izaberi kategoriju za promenu cene</option>
					<option value="po_proizvodjacu">Po proizvodjacu</option>
					<option value="po_vrsti_robe">Po vrsti robe</option>
				</select>
			</form> 
		</div>
	<?php
}
if(isset($_GET["Vrsta_snizenja"])){
	$select = $_GET["Vrsta_snizenja"];
	if($select == "po_proizvodjacu"){
		$sql= "SELECT * FROM proizvodi";
		$result = mysqli_query($veza, $sql);
		$proizvodjaci = array();
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($proizvodjaci, $row["Proizvodjac"]);
		}
		$proizvodjac = [];
		$arrlength = count($proizvodjaci);
		for($i = 0; $i < $arrlength; $i++) {
			if (!(in_array($proizvodjaci[$i], $proizvodjac))) {
	   			array_push($proizvodjac, $proizvodjaci[$i]);
		}}
		$arrlength2 = count($proizvodjac); ?>

		<div class="form-group">
			<form action="promena_cene2.php" method="GET">
				<div class="form-group">	
					<label for="" class="control-label">
						Promena cene (+ za povecanje u %, - za smanjenje):
					</label>
				</div>
				<div class="form-group">
					<input type="number" name="procenat" required="" class = "form-control selectTip"><br>
				</div>
				<div class="form-group">
					<select name="Proizvodjaci" class="form-control selectTip"> 
						<option value="" selected disabled hidden>Izaberite proizvodjaca</option>
				<?php 
				for($i = 0; $i < $arrlength2; $i++){ ?>
						<option value="<?php echo $proizvodjac[$i]; ?>"><?php echo $proizvodjac[$i]; ?></option>
			<?php	} ?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="proizvodjac" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-ok-circle"></i> Submit</button>
				</div>
			</form>
		</div>
			<?php }
	elseif($select == "po_vrsti_robe"){
		$sql= "SELECT * FROM proizvodi";
		$result = mysqli_query($veza, $sql);
		$vrste_robe = array();
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($vrste_robe, $row["Tip"]);
		}
		$vrsta_robe = [];
		$arrlength = count($vrste_robe);
		for($i = 0; $i < $arrlength; $i++) {
			if (!(in_array($vrste_robe[$i], $vrsta_robe))) {
    			array_push($vrsta_robe, $vrste_robe[$i]);
}}
		$arrlength2 = count($vrsta_robe);
?>
		<div class="form-group">
			<form action="promena_cene2.php" method="GET">
				<div class="form-group">	
					<label for="" class="control-label">
						Promena cene (+ za povecanje u %, - za smanjenje):
					</label>
				</div>
				<div class="form-group">
					<input type="number" name="procenat" required="" class = "form-control selectTip"><br>
				</div>
				<div class="form-group">
					<select name="Vrsta_robe" class="form-control selectTip"> 
						<option value="" selected disabled hidden>Izaberite vrstu robe</option>
					<?php 
					for($i = 0; $i < $arrlength2; $i++){ ?>
						<option value="<?php echo $vrsta_robe[$i]; ?>"><?php echo $vrsta_robe[$i]; ?></option>
			<?php	} ?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="vrsta_robe" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-ok-circle"></i> Submit</button>
				</div>
			</form>
		</div>
			<?php }
		}
?>
<br><br><br>
<?php
$sql = "SELECT * FROM snizenje";
$result = mysqli_query($veza, $sql);
if(mysqli_num_rows($result) != 0){ ?>
	<table align = 'center'>
		<tr>
	    <th>Vrsta</th>
	    <th>Naziv</th> 
	    <th>Procenat</th>
	    <th>Vazi</th>
	  </tr>

	  <tr> <?php 
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<td><?php echo $row["Vrsta"]?></td>
		<td><?php echo $row["Naziv"]?></td>
		<td><?php echo $row["Procenat"]?></td>
		<td><?php echo $row["Vazi"]?></td>
		<form action="promena_cene2.php" method="GET">
		<td>
			<input type="hidden" name="id_akcije" value="<?php echo $row['ID'] ?>">
			<?php
			if($row["Vazi"] == 1){ ?>
				<input type="checkbox" name="checkbox" checked="checked" onClick="submit()">
			<?php }
			else{ ?>
				<input type="checkbox" name="checkbox" onClick="submit()" >
			<?php } ?>
		</td>
		</form>
		<form action="promena_cene2.php" method="POST">
		<td>
			<input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
			<button type="submit" name="remove"><i class="glyphicon glyphicon-remove"></i></button></td>
		</form>
	</tr>
	<?php } ?>
	</table>
	</div>
<?php } ?>