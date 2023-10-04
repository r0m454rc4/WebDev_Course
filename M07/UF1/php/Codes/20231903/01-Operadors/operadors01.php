<html>

<head>
	<title>PROVES AMB VARIABLES</title>
</head>

<body>
	<b><u>INICI DE LES PROVES AMB OPERADORS DE CADENES I LÒGICS</u></b><br>
	<?php
	echo "<br><b>Operadords amb cadenes</b><br>";
	$str1 = "Prova";
	$str2 = "_d'operadors";
	echo '$str1 = ' . $str1 . "<br>";
	echo '$str2 = ' . $str2 . "<br>";
	echo "Concatenació " . '$str1' . "." . '$str2 = ' . $str1 . $str2 . "<br>";
	echo "Després de concatenar les cadenes no han canviat: " . '$str1 = ' . $str1 . " i " . ' $str2 = ' . $str2 . "<br>";
	$str1 .= $str2;
	echo "Assignació de concatenació " . '$str1' . " .= " . '$str2 => ' . '$str1 = ' . $str1 . " i " . ' $str2 = ' . $str2 . "<br>";
	echo '$str1' . " ha canviat<br>";
	echo "<hr>";
	echo "<br><b>Operadords lògics: (and &&) (or ||) xor !</b><br>";
	$a = 5;
	$b = 3;
	$c = 9;
	if (($a > $b) && ($b < $c)) echo "L'operació lògica (($a > $b) && ($b < $c)) és veritat<br>";
	else echo "L'operació lògica (($a > $b) && ($b < $c)) és falsa<br>";
	if (($a > 10) || ($b < 1)) 	echo "L'operació lògica (($a > 10) || ($b < 1)) és veritat<br>";
	else echo "L'operació lògica (($a > 10) || ($b < 1)) és falsa<br>";
	if (!(($a > $b) && ($b < $c))) echo "L'operació lògica (!(($a > $b) && ($b < $c))) és veritat<br>";
	else echo "L'operació lògica (!(($a > $b) && ($b < $c))) és falsa<br>";
	if (($a > $b) xor ($b < $c)) echo "L'operació lògica (($a > $b) xor ($b < $c)) és veritat<br>";
	else echo "L'operació lògica (($a > $b) xor ($b < $c)) és falsa<br>";
	?>
	<b>FINAL DE LES PROVES AMB OEPRADORS</b>
</body>

</html>