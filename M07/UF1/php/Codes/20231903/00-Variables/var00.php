<html>

<head>
	<title>PROVES AMB VARIABLES</title>
</head>

<body>
	<b><u>INICI DE LES PROVES AMB TIPUS DE VARIABLES</u></b><br>
	<?php
	$a = 4;
	$b = 2.1;
	$c = "d";
	$d1 = "prova";
	$d2 = 'prova $d1';
	$d3 = "prova $d1";
	$e1 = true;
	$e2 = false;
	$f = NULL;
	$g = array(1, 5.0, false, "d", "test");
	echo var_dump($a) . '$a = ' . $a . "<br>";
	echo var_dump($b) . '$b = ' . $b . "<br>";
	echo var_dump($c) . '$c = ' . $c . "<br>";
	echo var_dump($d1) . '$d1 = ' . $d1 . "<br>";
	echo var_dump($d2) . '$d2 = ' . $d2 . "<br>";
	echo var_dump($d3) . '$d3 = ' . $d3 . "<br>";
	echo var_dump($e1) . '$e1 = ' . $e1 . "<br>";
	echo var_dump($e2) . '$e2 = ' . $e2 . "<br>";
	echo var_dump($f) . '$f = ' . $f . "<br>";
	echo var_dump($g) . '$g' . "<br>";
	echo var_dump($g[0]) . '$g[0] = ' . $g[0] . "<br>";
	echo var_dump($g[1]) . '$g[1] = ' . $g[1] . "<br>";
	echo var_dump($g[2]) . '$g[2] = ' . $g[2] . "<br>";
	echo var_dump($g[3]) . '$g[3] = ' . $g[3] . "<br>";
	echo var_dump($g[4]) . '$g[4] = ' . $g[4] . "<br>";
	?>
	<b>FINAL DE LES PROVES AMB VARIABLES</b>
</body>

</html>