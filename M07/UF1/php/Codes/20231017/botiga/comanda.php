<?php
	if (isset($_POST['quantitat'])){
		setcookie("quantitat",$_POST['quantitat'],time() + 1800,"/botiga/");
	}	
?>
<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Botiga: Confirmació de la comanda</title>	
	</head>
    <body>
		<p><u>VOLS FER LA COMANDA?</u></p>		
		<form action="http://localhost/botiga/enregistra.php" method="POST">
			<input type="hidden" name="comprova" value=1>
			<table>
				<tbody>
					<tr>
						<td><input value="Fes comanda" type="submit"></td>						
					</tr>
				</tbody>		
			</table>	
		<p>
			<a href="index.html">Torna a la pàgina inicial</a>
		</p>
    </body>
</html>
