<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Visualitzador de l'agenda</title>
		<link rel="stylesheet" href="agenda.css">
	</head>
	<body>
		<h2><b>Informació sobre el visualitzador de l'agenda</b></h2>
        <p>Aquesta aplicació mostra les dades de:</p>
        <label>a) L'agenda telèfonica personal (família i amics)</label><br>
        <label>b) L'agenda telèfonica professional</label><br>
        <label>c) L'agenda telèfonica de persones i empreses de serveis</label><br>
        <p>Per poder accedir a l'agenda has de tenir un compte d'usuari i una contrasenya d'accés</p>
        <p><a href="index.php">Torna a la pàgina inicial</a></p>
        <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";
        ?>
        </label>
	</body>
</html>
