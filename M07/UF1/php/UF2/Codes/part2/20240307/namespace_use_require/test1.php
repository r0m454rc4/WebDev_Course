<!DOCTYPE html>
<html>
<body>
<?php
	# require vs include
	#The only difference is — the include() statement will only generate a PHP warning but allow script execution to continue if the file
	#to be included can't be found, whereas the require() statement will generate a fatal error and stops the script execution.
	#
	#It is recommended to use the require() statement if you're including the library files or files containing the functions and configuration
	#variables that are essential for running your application, such as database configuration file.
	#
	require 'test/test00.php';
	require 'test/test01.php';
	#
	# CREACIÓ D'ALIAS AMB L'ORDRE use
	#
	use Tables01\Table as Taula; # Taula serà un alias de Tables01\Table
	use Tables02\Table as Tabla; # Tabla serà un alias de Tables02\Table
	use Tables00\Table; # Equivalent a use Tables00\Table as Table; ==> Table serà un alias de Tables00\Table
	#
	$table = new Table(); # LA CLASSE Table ÉS REALMENT Tables00\Table
	$table->title = "My table";
	$table->numRows = 5;
	$table->message();
	$taula = new Taula(); # LA CLASSE Taula ÉS REALMENT Tables01\Table
	$taula->titol = "La meva taula";
	$taula->numFiles = 4;
	$taula->missatge();
	$tabla = new Tabla(); # LA CLASSE Tabla ÉS REALMENT Tables02\Table
	$tabla->titulo = "Mi tabla";
	$tabla->numFilas = 3;
	$tabla->mensaje();
?>
</body>
</html> 
