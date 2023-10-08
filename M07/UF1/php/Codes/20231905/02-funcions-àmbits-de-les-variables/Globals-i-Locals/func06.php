</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions --> Àmbits de les variables. Variables globals i locals. </title>
</head>

<body>
	<?php
	// https://www.guru99.com/local-vs-global-variable.html
	error_reporting(0); // Elimina informe d'errors
	function preu_venda_public($preu, $iva)
	{ //El nom de la variable en la crida a la funció pot ser diferent al nom en la definició de la funció  
		global $nom_venedor; // El seu àmbit serà vàlid dins i fora de la funció
		$pvp = $preu * (1 + ($iva / 100));
		$codi = 1001;
		$nom_venedor = "Joan Pi Pons";
		echo "<u>Visualització de dades dins de la funció preu_venda_public</u><br>";
		echo "- " . $preu . "<br>"; // La variable $preu existeix només dins de la funció. És local. No existeix fora de la funció.
		echo "- " . $iva . "<br>"; // La variable $iva existeix només dins de la funció. És local. No existeix fora de la funció.
		echo "- " . $pvp . "<br>"; // La variable $pvp existeix només dins de la funció. És local. No existeix fora de la funció.
		//
		echo "- " . $pr . "<br>"; // La variable $pr no existeix dins de la funció. 
		echo "- " . $i . "<br>"; // La variable $i no existeix dins de la funció. 
		echo "- " . $pvpub . "<br>"; // La variable $pvpub no existeix dins de la funció. 
		//
		echo "- codi de venda: " . $codi . "<br>";  //Aquest variable $codi existeix només dins de la funció. És local.
		//És diferent a la variable codi fora de la funció
		//Poden tenir el mateix nom perquè treballen en àmbits diferents.	
		//
		echo "- el nom del venedor és: " . $nom_venedor . "<br>"; //La variable $nom_venedor és global i també existirà fora de la funció
		return $pvp;
	}
	$pr = 100;
	$i = 14;
	$pvpub = preu_venda_public($pr, $i); //El nom de la variable en la crida a la funció pot ser diferent al nom en la definició de la funció
	$codi = 3078;
	echo "<br><u>Visualització de dades fora de la funció preu_venda_public</u><br>";
	echo "- " . $preu . "<br>"; // La variable $preu no existeix fora de la funció preu_venda_public. Variable global accessible només fora d'una funció
	echo "- " . $iva . "<br>"; // La variable $iva no existeix fora de la funció preu_venda_public. Variable global accessible només fora d'una funció
	echo "- " . $pvp . "<br>"; // La variable $pvp no existeix fora de la funció preu_venda_public. Variable global accessible només fora d'una funció
	//
	echo "- " . $pr . "<br>"; // La variable $pr sí existeix fora de la funció preu_venda_public
	echo "- " . $i . "<br>"; // La variable $i sí existeix fora de la funció preu_venda_public
	echo "- " . $pvpub . "<br>"; // La variable $pvpub sí existeix fora de la funció preu_venda_public
	//
	echo "- codi de compra: " . $codi . "<br>"; //Aquest variable $codi és diferent a la variable $codi de la funció preu_venda_public.
	//Poden tenir el mateix nom perquè treballen en àmbits diferents.
	//
	echo "- el nom del venedor és: " . $nom_venedor . "<br>"; //La variable $nom_venedor és global i també existirà fora de la funció preu_venda_public
	?>
</body>

</html>