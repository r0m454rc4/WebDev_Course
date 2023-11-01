<?php
# Definició bàsica de classe i instanciació d'objecte. 
# Assignant valor a atributs a través dels mètodes
class cilindre
{
	public $radi;
	public $longitud;

	public function assigna_radi($r)
	{
		$this->radi = $r;
	}

	public function assigna_longitud($l)
	{
		$this->longitud = $l;
	}

	public function volum()
	{
		return M_PI * pow($this->radi, 2) * $this->longitud;
	}
}

$cil = new cilindre();
$cil->assigna_radi(10);
$cil->assigna_longitud(5);
echo "El volumen del cilindre es " . number_format($cil->volum(), 2) . " metres cúbics<br>";
