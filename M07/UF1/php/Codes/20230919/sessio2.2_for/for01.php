<html>
<head>
	<title>PROVA DE PHP AMB L'ESTRUCTURA DE CONTROL FOR I FORMULARI. INCREMENTS DIFERENTS A 1</title>
</head>
	<body>
		<b><u>INICI DE LA PROVA DE ESTRUCTURA DE CONTROL I FORMULARI. INCREMENTS DIFERENTS A 1</u></b><br>
		<?php
			if ($_GET["vinic"] && $_GET["vfin"]) {
				$x = $_GET["vinic"];
				for ($x = $_GET["vinic"]; $x <= $_GET["vfin"]; $x+=$_GET["incr"]) {  // I increment the amount of the value of "incr".
					echo "El valor actual de ".'$x'." és: "."$x<br>\n";  // The "." is to concatenate.
				}
			}
		?>
		<b>FINAL DE LA PROVA DE L'ESTRUCTURA DE CONTROL FOR</b>
	</body>
</html>
