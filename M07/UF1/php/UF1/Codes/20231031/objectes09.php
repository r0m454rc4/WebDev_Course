<?php
	#Treballant amb mètodes estàtics
	class cilindre {
		
		const PI = 3.1416;
		
		# Els mètodes estàtics poden ser cridata directament sense haver d'instanciar una classe
		# Els mètodes estàtic es decalaren utilitzan el modificadir "static"
		# Els mètodes són globals
		# Els mètodes estàtics poden utilitzar dins d'una classe que tingui una col·lecció de mètodes que serveixin de suport i que siguin fàcils d'utilitzar. 
		# Millora de l'eficiència per no haver d'instanciar la classe.
		# El mètodes estàtics poden trencar la modularitat de la POO
		static function volum($r,$l){
			$vol = self::PI * $r**2 * $l; # Per cridar a una constant des de dins de la classe s'utilitza 
			return $vol;				  # self:: davant del nom de la constant. No s'utilitza $this ->
 		}								  # perquè no és una variable.
	}
	$RADI=2;
	$LONG=5;
	echo "El volumen del cilindre es ".cilindre::volum($RADI,$LONG)." metres cúbics<br>";
?>
	
	
