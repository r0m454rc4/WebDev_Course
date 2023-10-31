</html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions -I</title>
</head>  
<body>  
<?php
	function suma($v1,$v2) {
		$res=$v1+$v2;
		return $res;
	}
	function resta($v1,$v2) {
		$res=$v1-$v2;
		return $res;
	}
	function multiplicacio($v1,$v2) {
		$res=$v1*$v2;
		return $res;
	}
	function divisio($v1,$v2) {
		$res=$v1/$v2;
		return $res;
	}
	$operacions=array("suma","resta","multiplicacio","divisio");
	$v1=3.27;
	$v2=2.65;
	foreach ($operacions as $operacio) {
			echo "La $operacio de $v1 i $v2 és ".number_format($operacio($v1,$v2),2)."</br>";
	}
?>
</body>
</html>
