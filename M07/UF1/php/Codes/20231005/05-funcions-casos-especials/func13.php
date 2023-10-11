</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Treballant amb argumemts (o paràmetres) implicits</title>
</head>

<body>
	<?php
	function preu_venda_public($preu = 10)
	{ //$preu = 10 és un argument implicit
		$pvp = $preu * 1.21;
		return $pvp;
	}
	$preu = 20;
	$pvp = preu_venda_public($preu);
	echo "Preu de venda al Públic: $pvp €</br>";
	$pvp = preu_venda_public(); //Si a la funció no li passem cap valor, llavor s'agafarà l'argument implicit
	echo "Preu de venda al Públic: $pvp €</br>";
	?>
</body>

</html>