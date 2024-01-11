<html>

<head>
	<title>PROVA DE PHP AMB L'ESTRUCTURA DE CONTROL FOREACH TREBALLANT AMB DADES GET (TAMBÉ VÀLID PER POST)</title>
</head>

<body>
	<b><u>INICI DE LA PROVA DE ESTRUCTURA DE CONTROL FOREACH TREBALLANT AMB DADES GET (TAMBÉ VÀLID PER POST)</u></b><br>
	<?php
	foreach ($_GET as $clau => $dada) {  // 1 = name of the array, 2 = name of the position, 3 = content of the position.
		//$_GET és un array associatiu.
		//Cada posició s'identifica amb una clau. Cada clau té un nom assignat (Usuari, Contrasenya, Identificador, Correu.)
		//A cada posició es desa una dada que té un valor(integer, float, character....)		
		if ($clau == "Contrasenya") {
			echo "$clau: *****<br>"; // El valor de la dada emmagatzemada a la posició "Contrasenya" no és mostra
		} else {
			echo "$clau: $dada<br>";  // In the first case, will be: "Usuari" and the name that the user entered.
		}
	}
	echo "<br>";
	?>
	<b>FINAL DE LA PROVA DE L'ESTRUCTURA DE CONTROL FOREACH</b>
</body>

</html>