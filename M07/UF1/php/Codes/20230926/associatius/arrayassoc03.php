</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>arrays associatius - IV</title>
</head>

<body>
	<?php
	// Mostrant el nom de les claus (o index) d'una array associatiu
	//
	//Definició de l'array
	$matricula = array("9001" => "Pere Pons", "19021" => "Joan López", "9021" => "Anna Puig");
	//Creant un array indexat amb totes les claus  de l'array associatiu
	$keys = array_keys($matricula);
	//Mostrant els noms de les claus d'una array associatiu
	foreach ($keys as $key) {
		echo $key . "<br>";
	}
	?>
</body>

</html>