<html>
	<head>
		<title>
			Mostra el resultat i retornant a la pàgina anterior
		</title>
	</head>
	<body>		
		<?php
		  if( $_GET["nom"] && $_GET["edat"] )
		  {
			 echo "Benvingut ". $_GET['nom']. "</br>";
			 echo "Tens ". $_GET['edat']. " anys<br>";			 
		  }
		?>
		<a href="http://localhost/retorna_link.html">Torna a la pàgina anterior</a>
		</form>
	</body>
</html>
