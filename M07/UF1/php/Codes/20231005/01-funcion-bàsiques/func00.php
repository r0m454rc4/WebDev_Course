</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions amb i sense paràmetres. Funcions que retornen un int,float,char. Funcions que no retornen cap dada</title>
</head>

<body>
	<?php
	function titol()
	{
		echo "<b><u>CÀLCUL DEL PVP AMB I SENSE DESCOMPTE</u></b><br>";
	}

	function mostra_dades($preu, $desc, $iva, $codi_prod)
	{
		echo "El preu del producte $codi_prod és: $preu €<br>";
		echo "El decompte del producte $codi_prod és: $desc%<br>";
		echo "L'iva del producte $codi_prod és: $iva%<br>";
	}

	function mostra_resultats($pvp, $pvpDesc, $codi_prod)
	{
		echo "El preu de venda al públic sense descomptes del producte $codi_prod és: $pvp €<br>";
		echo "El preu de venda al públic amb descomptes del producte $codi_prod és: $pvpDesc €<br>";
	}

	function codi_producte()
	{
		$codi = "A";
		return $codi;
	}


	function preu_venda_public($preu, $iva)
	{
		$resultat = $preu * (1 + ($iva / 100));
		return $resultat;
	}

	function pvpDescompte($desc, $preu, $iva)
	{
		$resultat = ($preu * (1 - ($desc / 100))) * (1 + ($iva / 100));
		return $resultat;
	}

	$preu = 20;
	$desc = 5;
	$iva = 21;
	titol(); //Crida a una funció que no retorna cap valor i no treballa amb paràmetres (també anomenats arguments)
	$codi_prod = codi_producte(); //Crida a una funció que retorna un valor i no treballa amb paràmetres
	mostra_dades($preu, $desc, $iva, $codi_prod); //Crida a una funció que no retorna cap valor i treballa amb paràmetres 
	$pvp = preu_venda_public($preu, $iva); //Crida a una funció que retorna un valor i treballa amb paràmetres
	$pvpDesc = pvpDescompte($desc, $preu, $iva); //Crida auna funció que retorna un valor i treballa amb paràmetres	
	mostra_resultats($pvp, $pvpDesc, $codi_prod); //Crida a a una funció que no retorna cap valor i treballa amb paràmetres	
	?>
</body>

</html>