<html>
<head>
	<title>PROVA DE PHP AMB L'ESTRUCTURA DE CONTROL FOREACH TREBALLANT AMB ARRAYS INDEXATS</title>
</head>
	<body>
		<b><u>INICI DE LA PROVA DE ESTRUCTURA DE CONTROL FOREACH TREBALLANT AMB ARRAYS INDEXATS</u></b><br>
		<?php
			//DEFINICIÓ D'UN ARRAY INDEXAT
			$noms = array("Jordi", "Sergi", "Hèctor", "Carles", "Estela");
			//ACCÉS AL CONTINGUT D'UN ARRAY AMB FOREACH
			echo "<br>ATENCIÓ: foreach TREBALLA AMB ARRAYS!!!!!<br><br>";
			foreach ($noms as $nom){
				//Per cada iteració s'agafa el següent element de l'array i s'assigna a $nom
				//El foreach continua fins que s'arriba al darrer element de l'array (el darrer element està inclòs)
				echo "Nom d'usuari: $nom <br>\n";
			}
			echo "<br>";
		?>
		<b>FINAL DE LA PROVA DE L'ESTRUCTURA DE CONTROL FOREACH</b>
	</body>
</html>
