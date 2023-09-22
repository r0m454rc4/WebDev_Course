<?php
   if( ($_GET["nom"]=="Joan") && ($_GET["ctsnya"]=="qwerty2015") ) {
     echo "Benvingut ". $_GET['nom']. "</br>";
	 if( $_GET["missatge"]) {
		echo "El teu missatge per ".$_GET["receptor"]." és: <br>";
		echo "<textarea rows=10 cols=70>".$_GET["missatge"]."</textarea><br>"; 
		exit(0);
	 }
	 else {
		 echo "No has escrit cap missatge<br>";
		 exit(1);
	 }	
  }	
  else {
	  echo "Usuari o contrasenya incorrecta<br>";
	  exit(2);
  }
