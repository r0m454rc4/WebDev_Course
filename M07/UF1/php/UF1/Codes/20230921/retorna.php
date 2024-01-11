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
		<!--<form action="http://localhost/retorna.html">-->
			<!--<input type="submit" value="Torna a la pàgina anterior" />-->
			<button onclick="location.href='http://localhost:8080/retorna.html'" type="button">Retorna</button>
		<!--</form>-->
	</body>
</html>
