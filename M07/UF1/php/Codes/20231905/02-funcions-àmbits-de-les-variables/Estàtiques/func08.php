</html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Funcions --> Variables locals estàtiques i no estàtiques. </title>
</head>

<body>
	<?php
	error_reporting(0); // Elimina informe d'errors

	function incrementaV01()
	{
		static $valor01 = 0; //Declaració i assignació de variable estàtica
		$valor01++;		   //La variable s'ha declarat localment però el	
		return $valor01;   //seu darrer valor es desa quan finalitza la funció 
		//i per tant les modificacions no es perden.
		//Per tant, cada cop que cridem a la funció $valor01 s'incrementa 	
	}

	function incrementaV02()
	{
		$valor02 = 0; //Declaració i assignació de variable no estàtica i local
		$valor02++; //Cada cop que cridem a la funció $valor02 torna a 0. 	
		return $valor02;
	}

	incrementaV01();
	incrementaV01();
	incrementaV01();
	echo 'El valor de $valor01 és ' . incrementaV01() . '<br>';
	incrementaV02();
	incrementaV02();
	incrementaV02();
	echo 'El valor de $valor02 és ' . incrementaV02() . '<br>';
	?>
</body>

</html>