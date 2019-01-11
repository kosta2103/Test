<?php
$veza = mysqli_connect("localhost", "root", "", "SI2");
$barcode = $_POST["barkod"];
$sql = "SELECT Tip FROM proizvodi WHERE Barcode = '".$barcode."'";
$result = mysqli_query($veza, $sql);
$tip1 = mysqli_fetch_row($result);
$tabela_tip = $tip1[0];
$sql = "DELETE FROM $tabela_tip WHERE Barcode = '".$barcode."'";
mysqli_query($veza, $sql);
$sql = "DELETE FROM proizvodi WHERE Barcode = '".$barcode."'";
mysqli_query($veza, $sql);
?>

<script>
           window.location.href = 'prikaz.php';
</script>
?>