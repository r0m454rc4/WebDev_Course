<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Botiga: Enregistrament de la comanda</title>
</head>

<body>
	<?php
	if (isset($_POST['comprova'])) {
		#obrim fitxer
		$fp = fopen("comandes/comandes.txt", "a") or die("No s'ha pogut obrir el fitxer de comandes");
		#creació de la cadena amb les dades de la comanda
		$comanda = $_COOKIE['client'] . ":" . $_COOKIE['producte'] . ":" . $_COOKIE['quantitat'];
		$hash_comanda = md5($comanda);
		date_default_timezone_set('Europe/Andorra');
		$data_hora = date('d/m/Y h:i:s');
		$comanda_final = $comanda . ":" . $hash_comanda . ":" . $data_hora . "\n";
		#afegim comanda al fitxer de comandes
		fwrite($fp, $comanda_final) or die("No s'ha pogut afegir la comanda");
		#mostrem la comanda
		echo "S'ha enregistrat la comanda amb el codi: " . $hash_comanda . "<br>";
		echo "Data i hora de l'enregistrament de la comanda: " . $data_hora . "<br>";
		echo "Nom del client: " . $_COOKIE['client'] . "<br>";
		echo "Producte: " . $_COOKIE['producte'] . "<br>";
		echo "Quantitat: " . $_COOKIE['quantitat'] . "<br>";
		# tanquem fitxer				
		fclose($fp);
		#esborrem cookies
		setcookie("client", "", time() - 3600, "/botiga/");
		setcookie("producte", "", time() - 3600, "/botiga/");
		setcookie("quantitat", "", time() - 3600, "/botiga/");
	}
	?>
	<p>
		<a href="index.html">Torna a la pàgina inicial</a>
	</p>
</body>

</html>