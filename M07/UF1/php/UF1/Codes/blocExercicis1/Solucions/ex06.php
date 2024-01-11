</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>ex06.php</title>
</head>  
<body>  
<?php
	echo "<table border=\"1\">";
	echo "<td><b>MARCA</b></td><td><b>CODI</b></td>";
	$llista=array("DELL" => 876, "HP" => 990, "ASUS" => 1002, "TOSHIBA" => 1028,"ACER" => 1056);
	foreach ($llista as $marca => $codi) {
		echo "<tr>";
		echo "<td>$marca</td><td>$codi</td>";
		echo "</tr>";
	}
	echo "</table>";
?> 
</body>
</html>
