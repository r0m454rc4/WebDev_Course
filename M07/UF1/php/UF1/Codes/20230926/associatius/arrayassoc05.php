</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays associatius- V</title>
</head>

<body>
	<?php
	//Array unidimensional associatiu. Treballant amb foreach.
	echo "<u>ARRAY UNIDIMENSIONAL ASSOCIATIU</u><br>";
	$mitjanes = array("Pons" => 3, "Peris" => 7, "Ramírez" => 6);
	foreach ($mitjanes as $cognom => $mitjana) {
		echo "La nota mitjana de " . $cognom . " és " . $mitjana . "<br>";
	}
	echo "<hr>";
	//
	//
	//Array associatiu amb arrays indexats a cada posició.  Treballant amb foreach.	
	echo "<u>ARRAY MULTIDIMENSIONAL ASSOCIATIU - I: ARRAY INDEXAT DINS D'ARRAY ASSOCIATIU</u><br>";
	$notes_classe = array("Pons" => array(5, 0, 4), "Peris" => array(9, 4, 8), "Ramírez" => array(7, 7, 4));
	foreach ($notes_classe as $cognom => $notes_alumne) {
		$mitjana = 0;
		foreach ($notes_alumne as $nota) {  // Here I'm moving inside the array of numbers, I'm here: array(5, 0, 4).
			$mitjana = $mitjana + $nota;
		}
		$mitjana = $mitjana / sizeof($notes_alumne);  // sizeof($notes_alumne) is to have a dynamic size of the array.
		echo "La nota mitjana de $cognom és $mitjana<br>";
	}
	echo "<hr>";
	//
	//
	//Array multidimensional associatiu - II. Treballant amb foreach.
	echo "<u>ARRAY MULTIDIMENSIONAL ASSOCIATIU - II: ARRAY ASSOCIATIU DINS D'ARRAY ASSOCIATIU</u><br>";
	$notes_classe = array(
		"Pons" => array("m1" => 5, "m2" => 0, "m3" => 4),
		"Peris" => array("m1" => 9, "m2" => 4, "m3" => 8),
		"Ramírez" => array("m1" => 7, "m2" => 7, "m3" => 4)
	);
	foreach ($notes_classe as $cognom => $notes_alumne) {
		$mitjana = 0;
		foreach ($notes_alumne as $mod => $nota) {
			echo "La nota de $cognom del mòdul $mod és $nota<br>";
			$mitjana = $mitjana + $nota;
		}
		$mitjana = $mitjana / sizeof($notes_alumne);
		echo "<i>La nota mitjana de $cognom és $mitjana</i><br>";
	}
	?>
</body>

</html>