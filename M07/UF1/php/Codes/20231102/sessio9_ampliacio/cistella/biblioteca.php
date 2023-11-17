<?php
	define('FITXER_USUARIS',"./usuaris/usuaris");
	define('DIRECTORI_CISTELLA',"./cistella/");
	
	function fLlegeixFitxer($nomFitxer){
		if ($fp=fopen($nomFitxer,"r")) {
			$midaFitxer=filesize($nomFitxer);
			$dades = explode(PHP_EOL, fread($fp,$midaFitxer));
			array_pop($dades); //La darrera línia, és una línia en blanc i s'ha d'eliminar de l'array				
			fclose($fp);
		}
		return $dades;
	}
	
	function fCreaCistella($nomUsuari,$nomProducte){
		$nomFitxer=DIRECTORI_CISTELLA.$nomUsuari;
		$afegit=false;
		if ($fp=fopen($nomFitxer,"w")) {
			if (fwrite($fp,$nomProducte)){
				$afegit=true;
				fclose($fp);
			}
		}		
		return $afegit;
	}
	
	
	function fAutenticacio($nomUsuariComprova){
		$usuaris = fLlegeixFitxer(FITXER_USUARIS);
		foreach ($usuaris as $usuari) {
			$dadesUsuari = explode(":", $usuari);
			$nomUsuari = $dadesUsuari[0];
			$ctsUsuari = $dadesUsuari[1];
			if(($nomUsuari == $nomUsuariComprova) && (password_verify($_POST['ctsnya'],$ctsUsuari))){
				$autenticat=true;
				break;
			}
			else  $autenticat=false;
		}
		return $autenticat;
	}
?>
