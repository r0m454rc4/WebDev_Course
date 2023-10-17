<?php
	if (isset($_POST['client'])){
		setcookie("client",$_POST['client'],time() + 1800,"/botiga/");
	}
?>
<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Botiga: Producte</title>	
	</head>
    <body>
		<p><u>LLISTA DE PRODUCTES:</u></p>
		<?php
			if (isset($_COOKIE['producte'])) $producte = $_COOKIE['producte'];
			else $producte=null;
		?>
		<form action="http://localhost/botiga/quantitat.php" method="POST">
			<input type="radio" name="producte" value="bombetes30W" <?php $producte=="bombetes30W" ? 'checked' : NULL?> > Bombetes de 30 W<br/>
			<input type="radio" name="producte" value="bombetes60W" <?php $producte=="bombetes60W" ? 'checked' : NULL?> > Bombetes de 60 W<br/>
			<input type="radio" name="producte" value="bombetes100W" <?php $producte=="bombetes100W" ? 'checked' : NULL?> > Bombetes de 100 W<br/>
			<br>
			<table>
				<tbody>
					<tr>
						<td><input value="Selecciona" type="submit"></td>						
					</tr>
				</tbody>		
			</table>	
		</form>
		<p>
			<a href="index.html">Torna a la pàgina inicial sense seleccionar producte</a>
		</p>
    </body>
</html>
