</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<style type="text/css">
		td, th {width: 8em; border: 1px solid black; padding-left: 4px;}
		th {text-align:center;}
		table {border-collapse: collapse; border: 2px solid black;}
	</style>
	<title>Arrays - 1</title>
</head>  
<body>  
<?php
	echo "<table border=\"1\">";
	echo "<tr><td><b>CAPITAL</b></td><td><b>PAIS</b></td><td><b>CONTINENT</b></td><tr>";
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
	foreach ($mon as $capital => $pais_continent) {
		echo "<tr>";
		echo "<td>".$capital."</td><td>".$pais_continent[0]."</td><td>".$pais_continent[1]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
?>
</body>
</html>
