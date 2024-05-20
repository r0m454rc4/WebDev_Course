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
	# CREACIÓ I UTILITZACIÓ D'UN OBJECTE AMB LA CLASSE Table DEL NAMESPACE Tables00
	$table = new Tables00\Table();
	$table->title = "My table";
	$table->numRows = 5;
	$table->message();
	# CREACIÓ I UTILITZACIÓ D'UN OBJECTE AMB LA CLASSE Table DEL NAMESPACE Tables01
	$taula = new Tables01\Table();
	$taula->titol = "La meva taula";
	$taula->numFiles = 4;
	$taula->missatge();
	# CREACIÓ I UTILITZACIÓ D'UN OBJECTE AMB LA CLASSE Table DEL NAMESPACE Tables02
	$tabla = new Tables02\Table();
	$tabla->titulo = "Mi tabla";
	$tabla->numFilas = 3;
	$tabla->mensaje();
?>
</body>
</html> 
