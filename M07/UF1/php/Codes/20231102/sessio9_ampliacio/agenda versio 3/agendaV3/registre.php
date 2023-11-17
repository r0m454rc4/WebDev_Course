<?php
	require("biblioteca.php");
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
	}
	else{
		$autoritzat=fAutoritzacio($_SESSION['usuari']);
		if (!isset($_SESSION['expira']) || (time() - $_SESSION['expira'] >= 0)){
			header("Location: logout_expira_sessio.php");
		} else if(!$autoritzat){
			header("Location: error_autoritzacio.php");
		}
	}
	if ((isset($_POST['nom_nou_usuari'])) && (isset($_POST['cts_nou_usuari'])) && (isset($_POST['tipus_nou_usuari']))){		
		$afegit=fActualitzaUsuaris($_POST['nom_nou_usuari'],$_POST['cts_nou_usuari'],$_POST['tipus_nou_usuari']);
		$_SESSION['afegit']=$afegit;
		header("refresh: 5; url=menu.php"); // Passats 5 segons el navegador demana menu.php i es torna a menu.php.
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
		<h3><b>Registre d'usuaris del visualitzador de l'agenda</b></h3>
		<p><b>Indica les dades de l'usuari a registrar dins de l'aplicació: </b></p>			
		<form action="registre.php" method="POST">			
			<p>
				<label>Nom del nou usuari:</label> 
				<input type="text" name="nom_nou_usuari" required>
			</p>
			<p>
				<label>Contrasenya del nou usuari:</label> 
				<input type="password" name="cts_nou_usuari" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Mínims: 8 caràcters, una majúscula, una minúscula, un número i un caràter especial" required>
			</p> 
			<label>Tipus d'usuari de l'aplicació</label><br>
			<input type="radio" name="tipus_nou_usuari" value=<?php echo USR ?> checked>Usuari de l'aplicació<br>
			<input type="radio" name="tipus_nou_usuari" value=<?php echo ADMIN ?> >Administrador de l'aplicació<br>
			<br>
			<input type="submit" value="Enregistra el nou usuari"/>
		</form>
		<p><a href="menu.php">Torna al menú</a></p>
		<label class="diahora">
		<?php
			echo "<p>Usuari utilitzant l'agenda: ".$_SESSION['usuari']."</p>";
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";
			if (isset($_SESSION['afegit'])){
				if ($_SESSION['afegit']) echo "<p style='color:red'>L'Usuari ha estat registrat correctament</p>";
				else{
					echo "L'Usuari no ha estat registrat<br>";
					echo "Comprova si hi ha algún problema del sistema per poder enregistrar nous usuaris<br>";
				}
				unset($_SESSION['afegit']);
			} 
        ?>
		</label>
	</body>
</html>

