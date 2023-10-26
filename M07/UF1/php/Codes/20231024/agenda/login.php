<?php
if ((isset($_POST['usuari'])) && (isset($_POST['ctsnya']))) {
	$fitxerUsuaris = "/var/www/html/agenda/usuaris/usuaris";
	if ($fp = fopen($fitxerUsuaris, "r")) {
		$midaFitxer = filesize($fitxerUsuaris);
		$usuaris = explode(PHP_EOL, fread($fp, $midaFitxer));
		array_pop($usuaris); //La darrera línia, és una línia en blanc i s'ha d'eliminar de l'array				
		fclose($fp);
	}
	foreach ($usuaris as $usuari) {
		$dadesUsuari = explode(":", $usuari);
		$nomUsuari = $dadesUsuari[0];
		$ctsUsuari = $dadesUsuari[1];
		if (($nomUsuari == $_POST['usuari']) && (password_verify($_POST['ctsnya'], $ctsUsuari))) {
			session_start(); // Inici de sessió
			$_SESSION['usuari'] = $_POST['usuari'];  // _SESSION['usuari'] has the value of usuari.
			header("Location: menu.php");  // Location is the name of the type of header, and menu.php is the value that is asked.
		}
	}
	if (!isset($_SESSION['usuari'])) {  // If I'm not logged in, I'll be redirected to error_login.php.
		header("Location: error_login.php");
	}
}

?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Visualitzador de l'agenda</title>
	<link rel="stylesheet" href="agenda.css">
</head>

<body>
	<h3><b>Inici de sessió del visualitzador de l'agenda</b></h3>
	<form action="http://localhost:8080/login.php" method="POST">
		<p>Indica el teu nom d'usuari: <input type="text" name="usuari"></p>
		<p>Indica la teva contrasenya: <input type="password" name="ctsnya"></p>
		<input type="submit" / value="Envia">
	</form>
	<p><a href="index.php">Torna a la pàgina inicial</a></p>
	<label class="diahora">
		<?php
		date_default_timezone_set('Europe/Andorra');
		echo "<p>Data i hora: " . date('d/m/Y h:i:s') . "</p>";
		?>
		<label class="diahora">
</body>

</html>