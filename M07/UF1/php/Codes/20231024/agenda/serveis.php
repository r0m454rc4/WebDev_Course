<?php
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
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
		<h3><b>Agenda telefònica de contactes de serveis</b></h3>
		<table>
			<thead>
				<tr>
					<th>Noms</th>
					<th>Telèfons</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$fitxerServeis = "/var/www/html/agenda/dades/serveis";
				if ($fp=fopen($fitxerServeis,"r")) {
					$midaFitxer=filesize($fitxerServeis);
					$llista = explode(PHP_EOL, fread($fp,$midaFitxer));
					array_pop($llista); //La darrera línia, és una línia en blanc i s'ha d'eliminar de l'array				
					fclose($fp);
				}
				foreach ($llista as $entrada) {
					$dadesEntrada = explode(":", $entrada);
					$nom = $dadesEntrada[0];
					$tlf = $dadesEntrada[1]; 
					echo "<tr><td>$nom</td><td>$tlf</td></tr>";					
				}
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
