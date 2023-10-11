<html>

<head>
	<title>PROVES AMB VARIABLES</title>
</head>

<body>
	<b><u>INICI DE LES PROVES AMB OPERADORS</u></b><br>
	<?php
	echo "<br><b>Operadords aritmètics (només variables numèriques)</b>b><br>";
	echo "LLista d'operadors: + - * / ** %<br>";
	$a = 4;
	$b = 2.1;
	$c = 3.5E+2; # 3,5E+2 = 3,5 * 10^2 = 3,5 * 10 * 10 = 350
	$d1 = $a + $b;
	$d2 = $a / $b;
	$d3 = $a - $c;
	$d4 = $b * $c;
	$d5 = $c % $a; # 350 / 4 => La divisió és 87 i la resta és 2.
	$d6 = $b ** $a;
	$d7 = $c / $b;
	echo var_dump($a) . '$a = ' . $a . "<br>";
	echo var_dump($b) . '$b = ' . $b . "<br>";
	echo var_dump($c) . '$c = ' . $c . "<br>";
	echo var_dump($d1) . '$d1 = ' . $d1 . "<br>";
	echo var_dump($d2) . '$d2 = ' . $d2 . "<br>";
	echo var_dump($d3) . '$d3 = ' . $d3 . "<br>";
	echo var_dump($d4) . '$d4 = ' . $d4 . "<br>";
	echo var_dump($d5) . '$d5 = ' . $d5 . "<br>";
	echo var_dump($d6) . '$d6 = ' . $d6 . "<br>";
	echo var_dump($d7) . '$d7 = ' . $d7 . "<br>";
	echo "<br><b>Operadords assignació</b><br>";
	echo "x=y // x+=y--> x=x+y // x-=y --> x=x-y // x*=y --> x=x*y // x%=y=x%y<br>";
	echo "<br><b>Operadords de comparació: Comparacions numèriques o entre cadenes</b><br>";
	echo "==  ===   !=   <>   !==   <   >   >=   <= <br>";
	$x = 5;
	$y = 5.0;
	$z = "5";
	$c = "Hola";
	$d = "Adeu";
	echo "Comparació de " . '$x = ' . $x . "  i  " . '$y = ' . number_format($y, 1, '.', '') . "<br>";
	if ($x == $y) echo '$x és igual a $y' . "<br>";
	else echo '$x no és igual a $y' . "<br>";
	if ($x === $y) echo '$x és idèntic a $y' . "<br>";
	else echo '$x no és idèntic a $y' . "<br>";
	echo "---<br>";
	echo "Comparació de " . '$c = ' . $c . "  i  " . '$d = ' . $d . "<br>";
	if ($c > $d) echo "$c és més gran que $d";
	else  echo "$d és més gran que $c";
	echo "<br>";
	?>
	<b>FINAL DE LES PROVES AMB OEPRADORS</b>
</body>

</html>