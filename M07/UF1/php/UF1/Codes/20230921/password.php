<?php
  if( ($_GET["nom"]=="Joan") && ($_GET["ctsnya"]=="qwerty2015") ) {
     echo "Benvingut ". $_GET['nom']. "</br>";
     exit(0);
  }
  else {
	  echo "No tens permís per accedir a aquesta web<br>";
	  exit(1);
  }
?>

