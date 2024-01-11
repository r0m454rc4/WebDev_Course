<?php
#Definició bàsica de classe i instanciació d'objecte. Mètodes.
class rectangle
{
	public $l1;
	public $l2;

	# Mètode per càlcular l'àrea del rectangle
	# La paraula clau o modificador d'accés "public" significa
	# que el mètode és accessible des de fora de l'objecte.
	# Una funció sense modificador es considera per defecte pública	
	public function arect()
	{
		# $this s'utilitza per accedir a un atribut fora del mètode
		# o a un altre mètode de la classe
		$area = $this->l1 * $this->l2;
		return $area;
	}
}
$rect = new rectangle();
$rect->l1 = 5;
$rect->l2 = 5.3;
# Utilització del mètode públic arect de l'objecte $rect
$area_rectangle = $rect->arect();
echo "L'àrea del rectangles és: " . $area_rectangle . " metres quadrats<br>";
