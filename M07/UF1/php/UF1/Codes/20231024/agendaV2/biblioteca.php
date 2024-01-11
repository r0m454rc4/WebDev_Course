<?php
	define('TEMPS_EXPIRACIO',120); #TEMPS D'EXPIRACIÓ DE LA SESSIÓ EN SEGONS
	define('COMU',"COMU");
	define('PROFESSIONAL',"PROFESSIONAL");
	define('FITXER_USUARIS',"/var/www/html/agendaV2/usuaris/usuaris");
	define('FITXER_PERSONAL',"/var/www/html/agendaV2/dades/familia_amics.txt");
	define('FITXER_PROFESSIONAL',"/var/www/html/agendaV2/dades/professional");
	define('FITXER_SERVEIS',"/var/www/html/agendaV2/dades/serveis");
	
	function fLlegeixFitxer($nomFitxer){
		if ($fp=fopen($nomFitxer,"r")) {
			$midaFitxer=filesize($nomFitxer);
			$dades = explode(PHP_EOL, fread($fp,$midaFitxer));
			array_pop($dades); //La darrera línia, és una línia en blanc i s'ha d'eliminar de l'array				
			fclose($fp);
			}
		return $dades;
	}
	
	function fCreaTaula($llista,$tipus){
		foreach ($llista as $entrada) {
			$dadesEntrada = explode(":", $entrada);
			$nom = $dadesEntrada[0];
			if ($tipus=="COMU"){
				$tlf = $dadesEntrada[1]; 
				echo "<tr><td>$nom</td><td>$tlf</td></tr>";
			}
			else{
				$carrec = $dadesEntrada[1];
				$tlf = $dadesEntrada[2]; 
				echo "<tr><td>$nom</td><td>$carrec</td><td>$tlf</td></tr>";
			}					
		}
		return 0;
	}
?>
