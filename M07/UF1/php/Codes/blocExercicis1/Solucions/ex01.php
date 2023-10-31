<?php
	if( ($_GET["nom"]=="admin") && ($_GET["ctsnya"]=="fjeclot") ) {
		$llista_param=$_GET['serv'];
		if (empty($llista_param)) echo "No has demanat visualitzar cap paràmetre<br>";
		else {
			echo "<b>Has demanat els següents paràmetres del servidor:</b><br> ";
			foreach ($llista_param as $param) {
				switch ($param) {
					case "SERVER_SOFTWARE": echo "Versió del servidor Apache2: ".$_SERVER[$param]."<br>";break;
					case "SERVER_PROTOCOL": echo "Versió HTTP del servidor: ".$_SERVER[$param]."<br>";break;
					case "SERVER_PORT": echo "Port del servidor: ".$_SERVER[$param]."<br>";break;
					case "PHP":  echo "Versió de PHP: ".phpversion()."<br>";break;
				} 
			}		
		}
	}
	else echo "No tens permís per accedir a aquesta web<br>";
?>
<html>
	<head>
		<title>PARÀMETRES</title>
	</head>
	<body>
		<form action="ex01.html">
			<input type="submit" value="Retorna"/>
		</form>
	</body>
</html>
