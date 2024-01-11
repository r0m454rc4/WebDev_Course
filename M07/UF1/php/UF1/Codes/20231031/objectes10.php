<?php
#Treballant amb interfícies
#Nota 1: Les funcions de les interfícies han de ser públiques
#Nota 2: Dins d'una interfície no es desenvolupa la funció
#Nota 3: Interfícies poden ser desenvolupades per classes sense cap relació entre elles
#Nota 4: Les classes que implementen una interfície han de desenvolupar obligatòriament les funcions declarades a la interfície
#Nota 5: Una classe pot implementar més d'una interfície
#Nota 6: Útilitat --> Polimorfisme i herència múltiple

interface MitjansTransport
{
	public function QuantRodes();
	public function Tipus();
	public function Nom();
}

interface Fabricants
{
	public function fabricant();
	public function model();
}

class Avio implements MitjansTransport
{
	public function Tipus()
	{
		return "aeri";
	}
	public function QuantRodes()
	{
		return 14;
	}
	public function Nom()
	{
		return "avió";
	}
}

class Vaixell implements MitjansTransport
{
	public function Tipus()
	{
		return "marítim";
	}
	public function QuantRodes()
	{
		return 0;
	}
	public function Nom()
	{
		return "vaixell";
	}
	public function missatge()
	{
		return "Els mitjans de transport marítim no utilizen rodes";
	}
}

# Aquesta classe (Cotxer) implementa 2 interfícies
class Cotxe implements MitjansTransport, Fabricants
{
	public function Tipus()
	{
		return "terrestre";
	}
	public function QuantRodes()
	{
		return 4;
	}
	public function Nom()
	{
		return "cotxe";
	}
	public function fabricant()
	{
		return "BMW";
	}
	public function model()
	{
		return "M135i xDrive";
	}
}

$c = new Cotxe();
$a = new Avio();
$v = new Vaixell();
echo "El mitjà de transport " . $c->Nom() . " de la marca " . $c->fabricant() . " i model " . $c->model() . " té " . $c->QuantRodes() . " rodes i és " . $c->Tipus() . ".<br>";
echo "El mitjà de transport " . $a->Nom() . " té " . $a->QuantRodes() . " rodes i és " . $a->Tipus() . ".<br>";
echo "El mitjà de transport " . $v->Nom() . " té " . $v->QuantRodes() . " rodes i és " . $v->Tipus() . ". Nota: " . $v->missatge() . ".<br>";
