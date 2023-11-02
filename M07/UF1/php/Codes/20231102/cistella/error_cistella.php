<?php
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
	}
?>
<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Cistella</title>
		<link rel="stylesheet" href="cistella.css">
	</head>
	<body>
		<h2><b>Error de creació de cistella</b></h2>
        <p><a href="logout.php">Torna a la pàgina de logout</a></p>
        <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";
        ?>
        </label>
	</body>
</html>
