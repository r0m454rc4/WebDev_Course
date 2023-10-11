<html>

<head>
	<title>PROVES AMB VARIABLES</title>
</head>

<body>
	<b><u>INICI DE LES PROVES DE CASTING I CANVI DE DE TIPUS DE VARIABLES</u></b><br>
	<?php
	echo "<u>Casting bàsic: (int), (float), (string) i (bool). Funció gettype()</u><br>";
	$a = 4;
	$b = 2.1;
	$c = "d";
	$d = "10";
	$e = "prova";
	$f = true;
	echo gettype($a) . ' $a= ' . $a . "<br>";
	echo gettype($b) . ' $b = ' . $b . "<br>";
	echo gettype($c) . ' $c = ' . $c . "<br>";
	echo gettype($d) . ' $d = ' . $d . "<br>";
	echo gettype($e) . ' $e = ' . $e . "<br>";
	echo gettype($f) . ' $f = ' . $f . "<br>";
	echo gettype($f) . ' $f' . "<br>";
	$a1 = (float) $a;
	$a2 = (float) $a;
	$b1 = (int) $b;
	$c1 = (int) $c;
	$d1 = (int) $d;
	$e1 = (string) $b;
	$f1 = (int) $f;
	$g1 = (bool) $a;
	$h1 = (int) false;
	echo gettype($a1) . ' $a1 = (float) $a = ' . $a1 . "<br>";
	echo gettype($a2) . ' $a2 = (double) $a = ' . $a2 . " // double = float = real <br>";
	echo gettype($b1) . ' $b1 = (int) $b = ' . $b1 . "<br>";
	echo gettype($c1) . ' $c1 = (int) $c = ' . $c1 . "<br>";
	echo gettype($d1) . ' $d1 = (int) $d = ' . $d1 . "<br>";
	echo gettype($e1) . ' $e1 = (string) $e = ' . $e1 . "<br>";
	echo gettype($f1) . ' $f1 = (int) $f = ' . $f1 . "<br>";
	echo gettype($g1) . ' $g1 = (bool) $a = ' . $g1 . "<br>";
	echo gettype($h1) . ' $h1 = (int) false = ' . $h1 . "<br>";
	echo "IMPORTANT: Els tipus de $a, $b, $c, $d. $e i $f NO han canviat!!!!!!<br>";
	echo "<u>Funció settype()</u><br>";
	echo 'settype($var,$tipus). Llista de tipus = "int", "float" o "double", "bool", "string", "array", "null", "object" <br>';
	$a = 4;
	$b = 2.1;
	echo gettype($a) . ' $a= ' . $a . "<br>";
	echo gettype($b) . ' $b = ' . $b . "<br>";
	settype($b, "int");
	settype($a, "float");
	echo 'settype($a,"float") = ' . gettype($a) . " $a <br>";
	echo 'settype($b,"int") = ' . gettype($b) . " $b <br>";
	echo "IMPORTANT: Els tipus de $a i $b SÍ han canviat!!!!!!<br>";
	?>
	<b>FINAL DE LES PROVES AMB VARIABLES</b>
</body>

</html>