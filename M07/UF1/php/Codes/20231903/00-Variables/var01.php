<html>

<head>
	<title>PROVES AMB VARIABLES</title>
</head>

<body>
	A variable starts with the $ sign, followed by the name of the variable<br>
	A variable name must start with a letter or the underscore character<br>
	A variable name cannot start with a number<br>
	A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )<br>
	Variable names are case-sensitive ($age and $AGE are two different variables)<br>
	<br>
	<b><u>INICI DE LES PROVES AMB NOMS DE VARIABLES</u></b><br><br>
	<?php
	$a = 4;
	$_a = 2.1;
	$A = "d";
	//$1a = "prova";
	$a_1 = 'prova $A';
	$só = 19;
	$a1 = "prova $A";
	//$a-1=true;
	echo $só . "<br>";
	echo var_dump($a) . '$a = ' . $a . "<br>";
	echo var_dump($_a) . '$_a = ' . $_a . "<br>";
	echo var_dump($A) . '$A = ' . $A . "<br>";
	echo '$1a = ' . "Incorrecte" . "<br>";
	echo var_dump($a_1) . 'a_1 = ' . $a_1 . "<br>";
	echo var_dump($a1) . '$a1 = ' . $a1 . "<br>";
	echo '$a-1 = ' . "Incorrecte" . "<br>";
	?>
	<br>
	<b>FINAL DE LES PROVES AMB VARIABLES</b>
</body>

</html>