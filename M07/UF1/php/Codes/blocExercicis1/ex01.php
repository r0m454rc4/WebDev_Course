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
			}
		}
	} else {
		echo "No tens permís per accedir a aquesta web." . "<br>";
	}
	?>

	<button onclick="location.href='http://localhost:8080/ex01.html'" type="button">Retorna</button>
</body>

</html>