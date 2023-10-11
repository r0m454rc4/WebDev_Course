</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions amb quantitat d'arguments variables</title>
</head>

<body>
	<?php
	function mitjana(...$dades)
	{
		$suma = 0;
		foreach ($dades as $dada) {
			$suma += $dada;
		}
		$mitjana = $suma / (count($dades));
		return number_format($mitjana, 2);
	}
	echo "La mitjana és: " . mitjana(1, 3, 4, 5, 6, 9) . "</br>";
	echo "La mitjana és: " . mitjana(1, 4, 5, 6) . "</br>";
	echo "La mitjana és: " . mitjana(1, 4) . "</br>";
	echo "La mitjana és: " . mitjana(1, 4, 5, 6, 8, 9, 0, 3, 2) . "</br>";
	?>
</body>

</html>