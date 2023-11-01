<?php
#Treballant amb constructor. Atributs i mètodes privats.
# Assignant valor a atributs privats en el moment d'instanciar
# l'objecte uttilitzant el mètode màgic constructor.
class cilindre
{
	# Els atributs $radi i $longitud són privats
	# Només és pot accedir al seu contingut des dins
	# de l'objecte però no des de fora i NO es poden transmetre
	# per herència.		
	private $radi;
	private $longitud;

	#El mètode mgic constructor s'executa sempre en el moment d'instanciar la classe
	public function __construct($r, $l)
	{
		# El mètode constructor pot accedir a $radi i $longitud
		# perquè hi accedeix des de dins de l'objecte, no des de fora
		$this->radi = $r;
		$this->longitud = $l;
	}

	# Els mètode "area" és privat
	# Només és pot accedir al mètode des dins
	# de l'objecte però no des de fora i NO es pot transmetre
	# per herència.	
	private function area()
	{
		return M_PI * pow($this->radi, 2);
	}

	public function volum()
	{
		# $this->area() crida al mètode "area" des del mètode
		# "volum" que pot accedir perquè ho fa des de dins de
		# l'objecte no des de fora.
		return $this->area() * $this->longitud;
	}
}

$cil = new cilindre(4, 8);
echo "El volumen del cilindre és " . number_format($cil->volum(), 2) . " metres cúbics<br>";
	# Descomenta la següent línia i comprova si funciona
	#echo "L'àrea del cercle és ".number_format($cil -> area(),2)." metres quadrats<br>";
	# Descomenta la següent línia i comprova si funciona
	#echo "El radi del cilindre és ".$cil -> radi." metres<br>";
