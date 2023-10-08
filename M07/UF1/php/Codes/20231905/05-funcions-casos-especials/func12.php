</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions variables</title>
</head>

<body>
	<?php
	function preu_venda_public($preu)
	{
		$pvp = $preu * 1.21;
		return $pvp;
	}
	function pvp_descompte($desc, $preu)
	{
		$pvp = ($preu * (1 - ($desc / 100))) * 1.21;
		return $pvp;
	}
	$preu = 20;
	$desc = 5;
	$tipus = "pvp_descompte";
	$pvp = $tipus($desc, $preu);  // The same as $pvp = pvp_descompte($desc, $preu).
	echo "Preu de venda al Públic amb descompte: $pvp €</br>";
	$tipus = "preu_venda_public";
	$pvp = $tipus($preu);
	echo "Preu de venda al Públic: $pvp €</br>";
	// Nota important: Variable functions won't work with language constructs such as echo, print, unset(), isset(), empty(), include, require and the like.
	// Utilize wrapper functions to make use of any of these constructs as variable functions. 
	// Documentació: https://www.php.net/manual/en/functions.variable-functions.php
	?>
</body>

</html>