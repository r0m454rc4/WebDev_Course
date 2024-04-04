<?php
require 'vendor/autoload.php';
session_start(); // Inici de sessió

use Laminas\Ldap\Ldap;

if (!isset($_SESSION['adm'])) {
  header("Location: ./index.php");
  exit;
}

ini_set('display_errors', 0);
if ($_GET['usr'] && $_GET['ou']) {
  $domini = 'dc=fjeclot,dc=net';
  $opcions = [
    'host' => 'zend-rosaca.fjeclot.net',
    'username' => "cn=admin,$domini",
    'password' => 'Holabuen0sdias#',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
  ];
  $ldap = new Ldap($opcions);
  $ldap->bind();
  $entrada = 'uid=' . $_GET['usr'] . ',ou=' . $_GET['ou'] . ',dc=fjeclot,dc=net';
  $usuari = $ldap->getEntry($entrada);
  echo "<b><u>" . $usuari["dn"] . "</b></u><br>";
  foreach ($usuari as $atribut => $dada) {
    if ($atribut != "dn") echo $atribut . ": " . $dada[0] . '<br>';
  }
}
?>

<html>

<head>
  <title>
    MOSTRANT DADES D'USUARIS DE LA BASE DE DADES LDAP
  </title>
  <link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>
  <h2>Formulari de selecció d'usuari</h2>
  <form action="https://zend-rosaca.fjeclot.net/projFinal/consulta.php" method="GET">
    Unitat organitzativa: <input type="text" name="ou"><br>
    Usuari: <input type="text" name="usr"><br>
    <input type="submit" value="Consultar" />
    <input type="reset" value="Netejar" />
  </form>
  <a href="https://zend-rosaca.fjeclot.net/projFinal/menu.php">Torna al menú</a>
</body>

</html>