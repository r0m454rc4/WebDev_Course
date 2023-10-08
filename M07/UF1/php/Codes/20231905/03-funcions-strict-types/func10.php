<?php
	declare (strict_types=1); //FES CANVIS AQUÍ PER COMPROVAR EL FUNCIONAMENT D'AQUESTA DECLARACIÓ. ELS VALORS SÓN 0/1
	//
	//Declaració de les opcions coercitius o estrictes pels tipus RETORNATS per la funció: int, float, bool, string, array 
	// Coercitius --> strict_types = 0 (valor per defecte)
	// Estrictes --> strict_types = 1 
	//https://www.tutorialspoint.com/php7/php7_returntype_declarations.htm
	//
	echo "TREBALLANT AMB TIPUS ESTRICTES EN EL PAS DE VARIABLES I RETORN DE LA FUNCIÓ<br>";
	function mitjana00(float ...$dades): float { // //La variable retornada serà float. Les variables passades són float
		$suma=0;
		foreach ($dades as $dada) {
			echo "$dada<br>";
			$suma+=$dada;
		}
		$mitjana=$suma/(count($dades));
		echo "$suma<br>";
		return $mitjana;
	}
	function mitjana01(float ...$dades): int { //La variable retornada serà entera. Les variables passades són float
		$suma=0;
		foreach ($dades as $dada) {
			echo "$dada<br>";
			$suma+=$dada;
		}
		$mitjana=$suma/(count($dades));
		echo "$suma<br>";
		return $mitjana;
	}
	$mitj00 = mitjana00(1.0, 3.2, 4.6, 5.9, 6.2, 9.5);
	$mitj01 = mitjana01(1.0, 3.2, 4.6, 5.9, 6.2, 9.5);
	echo "El valor de La mitjana en format float és: ".$mitj00."</br>";
	//Amb strict_types=1 NO hi ha error perquè el valor retornat és float
	//Amb strict_types=0 NO hi ha error perquè el valor retornat és float
	echo "El valor de La mitjana en format enter és: ".$mitj01."</br>";
	//Amb strict_types=1 SÍ hi ha error perquè el valor retornat hauria de ser enter
	//Amb strict_types=0 NO hi ha error però el valor retornat és un enter
