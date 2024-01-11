<?php
#Herència. Treballant amb modificadors d'accés protected
class cilindre
{
	# Els atributs $radi i $longitud són protegits
	# Només és pot accedir al seu contingut des dins
	# de l'objecte però no des de fora.
	# Els atributs protegits SÍ es poden transmetre per herència.	
	protected $radi;
	protected $long;
	#Aquest atribut no està disponible per herència
	private $enable = 'y';

	public function __construct($r, $l)
	{
		$this->radi = $r;
		$this->long = $l;
	}

	public function volum()
	{
		if ($this->enable == 'y') return M_PI * $this->radi ** 2 * $this->long;
	}
}

# -----------------------Herència---------------------------------
# La classe cost és una classe derivada de la classe base cilindre
# La classe cilindre és la classe Pare o ascendent
# La classe cost és una classe filla o descendent.
# La classe filla cost hereta de la classe pare cilindre:
#	a) Els atributs public i protected de la classe pare
#   b) Els mètodes públics i protected de la clase pare
# Les classes filles poden sobreescriure mètodes heretats de la classe pare com per exemple el constructor
class cost extends cilindre
{

	private $costpercm3;

	# El mètode __construct de la classe cost sobreescriu
	# el mètode __construct heretat de la classe pare.		
	public function __construct($r, $l, $cpercm3)
	{
		$this->radi = $r; # Podem accedir a radi per herència
		$this->long = $l; # Podem accedir a long per herència
		$this->costpercm3 = $cpercm3;
	}

	public function costfinal()
	{
		return $this->costpercm3 * $this->volum();
	}
}
if ((isset($_GET['radi'])) && (isset($_GET['long'])) && (isset($_GET['preu']))) {
	# $cost_cil sobreescriu (overriding) el mètode constructor.
	$cost_cil = new cost((float)$_GET['radi'], (float)$_GET['long'], (float)$_GET['preu']);
	# $cost_cil hereta el mètode volum
	echo "El volum del cilindre és " . number_format($cost_cil->volum(), 2) . " centimetres cúbics<br>";
	# $cost_cil hereta té un mètode propi de nom cost_final
	echo "El cost de fabricació és " . number_format($cost_cil->costfinal(), 2) . " euros<br>";
	#
	#Proves que donen errors perquè són atributs protegits o privats:
	#echo $cost_cil->radi."<br>";
	#echo $cost_cil->costperm3."<br>";
	#echo $cost_cil->enable."<br>";
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>PHP OOP</title>
	<link rel="stylesheet" href="agenda.css">
</head>

<body>
	<h3><b>Treballant amb herència. Treballant amb atributs i mètodes protegits</b></h3>
	<form action="objectes05.php" method="GET">
		Indica el radi en centímetres: <input type="text" name="radi"><br>
		Indica la longitud en centímetres: <input type="text" name="long"><br>
		Indica el preu del material en Euros per centímetre cúbic: <input type="text" name="preu"><br>
		<input type="submit" />
	</form>
</body>

</html>