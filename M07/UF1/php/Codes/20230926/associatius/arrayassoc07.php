</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays associatius- VI</title>
</head>

<body>
	<?php
	#declaració d'array unidimensional/multidimensional associatiu sense inicialització
	$matriu = array();
	# Afegim posicions i dades. Cada posició és una array sense inicialització associatiu
	$matriu["uf1"] = array();
	$matriu["uf2"] = array();
	# Afegim posicions i dades als arrays associatius.
	$matriu["uf1"]["pons"] = 9;
	$matriu["uf1"]["puig"] = 4;
	$matriu["uf1"]["prats"] = 7;
	$matriu["uf2"]["pons"] = 6;
	$matriu["uf2"]["puig"] = 2;
	$matriu["uf2"]["prats"] = 5;
	// Accedint a una posicio
	echo "<b>La nota de l'alumne pons per la unitat formativa uf2 és: </b>" . $matriu["uf2"]["pons"] . "<br>"; # Accedint a una posició de l'array	
	?>
</body>

</html>