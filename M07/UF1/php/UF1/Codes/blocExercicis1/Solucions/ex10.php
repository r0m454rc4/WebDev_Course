</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Arrays - 2</title>
</head>  
<body>  
<?php
	echo "<b>LLISTA 1 = LLISTA ORIGINAL SENSE ORDRE</b><br>";
	echo "<b>LLISTA 2 = LLISTA EN ORDRE ALFABÈTIC</b><br>";
	echo "<b>LLISTA 3 = LLISTA EN ORDRE ALFABÈTIC INVERS</b><br>";
	echo "<br>";
	echo "<table border=\"1\">";
	echo "<tr><td><b>LLISTA 1</b></td><td><b>LLISTA 2</b></td><td><b>LLISTA 3</b></td><tr>";
	$ciutats=array(array("Nova York","Londres","Paris","Roma","Barcelona","Los Angeles","Tokyo","Amsterdam",
	"Manchester","Singapur","Brasilia"),array(),array());
	$ciutats[1]=$ciutats[0];
	$ciutats[2]=$ciutats[0];
	sort($ciutats[1]);
	$ciutats[2]=array_reverse($ciutats[1]);
	$lin=count($ciutats[0]);
	for ($i=0;$i<$lin;$i++) {
		echo "<tr>";
		$col=count($ciutats);
		for ($j=0;$j<$col;$j++) {
			echo "<td>".$ciutats[$j][$i]."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
?> 
</body>
</html>
