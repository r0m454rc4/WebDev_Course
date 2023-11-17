<?php
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
	}
	if ((isset($_POST['resp'])) && ($_POST['resp']=="y")){
		session_unset();
		$cookie_sessio = session_get_cookie_params();
		setcookie("PHPSESSID","",time()-3600,$cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']);
		header("Location: index.php");
	}else{
		header("Location: producte.php");
	}
?>
?>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Cistella</title>
		<link rel="stylesheet" href="agenda.css">
	</head>
	<body>
		<h3><b>Error de creació de Cistella</b></h3>
        <p>Vols sortir de l'aplicació la cistella?:</p>
        <form action="logout_error_cistella.php" method="POST">
			<input type="radio" name="resp" value="y" checked/>Sí<br/>
			<input type="radio" name="resp" value="n">No<br/>
			<br>
			<input type="submit" value="Envia" />
		</form>
		<label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";						
        ?>
        <label class="diahora"> 
	</body>
</html>  
