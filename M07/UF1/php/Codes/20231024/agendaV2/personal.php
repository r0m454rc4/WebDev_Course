<?php
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
	}
	if (!isset($_SESSION['expira']) || (time() - $_SESSION['expira'] >= 0)){
		header("Location: logout_expira_sessio.php");
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
		<h3><b>Agenda telefònica de contactes personals</b></h3>
		<table>
			<thead>
				<tr>
					<th>Noms</th>
					<th>Telèfons</th>
				</tr>
			</thead>
			<tbody>
			<?php
				require("biblioteca.php");
				$llista = fLlegeixFitxer(FITXER_PERSONAL);
				fCreaTaula($llista,COMU);				
			?>
			</tbody>
		</table>
		<p><a href="menu.php">Torna al menú</a></p
        <label class="diahora"> 
        <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";						
        ?>
        <label class="diahora"> 
	</body>
</html>
