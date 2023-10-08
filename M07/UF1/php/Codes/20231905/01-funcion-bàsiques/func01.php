</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions que retornen un array</title>
</head>

<body>
	<?php
	function calcCerc($radi)
	{
		$lc = 2 * M_PI * $radi;
		$area = M_PI * pow($radi, 2);
		return array($lc, $area);
	}
	echo "CÀLCUL DE LA LONGITUD I ÀREA D'UN CERCLE<br>";
	$radi = 1.5;
	echo "Radi: $radi cm<br>";
	$valors = calcCerc($radi); //$valors és un array
	echo "Longitud circumferència: $valors[0] cm</br>";
	echo "Àrea del cercle: $valors[1] cm2</br>";
	?>
</body>

</html>