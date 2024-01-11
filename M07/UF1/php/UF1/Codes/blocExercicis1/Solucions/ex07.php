</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>ex07.php: freqüència i ordenació</title>
</head>  
<body>  
<?php
	echo "<table border=\"1\">";
	echo "<td><b>COGNOM</b></td><td><b>FREQ.</b></td>";
	$cognoms=array("Llopis", "García", "Peris", "Gomis", "Ramírez", "García", 
	"Adams", "Ramírez", "García");
	$freq=array_count_values($cognoms);
	arsort($freq);
	foreach ($freq as $cognom => $quantitat) {
		echo "<tr>";
		echo "<td>$cognom</td><td>$quantitat</td>";
		echo "</tr>";
	}
	echo "</table>";
?> 
</body>
</html>
