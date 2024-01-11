</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>arrays associatius - III</title>
</head>

<body>
	<?php
	//Definició de l'array
	$matricula = array("9001" => "Pere Pons", "19021" => "Joan López", "9021" => "Anna Puig");
	//Accedint a totes les posicions de l'array i mostrant només els valor
	foreach ($matricula as $valor) {
		echo "$valor</br>";
	}
	?>
</body>

</html>