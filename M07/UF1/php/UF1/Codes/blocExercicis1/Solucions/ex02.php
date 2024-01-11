
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title>Exercici 2</title>
	</head>  
	<body>  
		<?php
			$HORA_LIMIT="12:00:00";
			date_default_timezone_set('Europe/Andorra');
			$hora_actual=date("H:i:s");
			echo "Hora del fus horari local del servidor: $hora_actual<br>";
			if ($hora_actual <= $HORA_LIMIT) {
				echo "Encara queda molt dia per endavant<br>";
			}
			else {
				echo "Cada cop queda menys dia per endavant<br>";
			}
		?> 
	</body>
</html>
