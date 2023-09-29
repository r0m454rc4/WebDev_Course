</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays - V: Altres</title>
</head>

<body>
	<?php
	# Trobant la mida d'una array
	# Treballant amb index i variables
	# Mostrant valors d'un array unidimensional/muldimensional indexat amb un for
	#
	$notes = array(array(6, 9, 3, 5), array(7, 5, 2, 8), array(6, 4, 2, 3));
	$dim_notes = sizeof($notes); # Trobant la mida de l'array notes. La mida serà 3 per que és un array amb 3 arrays.
	for ($i = 0; $i < $dim_notes; $i++) { # Accedint als arrays
		$alumne = $notes[$i]; # $alumne serà una array. Per exemple, quan $i valgui 1 --> $alumne serà (7,5,2,8)
		$dim_alumne = sizeof($alumne); # Trobant la mida de l'array alumne. La mida serà 4 per que és un array amb 4 dades.
		for ($j = 0; $j < $dim_alumne; $j++) { # Accedint a totes les posicions dins de cada array 
			echo "Alumne $i nota $j: $alumne[$j]<br>";
		}
	}
	?>
</body>

</html>