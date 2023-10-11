</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions --> Crida a funció que retorna un valor sense necessitat de deixar el resultat dins d'una variable</title>
</head>

<body>
	<?php
	function titol()
	{
		echo "<b><u>CÀLCUL DEL PVP AMB I SENSE DESCOMPTE</u></b><br>";
	}

	function preu_venda_public($preu, $iva)
	{
		$pvp = $preu * (1 + ($iva / 100));
		return $pvp;
	}

	function pvpDescompte($desc, $preu, $iva)
	{
		$pvp = ($preu * (1 - ($desc / 100))) * (1 + ($iva / 100));
		return $pvp;
	}

	titol();
	$preu = 20;
	$desc = 5;
	$iva = 21;
	echo "Preu: $preu €<br>";
	echo "Decompte: $desc%<br>";
	echo "IVA: $iva%<br>";
	//Crida a funcions que retornen un valor sense necessitat de deixar el resultat dins d'una variable
	echo "Preu de venda al públic: " . preu_venda_public($preu, $iva) . " €</br>";
	echo "Preu de venda al públic amb descompte: " . pvpDescompte($desc, $preu, $iva) . " €</br>";
	?>
</body>

</html>