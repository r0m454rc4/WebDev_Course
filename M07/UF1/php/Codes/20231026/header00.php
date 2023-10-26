<?php
$nom_cookie = "preu";
$valor_cookie = "150€";
$temps_expiracio = 3600;
$llengua = "es-ca";
$nova_url = "header00.html";
header("Set-cookie: $nom_cookie=$valor_cookie; Max-Age=$temps_expiracio");
header("Content-Language: $llengua");
header("Refresh: 5; url=$nova_url");
// Refresh no forma part del protocol HTTP però ha esdevingut un
// estàndard de facto que funciona a la majoria de navegadors
header("Connection: close");
echo "Enviant cookie i redirigint cap a la nova localització en 5 segons<br>";
