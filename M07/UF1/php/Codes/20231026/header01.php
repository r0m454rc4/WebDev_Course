<?php
	$nom_cookie="preu";
	$valor_cookie="150€";
	$temps_expiracio=3600; 
	$llengua="es-ca"; 
	$nova_url="header00.html";
	$missatge="";
	for ($i=0; $i<2000; $i++){
		$missatge = $missatge.$i;
	}
	echo "Mostrant $missatge<br>";
	echo strlen($missatge);
	echo "Enviant cookie i redirigint cap a la nova localització<br>";
	// Si enviem moltes dades els headers no es poden enviar. En aquest cas un string de 6890 bytes 
	// En funció de la configuració del servidor, simplement enviant 1 byte ja no podem enviar els headers
	// Normalment php i apache2 estan configurats per poder enviar headers si les dades no superem els 4096 bytes de dades
	header("Set-cookie: $nom_cookie=$valor_cookie; Max-Age=$temps_expiracio"); 
	header("Content-Language: $llengua");
	header("Refresh:5; url=$nova_url");
	header("Connection: close");
