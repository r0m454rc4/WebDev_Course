<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Botiga: Client</title>

<body>
	<p><u>NOM DEL CLIENT</u></p>
	<form action="http://localhost:8080/botiga/producte.php" method="POST">
		<?php
		if (isset($_COOKIE['client'])) $client = $_COOKIE['client'];
		else $client = null;
		?>
		<p>
			Indica el teu codi de client: <input type="text" name="client" value=<?php echo $client ?>>
		</p>
		<table>
			<tbody>
				<tr>
					<td><input value="Envia" type="submit"></td>
				</tr>
			</tbody>
		</table>
	</form>
	<p>
		<a href="index.html">Torna a la pàgina inicial sense indicar el codi de client</a>
	</p>
</body>
</head>

</html>