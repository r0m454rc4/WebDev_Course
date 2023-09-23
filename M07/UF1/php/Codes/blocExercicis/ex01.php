<html>

<body>
	<?php
	if (($_GET["usuari"] == "pepe") && ($_GET["passwd"] == "pepe")) {
		$opcions = $_GET['opc'];

		if (empty($opcions)) {
			echo "No has demanat visualitzar cap paràmetre." . "<br>";
		} else {
			echo "<b>Has demanat els següents paràmetres del servidor:</b> " . "</br>";
			foreach ($opcions as $opcio) {
				switch ($opcio) {
					case "vServerApache":
						echo "Versió del servidor:" . $_SERVER['SERVER_SOFTWARE'] . "<br>";
						break;  // In order to stop printing the other cases.
					case "vProtHTTP":
						echo "Versió del protocol HTTP: " . $_SERVER['SERVER_PROTOCOL'] . "<br>";
						break;
					case "portServer":
						echo "Port del servidor: " . $_SERVER['SERVER_PORT'] . "<br>";
						break;
					case "vPHP":
						echo "Versió del PHP: " . phpversion() . "<br>";
						break;
				}

				// if ($opcio) {
				// 	echo "$opcio" . "<br>";
				// }
			}
		}

		// if ($key == "versioServer") {
		// 	echo "Has seleccionat veure la versió del servidor." . "<br>";
		// } elseif ($key == "versioHTTP") {
		// 	echo "Has seleccionat veure la versió del HTTP." . "<br>";
		// } elseif ($key == "portServer") {
		// 	echo "Has seleccionat veure el port del servidor" . "<br>";
		// } elseif ($key == "versioPHP") {
		// 	echo "Has seleccionat veure la versió del PHP" . "<br>";
		// } else {
		// 	echo "No has demanat visualitzar cap paràmetre." . "<br>";
		// 	exit(1);
		// }
		// }

		// if ($_GET["versioServer"]) {
		// 	echo "Has seleccionat veure la versió del servidor.";
		// } elseif ($_GET["versioHTTP"]) {
		// 	echo "Has seleccionat veure la versió del HTTP.";
		// } elseif ($_GET["portServer"]) {
		// 	echo "Has seleccionat veure el port del servidor";
		// } elseif ($_GET["versioPHP"]) {
		// 	echo "Has seleccionat veure la versió del PHP";
		// } else {
		// 	echo "No has demanat visualitzar cap paràmetre.<br>";
		// 	exit(1);
		// }
	} else {
		echo "No tens permís per accedir a aquesta web." . "<br>";
	}
	?>

	<button onclick="location.href='http://localhost:8080/ex01.html'" type="button">Retorna</button>
</body>

</html>