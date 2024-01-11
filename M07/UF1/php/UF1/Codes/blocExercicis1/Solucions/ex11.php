</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays - 4</title>
</head>  
<body>  
<?php
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
	array_push($capitals, "Moscou", "Beijing");
	echo "<table border=\"1\">";
	echo "<tr align=center><td colspan=".sizeof($capitals)."><b>LLISTA DE CAPITALS FINALS</b></td><tr>";
	echo "<tr>";
	foreach ($capitals as $capital) {
		echo "<td>".$capital."</td>";
	}
	echo "</tr>";
	echo "</table>";
	echo "Número de capitals introduides finalment a la taula: ".sizeof($capitals)."</br>";
?>
</body>
</html>
