<!DOCTYPE html>
<html>
<head>
	<title>KOMERCIJALISTA</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: white;
}
.title {
  color: grey;
  font-size: 18px;
}
button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 4px;
  color: white;
  background-color:  	#F08080;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
img{
	border-radius: 100%;
}
button:hover, a:hover {
  opacity: 0.7;
}
body{
	background-image: url("img/slikap.jpg");
}
</style>
</head>
<body id="komercijalista">

<div class="card">
  <img src="img/slika22.jpg" alt="Nevena" style="width:75%">
  <h2>Nevena Stasic</h2>
  <p class="title">Komercijalista</p>
  <div style="margin: 24px 0;">
  	<form action="listanarucenih.php" method="POST">
  	<button type="submit"> Narucivanje proizvoda </button>
  	</form>
  <form action="pristigla_roba.php" method="POST">
  	<button type="submit"> Prijem robe </button> 
  </form>
  <form action="prikaz_faktura.php" method="POST">
  	<button type="submit"> Prikaz faktura </button>
  </form>
  <form action="izmeni.php" method="POST">
  	<button type="submit"> Promena cene proizvoda</button>
  </form>
  <form action="login.php" method="POST">
  	<button type="submit"> Odjava</button>
  </form>
  </div>
</div>
 
</body>
</html>