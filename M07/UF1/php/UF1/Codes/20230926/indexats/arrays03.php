</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays indexats - III: Accedint a dades de l'array</title>
</head>

<body>
	<?php
	#cas 1 array indexat unidimensional
	$vector = array(3, 4, 5);
	echo "Contingut de la posició 1 del vector: " . $vector[1] . "<br>"; # Accedint a una posició de l'array. El valor mostrat serà 4
	#
	#cas 2 array multidimensional indexat
	$matriu = array(array(1, 2, 3), array(7, 9, 0), array(6, -1 - 2));
	echo "Contingut de la posició (2,0) de la matriu: " . $matriu[2][0] . "<br>"; # Accedint a una posició de l'array. El valor mostrat serà 6	
	?>
</body>

</html>