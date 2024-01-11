</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays indexats - II: Assignació de valors a posicions de l'array</title>
</head>

<body>
	<?php
	#cas 1 array indexat unidimensional inicialitzat
	$vector = array(3, 4, 5);
	$vector[0] = 7; # Accedint i assignant dades a una posició de l'array. El valor anterior era 3 i ara serà 7
	#
	#cas 2 array multidimensional indexat inicitalitzat
	$matriu = array(array(1, 2, 3), array(7, 9, 0), array(6, -1 - 2));
	$matriu[0][1] = -5; # Accedint i assignant dades a una posició de l'array. El valor anterior era 2 i ara serà -5
	$matriu[1] = array(5, 8, 0); # Accedint i assignant dades a un array de la matriu. 
	#
	#cas 3 array unidimensional indexat sense inicialització
	$nou_vector = array();
	$nou_vector[0] = 6; # Accedint i assignant dades a una posició de l'array. El nou valor serà 6
	#cas 4 array multidimensional indexat sense inicialització
	$nova_matriu = array();
	$nova_matriu[0] = array();
	$nova_matriu[1] = array();
	$nova_matriu[1][2] = 15; # Accedint i assignant dades a una posició de l'array. El nou valor serà 15
	?>
</body>

</html>