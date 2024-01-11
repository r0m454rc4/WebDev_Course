<html>
<head>
	<title>PROVA DE PHP AMB L'ESTRUCTURA DE CONTROL FOR I FORMULARI. DIFERÈNCIA ENTRE "$x" I '$x'</title>
</head>
	<body>
		<b><u>INICI DE LA PROVA DE ESTRUCTURA DE CONTROL FOR I FORMULARI. "$x" vs '$x'</u></b><br>
		<?php
			if ($_GET["vinic"] && $_GET["vfin"]) {  // If both are true.
				// $x = $_GET["vinic"];
				for ($x = $_GET["vinic"]; $x <= $_GET["vfin"]; $x++) {
					echo "El valor actual de ".'$x'." és: "."$x<br>\n"; # "$x" vs '$x', with $x I access the content of the variable.
				}
			}
		?>
		<b>FINAL DE LA PROVA DE L'ESTRUCTURA DE FOR</b>
	</body>
</html>
