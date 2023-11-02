<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Cistella</title>
		<link rel="stylesheet" href="cistella.css">
	</head>
	<body>
		<h2><b>Cistella</b></h2>
        <p>Aquesta aplicació:</p>
        <label>a) Treballa utilitzant sessions d'usuari</label><br> 
        <label>b) Permet a un usuari crear una cistella amb un producte escollit</label><br>
        <label>c) Permet a l'usuari recuperar la cistella si tanca sessió i torna a obrir-la més tard</label><br>
        <label>f) Tanca sessions correctament</label><br>
        <p>Per poder accedir a l'aplicació s'has de tenir un compte d'usuari i una contrasenya d'accés</p>
        <p><a href="index.php">Torna a la pàgina inicial</a></p>
        <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";
        ?>
        </label>
	</body>
</html>
