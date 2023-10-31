w</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions-II</title>
</head> 
<body>
<?php
	function ordena_array(&$dades_desordenades,$tipus_ordre) {
		if ($tipus_ordre==1) {
			sort($dades_desordenades);
		} else {
			rsort($dades_desordenades);
		}
	
	}
	function mostra_dades($dades_actuals,$tipus_mostra) {
		if ($tipus_mostra==0) {
			$missatge="ARRAY ORDENAT DE MAJOR A MENOR";
		}elseif ($tipus_mostra==1){
			$missatge="ARRAY ORDENAT DE MENOR A MAJOR";
		} else {
			$missatge="ESTAT INICIAL DE L'ARRAY";
		}
		echo "<table border=\"1\">";
		echo "<tr align=center><td colspan=".sizeof($dades_actuals)."><b>".$missatge."</b></td><tr>";
		echo "<tr>";
		foreach ($dades_actuals as $dada) {
			echo "<td>".$dada."</td>";
		}
		echo "</tr>";
		echo "</table>";
	}
	$dades=array(1,5,9,3,-1,4,0,-7,8,6);
	mostra_dades($dades,-1);
	ordena_array($dades,0);
	mostra_dades($dades,0);
	ordena_array($dades,1);
	mostra_dades($dades,1);
?> 
</body>
</html>
