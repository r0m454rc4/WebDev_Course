</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>arrays associatius - II</title>
</head>

<body>
	<?php

	//Definició de l'array
	$matricula = array("9001" => "Pere Pons", "19021" => "Joan López", "9021" => "Anna Puig");
	//Accedint a totes les posicions de l'array i mostrant claus i valors
	foreach ($matricula as $clau => $valor) {
		echo "L'alumne amb la matrícula $clau és $valor</br>";
	}
	?>
</body>

</html>