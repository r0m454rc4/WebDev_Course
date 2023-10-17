<?php
	# NOTA: Esborra la cookie "pagina_visitada" del domini localhost
	# per veure funcionar aquesta aplicació des de la primera visita 
	$nom_cookie = "pagina_visitada";
	$valor_cookie = 1;
	# Evitem que es toni a enviar un cop ja s'ha enviat una vegada
	# Així evitem que s'actualitzi l'hora d'expiració a cada visita
	if (!isset($_COOKIE[$nom_cookie])) {
		setcookie($nom_cookie, $valor_cookie,time() + (86400 * 30), "/");
	} 
?>
<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Creant i accedint a Cookies - II</title>
    </head>
	<body>
		CREANT I ACCEDINT A COOKIES - II<br>
		<?php
			if(!isset($_COOKIE[$nom_cookie])){
				echo "Hola. Aquesta és la teva primera visita<br>";
			}
			else {
				echo "Gràcies per tornar a visitar-nos<br>";
			} 
		?>
	</body>
</html> 
