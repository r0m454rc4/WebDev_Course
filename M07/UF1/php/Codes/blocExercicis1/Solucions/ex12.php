</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays - 4</title>
</head>  
<body>  
<?php
	// PRIMERA PART DE LA PRÀCTICA 19
	$capitals=array("Barcelona","Madrid","Paris","Londres","Washington","Roma","Tokyo","El Caire",
	"Canberra","Buenos Aires");
	echo "<table border=\"1\">";
	echo "<tr align=center><td colspan=".count($capitals)."><b>LLISTA DE CAPITALS INICIALS</b></td><tr>";
	echo "<tr>";
	foreach ($capitals as $capital) {
		echo "<td>".$capital."</td>";
	}
	echo "</tr>";
	echo "</table>";
	echo "Número de capitals introduides inicialment a la taula: ".count($capitals)."</br><br>";
	// SEGONA PART DE LA PRÀCTICA 19
	array_push($capitals, "Moscou", "Beijing");
	echo "<table border=\"1\">";
	echo "<tr align=center><td colspan=".sizeof($capitals)."><b>LLISTA DE CAPITALS FINALS</b></td><tr>";
	echo "<tr>";
	foreach ($capitals as $capital) {
		echo "<td>".$capital."</td>";
	}
	echo "</tr>";
	echo "</table>";
	echo "Número de capitals introduides finalment a la taula: ".sizeof($capitals)."</br><br>";
	// PART DE LA PRÂCTICA 20
	$capital_extreta=array_pop($capitals);
	echo "<table border=\"1\">";
	echo "<tr align=center><td colspan=".sizeof($capitals)."><b>LLISTA DE CAPITALS FINALS MODIFICADA</b></td><tr>";
	echo "<tr>";
	foreach ($capitals as $capital) {
		echo "<td>".$capital."</td>";
	}
	echo "</tr>";
	echo "</table>";
	echo "Número de capitals introduides a la llista modificada: ".sizeof($capitals)."</br>";
	echo "Capital extreta de la llista: ".$capital_extreta."</br><br>";
?>
</body>
</html>
