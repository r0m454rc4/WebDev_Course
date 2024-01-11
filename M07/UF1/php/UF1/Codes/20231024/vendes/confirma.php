<?php
session_start();
// Recorda que has de crear el directori comanda dins de /var/www/html,
// que el propietari ha de ser www-data i el grup també www-data
$filename = "/home/vadimvolkov/DAW2/M07/UF1/php/Codes/20231024/vendes/comandes" . session_id() . ".txt";
$fitxer = fopen($filename, "w") or die("No s'ha pogut crear el fitxer");
$text = "Tipus de bombetes: " . $_SESSION['producte'] . "\n";
fwrite($fitxer, $text);
$text = "Quantitat: " . $_SESSION['quantitat'] . "\n";
fwrite($fitxer, $text) or die("No s'ha pogut enregistrar la venda");;
fclose($fitxer);
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Confirmació i sortida de la sessió</title>
</head>

<body>
	<?php
	echo "S'ha desat la comanda amb l'identificació: " . session_id() . "<br>";
	session_unset(); //Eliminant variables.
	$cookie_sessio = session_get_cookie_params(); //Neteja cookie
	setcookie("PHPSESSID", "", time() - 3600, $cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']); //Neteja cookie
	session_destroy(); //Destrucció de la sessió						
	?>
	<a href="http://localhost:8080/vendes/menu.php">Torna al menú principal</a><br>
</body>

</html>