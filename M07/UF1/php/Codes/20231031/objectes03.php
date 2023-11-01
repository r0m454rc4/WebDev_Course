<?php
# Assignant valor a atributs privats a través des mètodes públics.
class cilindre
{
	# Els atributs $radi i $longitud són privats
	# Només és pot accedir al seu contingut des dins
	# de l'objecte però no des de fora i NO es poden transmetre
	# per herència.		
	private $radi;
	private $longitud;

	public function assigna_radi($r)
	{
		$this->radi = $r;
	}

	public function assigna_longitud($l)
	{
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

$cil = new cilindre();
$cil->assigna_radi(10); // Si utilitzem $cil -> $radi = 10 el script no funciona perquè l'artribut és privat
$cil->assigna_longitud(5); // Si utilitzem $cil -> $longitud = 5 el script no funciona perquè l'artribut és privat
echo "El volumen del cilindre és " . number_format($cil->volum(), 2) . " metres cúbics<br>";
