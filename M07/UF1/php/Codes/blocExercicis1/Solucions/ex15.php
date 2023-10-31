<?php
	function comprova($mon,$capital,$pais) {
		$resultat=$mon[$capital][0];
		echo "<table border=\"1\">";
		echo "<tr><td><b>CAPITAL</b></td><td><b>PAIS</b></td><td><b>RESULTAT</b></td><tr>";
		if ($pais==$resultat) echo "<tr><td>$capital</td><td>$pais</td><td>Correcte!!!!</td>";
		else echo "<tr><td>$capital</td><td>$pais</td><td>Incorrecte!!!!</td>td>";
		echo "</table>";		
	}
	
	$capitals=array("Barcelona","Madrid","Paris","Londres","Washington","Roma","Tokyo","El Caire",
	"Canberra","Buenos Aires");
	$paisos_continents=array(
		array("Catalunya","Espai sideral"),
		array("Espanya","Europa"),
		array("França","Europa"),
		array("Regne Unit","Europa"),
		array("Estats Units","Amèrica"),
		array("Itàlia","Europa"),
		array("Japó","Àsia"),
		array("Egipte","Àfrica"),
		array("Austràlia","Oceania"),
		array("Argentina","Amèrica")
	);
	$mon=array_combine($capitals,$paisos_continents);
	$capital=$_GET["capital"];
	$pais=$_GET["pais"];
	comprova($mon,$capital,$pais);
?>
<html>
	<head>
		<title>RESULTAT</title>
	</head>
	<body>
		<form action="ex24.html">
			<input type="submit" value="Retorna"/>
		</form>
	</body>
</html>
