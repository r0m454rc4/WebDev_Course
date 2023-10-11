</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arguemts (o paràmetres) per referència</title>
</head>

<body>
	<?php
	function intercanvi1($v1, $v2)
	{
		$temp = $v1;
		$v1 = $v2;
		$v2 = $temp;
		echo "Dins de la funció intercanvi1-> valor v1: $v1 - valor v2: $v2</br>";
	}
	function intercanvi2(&$v1, &$v2)
	{
		$temp = $v1;
		$v1 = $v2;
		$v2 = $temp;
		echo "Dins de la funció intercanvi2-> valor v1: $v1 - valor v2: $v2</br>";
	}
	function afegir1($cadena1, $cadena2)
	{
		$cadena1 .= " $cadena2"; //$cadena1 = $cadena1.$cadena2
		echo "Dins de la funció afegir1 -> valor cadena1: $cadena1</br>";
	}
	function afegir2(&$cadena1, $cadena2)
	{
		$cadena1 .= " $cadena2"; //$cadena1 = $cadena1.$cadena2 
		echo "Dins de la funció afegir2 -> valor cadena1: $cadena1</br>";
	}
	$v1 = 3;
	$v2 = 5;
	$cadena1 = "Hola";
	$cadena2 = "món";
	echo "Abans d'executar la funció intercanvi1-> valor v1: $v1 - valor v2:$v2</br>";
	intercanvi1($v1, $v2);
	echo "Després d'executar la funció intercanvi1-> valor v1: $v1 - valor v2:$v2</br>";
	echo "<br>";
	echo "Abans d'executar la funció intercanvi2-> valor v1: $v1 - valor v2:$v2</br>";
	intercanvi2($v1, $v2);
	echo "Després d'executar la funció intercanvi2-> valor v1: $v1 - valor v2':$v2</br>";
	echo "</br><br>";
	echo "Abans d'executar la funció afegir1-> valor cadena1: $cadena1</br>";
	afegir1($cadena1, $cadena2);
	echo "Després d'executar la funció afegir2-> valor cadena1: $cadena1</br>";
	echo "<br>";
	echo "Abans d'executar la funció afegir2-> valor cadena1: $cadena1</br>";
	afegir2($cadena1, $cadena2);
	echo "Després d'executar la funció afegir2-> valor cadena1: $cadena1</br>";
	?>
</body>

</html>