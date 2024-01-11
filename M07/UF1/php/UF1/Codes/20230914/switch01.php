<html>

<head>
	<title>PROVA DE PHP AMB L'ESTRUCTURA DE CONTROL SWITCH I DADES DE FORMULARI</title>
</head>

<body>
	<b><u>INICI DE LA PROVA DE ESTRUCTURA DE CONTROL SWITCH I DADES DE FORMULARI</u></b><br>

	<?php
	if ($_GET["aliment"]) {  // If I recieve the click of the input that has "aliment" as name.
		$menjar = strtoupper($_GET["aliment"]);  // I convert to upper case.

		switch ($menjar) {
			case "POMA":
				echo "Has escollit una fruita<br>";
				echo "Preu: 3€<br>";
				break;

			case "ENCIAM":
				echo "Has escollit un vegetal<br>";
				echo "Preu: 2€<br>";
				break;

			case "COSTELLES":
				echo "Has escollit carn<br>";
				echo "Preu: 8€<br>";
				break;

			case "RAP":
				echo "Has escollit peix<br>";
				echo "Preu: 15€<br>";
				break;

			default:
				echo "No has escollit un dels menjars indicats<br>";
		}
	}
	?>
	<b>FINAL DE LA PROVA DE L'ESTRUCTURA DE CONTROL SWITCH</b>
</body>

</html>