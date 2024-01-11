<?php
if (isset($_POST['producte'])) {
	setcookie("producte", $_POST['producte'], time() + 1800, "/botiga/");
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Botiga: Quantitat</title>
</head>

<body>
	<p><u>QUANTITAT:</u></p>
	<form action="http://localhost:8080/botiga/comanda.php" method="POST">
		<?php
		if (isset($_COOKIE['quantitat'])) $quantitat = ($_COOKIE['quantitat']);
		else $quantitat = null;
		?>
		<p><input type="text" name="quantitat" value=<?php echo $quantitat ?>></p>
		<table>
			<tbody>
				<tr>
					<td><input value="Envia" type="submit"></td>
				</tr>
			</tbody>
		</table>
	</form>
	<p>
		<a href="index.html">Torna a la pàgina inicial sense seleccionar quantitat</a>
	</p>
</body>

</html>