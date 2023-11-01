<?php
#Definició bàsica de classe i instanciació d'objecte. Atributs.
class cilindre
{

	# Atribut, propietat, variable membre, variable instància, camps membre
	# La paraula clau public significa que l'atribut és accessible des de
	# fora de l'objecte.
	public $radi;
	public $longitud;
}

# Instanciació de l'objecte $cil
$cil = new cilindre();
#Assignació d'un valor als atributs de l'objecte $cil
$cil->radi = 10;
$cil->longitud = 5;
# Utilizació del valor assignat als atributs
echo "El radi del cilindre és " . $cil->radi . " metres<br>";
echo "La longitude del cilindre és " . $cil->longitud . " metres<br>";
