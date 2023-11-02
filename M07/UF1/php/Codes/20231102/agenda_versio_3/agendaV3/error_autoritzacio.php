<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Visualitzador de l'agenda</title>
		<link rel="stylesheet" href="agenda.css">
	</head>
	<body>
		<h2><b>Error d'accés al registre de nous usuaris de l'aplicació</b></h2>
        <p>Per poder accedir a aquesta secció de l'aplicació cal tenir iniciada una sessió d'usuari amb autorització per crear nous usuaris</p>
        <p>No pots accedir a aquesta secció de l'aplicació per haver iniciat sessió amb un compte d'usuari  no autoritzat per crear nous usuaris</p>
        <p><a href="menu.php">Torna a la pàgina menu</a></p>
        <p><a href="logout.php">Finalitza la sessió</a></p>        
        <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";
        ?>
        </label>
	</body>
</html>
