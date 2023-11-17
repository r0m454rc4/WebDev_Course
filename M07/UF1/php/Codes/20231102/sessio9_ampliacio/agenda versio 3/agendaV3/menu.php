<?php
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
	}
	if (!isset($_SESSION['expira']) || (time() - $_SESSION['expira'] >= 0)){
		header("Location: logout_expira_sessio.php");
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
		<h3><b>Menú del visualitzador de l'agenda</b></h3>
        <a href="personal.php">Agenda personal</a><br>
        <a href="professional.php">Agenda professional</a><br>
        <a href="serveis.php">Agenda de serveis</a><br>
        <p><a href="registre.php">Registre de nous usuaris</a></p>
        <p><a href="logout.php">Finalitza la sessió</a></p>
        <label class="diahora"> 
        <?php
			echo "<p>Usuari utilitzant l'agenda: ".$_SESSION['usuari']."</p>";
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";	
        ?>
        </label>		
	</body>
</html>
