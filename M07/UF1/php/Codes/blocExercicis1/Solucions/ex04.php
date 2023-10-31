</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Exercici 4</title>
</head>  
<body>  
<?php
	date_default_timezone_set('Europe/Andorra');
	$dia=date("l");
	switch ($dia) {
		case "Monday": 
			echo "Examen de HTTP</br>";
			break;
		case "Tuesday":
			echo "Examen de Git</br>";
			break;
		case "Wednesday":
			echo "Examen de PHP</br>";
			break;
		case "Thursday":
			echo "Examen de JavaScript</br>";
			break;
		case "Friday": 
			echo "Examen de SQL</br>";
			break;
		default: echo "Avui no hi ha examen</br>";
	}
?> 
</body>
</html>
