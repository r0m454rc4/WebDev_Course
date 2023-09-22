<?php
  if( $_GET["nom"] && $_GET["edat"] )
  {
     echo "Benvingut ". $_GET['nom']. "</br>";
     echo "Tens ". $_GET['edat']. " anys";
     exit(0);
  }
?>

