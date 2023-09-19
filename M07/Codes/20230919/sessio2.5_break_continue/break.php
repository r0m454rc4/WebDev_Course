<html>
<head>
	<title>PROVA DE PHP AMB BREAK</title>
</head>
	<body>
		<b><u>INICI DE LA PROVA AMB BREAK</u></b><br>
		<?php
			//L'ordre break finalitza una estrucutura de control<br><br>";
			$llista = array("Carles"=>"M01", "Estela"=>"M02", "Hector"=>"M03", "Jordi"=>"M04", "Sergi"=>"M05"); 
			foreach ($llista as $clau => $dada){
				if ($clau == $_GET["professor"]) { 
					break; 
				}
				else echo "$clau: $dada<br>";
			}
			echo "<br>";
		?>
		<b>FINAL DE LA PROVA AMB BREAK</b>
	</body>
</html>
