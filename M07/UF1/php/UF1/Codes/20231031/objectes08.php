<?php
	# Treballant amb constants
	class llista_constants {
		const PI = 3.1416;
		const e = 2.718;
		const enable="y";
		
		function mostra_constants(){
			echo self::PI."<br>";
			echo self::e."<br>";
			echo self::enable."<br>";# Per cridar a una constant des de dins de la classe s'utilitza 
		}							 # self:: davant del nom de la constant. No s'utilitza $this ->
	}	 							 # perquè no és una variable
	#
	# Per accedir a una constant o mètode estàtic des de fora i 
	# sense instanciar una classe s'utilitza el nom de la classe seguit
	# de :: i després el nom de la constant.
	echo "Accedint per mitjà del nom de la classe<btr>";
	echo llista_constants::PI."<br>"; # NOAT: Una classe no és un objecte o sigui que no té $ al davant
	echo llista_constants::e."<br>";
	echo llista_constants::enable."<br><br>";
	#
	# També es pot accedir instanciant una ReflectionClass, que és un classe de PHP
	# que retorna informació sobre una classe.
	# https://www.php.net/manual/es/class.reflectionclass.php 
	echo "Accedint instanciant una ReflectionClass<br>";
	$lc1 = new ReflectionClass(llista_constants);
	echo $lc1 -> getConstant(PI)."<br>";
	echo $lc1 -> getConstant(e)."<br>";
	echo $lc1 -> getConstant(enable)."<br><br>";
	#
	# Es pot accedir amb un mètode de la classe
	echo "Accedint instanciant una classe i amb un mètode de la classe<br>";
	$lc2 = new llista_constants();
	echo $lc2 -> mostra_constants();
?>
	
	
