
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title>Exercici 3</title>
	</head>  
	<body>  
		<?php
			$HORA_LIMIT_01="15:00:00";
			$HORA_LIMIT_02="21:00:00";
			date_default_timezone_set('Europe/Andorra');
			$hora_actual=date("H:i:s");
			echo "Hora del fus horari local del servidor: $hora_actual<br>";
			if ($hora_actual < $HORA_LIMIT_01) {
				echo "Encara no és hora d'estar a classe<br>";
			}
			elseif (($hora_actual >= $HORA_LIMIT_01) and ($hora_actual <= $HORA_LIMIT_02)) {
				echo "Hauries d'estar a classe<br>"; 
			}
			else {
				echo "És hora d'estar sopant, dormint o altres opcions<br>";
			}
		?> 
	</body>
</html>
