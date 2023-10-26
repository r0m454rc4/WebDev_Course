<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Introducció de la quantitat</title>
</head>

<body>
	<?php
	if (isset($_POST['quantitat'])) {
		$_SESSION['quantitat'] = $_POST['quantitat'];
		header("location: menu.php");
	}
	?>
	<b><u>QUANTITAT:</u></b><br>
	<form action="http://localhost:8080/vendes/quantitat.php" method="POST">
		<input type="text" name="quantitat"><br>
		<input value="Selecciona" type="submit"><br>
	</form>
</body>

</html>