<?php
	require("biblioteca.php");
	$autenticat = fAutenticacio($_POST['usuari']);
	if($autenticat){
		session_start(); // Inici de sessió
		$_SESSION['usuari'] = $_POST['usuari'];
		header("Location: producte.php");					
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
		<h3><b>Cistella</b></h3>
       <form action="login.php" method="POST">
			<p>Indica el teu nom d'usuari: <input type="text" name="usuari"></p>
			<p>Indica la teva contrasenya: <input type="password" name="ctsnya"></p>
			<input type="submit"/ value="Envia">
		</form>
		<p><a href="index.php">Torna a la pàgina inicial</a></p>
        <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";						
        ?>
         <label class="diahora"> 
	</body>
</html>   
    
  
