<?php
	if( $_POST["metode"] == "PUT" ){
		echo "El mètode enviat és un PUT<br>";
		echo "El nou nom és: ".$_POST["nom"]."<br>";
	}	
	else{
		echo "El mètode enviat és un DELETE<br>";
		echo "Esborrant: ".$_POST["nom"]."<br>";
	}
?>
