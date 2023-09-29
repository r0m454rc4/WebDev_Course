</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays - IV Mostrant estructura, tipus i valors de dades d'un array</title>
</head>

<body>
	<?php
	#cas 1 array unidimensional indexat inicialitzat
	$vector = array(3, 2, 5);
	echo "<b>Contingut i estrucutura del vector -->  </b>";
	var_dump($vector) . "<br>"; #var_dump és una funció útil per veure la estructura, tipus i continguts d'una variable. És útil per fer depuració dels programes
	echo "##########<br>";
	#
	#cas 2 array multidimensional indexat incialitzat
	$matriu = array(array(1, 2, 3), array(7, 9, 0), array(6, -1 - 2));
	echo "<b>Contingut i estrucutura de la matriu -->  </b>";
	var_dump($matriu) . "<br>";
	echo "##########<br>";
	#
	#cas 3 declaració d'array indexat unidimensional indexat sense inicialització
	$nou_vector = array();
	var_dump($nou_vector) . "<br>";
	echo "##########<br>";
	#cas 4 declaració d'array indexat multidimensional indexat sense inicialització
	$nova_matriu = array();
	$nova_matriu[0] = array();
	$nova_matriu[1] = array();
	var_dump($nova_matriu) . "<br>";
	?>
</body>

</html>