<?php
	#Treballant amb mètodes privats
	#Els mètodes poden ser públics, privats o protegits com els atributs
	#Per defecte, els mètodes són públics
	#Un mètode privat no es pot utilitzar en una classe filla d'una classe pare
	#Un mètode protegit es pot utilitzar dins d'una classe filla
	class Fitxer{
		private $usuari_ok="clot";
				
		public function __construct($nom_fitxer,$nom_usuari){
			if ($nom_usuari == $this->usuari_ok){
				$df = fopen($nom_fitxer,"w") or die("No s'ha pogut crear el fitxer");
				fclose($df);
				echo "S'ha creat el fitxer <i>".$nom_fitxer."</i><br>";
			}			
		}
				
		private function AfegintDades($txt,$nfitx){
			$df = fopen($nfitx,"a");
			fwrite($df,$txt);
			fclose($df);			
		}
		
		public function Afegeix_text($text,$nom_fitxer,$nom_usuari){
			if ($nom_usuari == $this->usuari_ok){
				$this->AfegintDades($text,$nom_fitxer);
				echo "S'ha introduït el text <b>".$text."</b> dins del fitxer <i>".$nom_fitxer."</i><br>";
			}
			else{
				echo "L'usuari $nom_usuari no pot introduir dades dins del fitxer<br>";
			}
		} 
	}
		
	$nom_fitxer="tmp/text00.txt";
	$nom_usuari="clot";
	$arxiu = new Fitxer($nom_fitxer,$nom_usuari);
	#
	#Si intentem accedir directament a AfegintDades() que és un mètode privat, tenim un error i el codi es para a mitja execució
	#Comprova-ho treient el comentari a la següent línia
	#$arxiu->AfegintDades($text,$nom_fitxer);
	#
	$text="Aquesta és la primera línia\n";
	$arxiu->afegeix_text($text,$nom_fitxer,$nom_usuari);
	$text="Aquesta és la segona línia\n";
	$arxiu->afegeix_text($text,$nom_fitxer,$nom_usuari);
		
?>
