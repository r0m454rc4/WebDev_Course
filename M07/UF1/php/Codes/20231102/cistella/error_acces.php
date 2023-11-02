<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Visualitzador de l'agenda</title>
		<link rel="stylesheet" href="cistella.css">
	</head>
	<body>
		<h2><b>Error d'accés a l'aplicació</b></h2>
        <p>Per poder accedir a aquesta secció de l'aplicació cal tenir iniciada una sessió d'accés</p>
        <p>Per poder iniciar una sessió cal haver-se validat amb un compte d'usuari de l'aplicació</p>
        <p>No pots accedir a aquest aplicació per no haver iniciat un sessió d'accés amb un compte d'usuari de l'aplicació</p>
        <p><a href="index.php">Torna a la pàgina inicial</a></p>
        <p><a href="login.php">Torna a la pàgina d'inici de sessió</a></p>
        <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";
        ?>
        </label>
	</body>
</html>
