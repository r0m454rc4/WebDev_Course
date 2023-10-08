<html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Treballant amb variables estàtiques</title>
</head>

<body>
	<b>Variables estàtiques</b><br>
	Una variable estàtica és aquella que té un temps de vida que s'exten al llarg de tot el programa<br>
	Una variable estàtica emmagatzema el seu valor entre diferents crides consecutives a la funció a on està definida<br>
	Una variable estàtica és inicialitzada només una vegada. Aquesta inicialització es dur a terme quan es fa la primera crida a la funció<br>

	<?php
	function varNoEst()
	{
		$value1 = 0;
		$value1 += 1;

		return $value1;
	}

	function varEst()
	{
		static $value2 = 0; // Declaració de $value2 com a variable estàtica
		$value2 += 1;

		return $value2;
	}
	//
	varNoEst();
	varNoEst();
	varNoEst();
	varNoEst();
	//
	VarEst();
	VarEst();
	VarEst();
	VarEst();
	//
	echo "<b>Exemple de treball amb variables estàtiques i no estàtiques</b><br>";
	echo "Valor de la variable no estàtica " . '$value1' . " després de ser cridada la funció VarNoEst() 5 vegades = " . varNoEst() . "<br>";
	echo "Valor de la variable estàtica " . '$value2' . " després de ser cridada la funció VarEst() 5 vegades = " . varEst() . "<br>";
	?>
</body>

</html>