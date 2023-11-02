<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Visualitzador de l'agenda</title>
		<link rel="stylesheet" href="agenda.css">
	</head>
	<body>
		<h3><b>Pàgina d'inici del visualitzador de l'agenda</b></h3>
        <a href="login.php">Login</a><br>        
        <a href="info.php">Informació</a><br>
         <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";	
        ?>
         <label class="diahora"> 
	</body>
</html>
