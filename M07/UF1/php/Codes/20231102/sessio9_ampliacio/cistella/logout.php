<?php
	require("biblioteca.php");
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
	}
	if(isset($_POST['resp'])){
		if ((isset($_POST['resp'])) && ($_POST['resp']=="y")){
			if(!fCreaCistella($_SESSION['usuari'],$_SESSION['producte'])){
				header("Location: logout_error_cistella.php");
			}
		}
		session_unset();
		$cookie_sessio = session_get_cookie_params();
		setcookie("PHPSESSID","",time()-3600,$cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']); //Neteja cookie de sessió
		header("Location: index.php");
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
        <p>Vols desar la cistella?:</p>
        <form action="logout.php" method="POST">
			<input type="radio" name="resp" value="y"/>Sí<br/>
			<input type="radio" name="resp" value="n" checked/>No<br/>
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
