<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Visualitzador de l'agenda</title>
		<link rel="stylesheet" href="agenda.css">
	</head>
	<body>
		<h2><b>Error d'inici de sessió</b></h2>
        <p>Per poder accedir a l'agenda has de tenir un compte d'usuari i una contrasenya d'accés</p>
        <p>El nom d'usuari i/o la contrasenya suministrats no són vàlids</p>
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
