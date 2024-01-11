<html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Treballant amb variables globals i locals</title>
</head>

<body>
	<b>Variables globas i locals</b><br>
	Una variable local només existeix dins de l'àmbit de la funció a on s'ha definit. Fora de la funció no existeix i no pot ser referenciada<br>
	Una variable definida fora de l'àmbit d'una funció no pot ser utilitzada dins de la funció<br>
	Dues variables poden tenir el mateix nom si estan definides en àmbits diferents<br>
	Si volem fer referència dins d'una funció a una variable que s'ha definit fora de l'àmbit de la funció, llavors s'ha d'utilitzar la paraula clau <i>global</i><br>

	<?php
	$edat = 20;
	function mostraEdat1()
	{
		echo "Variable " . '$edat' . " dins de la funció = " . $edat . "<br>";
	}

	function mostraEdat2()
	{
		$edat = 30; // Declaració de $value2 com a variable local
		echo "Variable " . '$edat' . " dins de la funció = " . $edat . "<br>";
	}
	function mostraEdat3()
	{
		global $edat; // Declaració de $value2 com a variable global
		$edat = 15;
		echo "Variable " . '$edat' . " dins de la funció = " . $edat . "<br>";
	}
	//
	echo "<b>Treballant amb variables globas i locals</b><br>";
	echo "Variable " . '$edat' . " abans de cridar a la funció = " . $edat . "<br>";
	// Has de treure el comentari a una de les crides i afegir-lo a la resta
	// per veure l'efecte de treballar amb variables globals i locals
	// mostraEdat1();
	mostraEdat2();
	// mostraEdat3();
	echo "Variable " . '$edat' . " després de cridar a la funció = " . $edat . "<br>";
	?>
</body>

</html>