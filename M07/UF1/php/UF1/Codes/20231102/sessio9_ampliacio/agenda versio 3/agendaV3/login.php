<?php
	require("biblioteca.php");
	if ((isset($_POST['usuari'])) && (isset($_POST['ctsnya']))){
		$autenticat = fAutenticacio($_POST['usuari']);
		if($autenticat){
			session_start(); // Inici de sessió
			$_SESSION['usuari'] = $_POST['usuari'];
			//$_SESSION['usuari'] EMMAGATZEMA EL NOM DE L'USUARI VALIDAT
			$_SESSION['expira'] = time() + TEMPS_EXPIRACIO;
			// $_SESSION['expira'] EMMAGATZEMA EL TEMPS D'EXPIRACIÓ DE LA SESSIÓ = HORA ACTUAL + TEMPS_EXPIRACIÓ EN SEGONS
			header("Location: menu.php");					
		}		
		if (!isset($_SESSION['usuari'])){
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
    
  
