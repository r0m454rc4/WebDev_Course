<html>

<head>
	<title>PROVA DE PHP AMB CONTINUE</title>
</head>

<body>
	<b><u>INICI DE LA PROVA AMB CONTINUE</u></b><br>
	<?php
	//L'ordre continue finalitza una iteració<br><br>";
	$llista = array("Carles" => "M01", "Estela" => "M02", "Hector" => "M03", "Jordi" => "M04", "Sergi" => "M05");
	foreach ($llista as $clau => $dada) {
		if ($clau == $_GET["professor"]) {
			continue;
		} else echo "$clau: $dada<br>";
	}
	echo "<br>";
	?>
	<b>FINAL DE LA PROVA DE LA PROVA AMB CONTINUE</b>
</body>

</html>