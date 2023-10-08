<?php

declare(strict_types=1); //FES CANVIS AQUÍ PER COMPROVAR EL FUNCIONAMENT D'AQUESTA DECLARACIÓ. ELS VALORS SÓN 0/1
//
//Declaració de les opcions coercitius o estrictes pels tipus passats a la funció: int, float, bool, string, array 
// Coercitius --> strict_types = 0 (valor per defecte) --> No obliga a utilitzar el tipus però fa conversió de tipus
// Estrictes --> strict_types = 1 --> Obliga a utilitzar el tipus 
//Nou per PHP7
//https://www.tutorialspoint.com/php7/php7_scalartype_declarations.htm
//
echo "TREBALLANT AMB TIPUS ESTRICTES EN EL PAS DE VARIABLES<br>";
function mitjana00(...$dades)
{
	$suma = 0;
	foreach ($dades as $dada) {
		echo "$dada<br>";
		$suma += $dada;
	}
	$mitjana = $suma / (count($dades));
	echo "$suma<br>";
	return number_format($mitjana, 2);
}
function mitjana01(int ...$dades)
{ //Les dades a passar a la funció han de ser de tipus enter
	$suma = 0;
	foreach ($dades as $dada) {
		echo "$dada<br>";
		$suma += $dada;
	}
	$mitjana = $suma / (count($dades));
	echo "$suma<br>";
	return number_format($mitjana, 2);
}
echo "La mitjana és: " . mitjana00(1.0, 3.2, 4, 5, 6, 9.5) . "</br>";
//Aquesta crida NO falla en cap caps perquè no hi ha declaració de tipus
echo "La mitjana és: " . mitjana01(1.0, 3.2, 4, 5, 6, 9.5) . "</br>";
//Aquesta crida falla si strict_types=1
//Aquesta crida NO falla si strict_types=0 pero els valor es passen com a tipus enters
echo "La mitjana és: " . mitjana01(1, 3, 4, 5, 6, 9) . "</br>"; 
	//Aquesta crida NO falla en cap caps perquè passem nombres enters
