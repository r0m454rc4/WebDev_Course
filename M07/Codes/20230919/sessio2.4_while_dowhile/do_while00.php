<html>
<head>
	<title>PROVA DE PHP AMB L'ESTRUCTURA DE CONTROL DO..WHILE I FORMULARI.</title>
</head>
	<body>
		<b><u>INICI DE LA PROVA DE ESTRUCTURA DE CONTROL DO..WHILE I FORMULARI.</u></b><br>
		<?php
			if ($_GET["vinic"] && $_GET["vfin"]) {
				$x = $_GET["vinic"];
				do {
					echo "El valor actual de ".'$x'." és: "."$x<br>\n"; 
					$x++;
				} while ( $x <= $_GET["vfin"]);
			}
		?>
		<b>FINAL DE LA PROVA DE L'ESTRUCTURA DE CONTROL DO..WHILE</b>
	</body>
</html>
