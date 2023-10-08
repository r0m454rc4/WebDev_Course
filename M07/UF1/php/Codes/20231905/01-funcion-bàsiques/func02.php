</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions que retornen un string</title>
</head>

<body>
	<?php
	function addStr($st1, $st2)
	{
		$st = $st1 . " " . $st2;
		return $st;
	}
	echo "RETORNANT UN STRING<br>";
	$str1 = "Hola";
	$str2 = "món";
	$res = addStr($str1, $str2);
	echo $res . "<br>";
	# NOTA: També haguessim pogut executar directment --> echo addStr($st1,$st2)."<br>";
	?>
</body>

</html>