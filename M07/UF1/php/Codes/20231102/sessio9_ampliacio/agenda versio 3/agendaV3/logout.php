<?php
	if ((isset($_POST['resp'])) && ($_POST['resp']=="y")){
		session_start();
		//Alliberant variables de sessió. Esborra el contingut de les variables de sessió del fitxer de sessió. Buida l'array $_SESSION. No esborra cookies
		session_unset();
		//Destrucció de la cookie de sessió dins del navegador
		$cookie_sessio = session_get_cookie_params();
		setcookie("PHPSESSID","",time()-3600,$cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']); //Neteja cookie de sessió
		//Destrucció de la informació de sessió (per exemple, el fitxer de sessió  o l'identificador de sessió) 
		session_destroy();
		header("Location: index.php");
	}
	else{
		session_start();
		if (!isset($_SESSION['expira']) || (time() - $_SESSION['expira'] >= 0)){
			header("Location: logout_expira_sessio.php");
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
		<h3><b>Finalització de sessió del visualitzador de l'agenda</b></h3>
        <p>Estàs segur que vols finalitzar la sessió?:</p>
        <form action="logout.php" method="POST">
			<input type="radio" name="resp" value="y"/>Sí<br/>
			<input type="radio" name="resp" value="n" checked/>No<br/>
			<br>
			<input type="submit" value="Valida" />
		</form>
		<p><a href="menu.php">Torna al menú  de l'agenda</a></p>
		<label class="diahora"> 
        <?php
			if ((isset($_POST['resp'])) && ($_POST['resp']=="n")){
				header("Location: menu.php");
			}
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";						
        ?>
         <label class="diahora"> 
	</body>
</html>  
