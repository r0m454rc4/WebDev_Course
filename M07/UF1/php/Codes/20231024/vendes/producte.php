<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Selecció de producte</title>
</head>

<body>
	<?php
	if (isset($_POST['producte'])) {
		$_SESSION['producte'] = $_POST['producte'];
		header("location: menu.php");
	}
	?>
	<b><u>LLISTA DE PRODUCTES:</u></b><br>
	<form action="http://localhost:8080/vendes/producte.php" method="POST">
		<input type="radio" name="producte" value="bombetes30W" /> Bombetes de 30 W<br />
		<input type="radio" name="producte" value="bombetes60W" /> Bombetes de 60 W<br />
		<input type="radio" name="producte" value="bombetes100W" /> Bombetes de 100 W<br />
		<input value="Selecciona" type="submit"></td>
	</form>
</body>

</html>