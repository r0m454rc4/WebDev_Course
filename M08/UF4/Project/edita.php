<?php
require 'vendor/autoload.php';
session_start(); // Inici de sessió

use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

if (!isset($_SESSION['adm'])) {
  header("Location: ./index.php");
  exit;
}

ini_set('display_errors', 0);
#
# Atribut a modificar --> Número d'idenficador d'usuari
#
$atribut = $_POST['radioValue']; # El número identificador d'usuar té el nom d'atribut uidNumber
$nou_contingut = $_POST['nouContingut'];
#
# Entrada a modificar
#
$uid = $_POST['uid'];
$unorg = $_POST['unorg'];
$dn = 'uid=' . $uid . ',ou=' . $unorg . ',dc=fjeclot,dc=net';
#
#Opcions de la connexió al servidor i base de dades LDAP
$opcions = [
  'host' => 'zend-rosaca.fjeclot.net',
  'username' => 'cn=admin,dc=fjeclot,dc=net',
  'password' => 'Holabuen0sdias#',
  'bindRequiresDn' => true,
  'accountDomainName' => 'fjeclot.net',
  'baseDn' => 'dc=fjeclot,dc=net',
];
#
# Modificant l'entrada
#
$ldap = new Ldap($opcions);
$ldap->bind();
$entrada = $ldap->getEntry($dn);
if ($entrada) {
  Attribute::setAttribute($entrada, $atribut, $nou_contingut);
  $ldap->update($dn, $entrada);
  echo "Atribut modificat";
  echo '<a href="https://zend-rosaca.fjeclot.net/projFinal/menu.php">Torna al menú</a>';
} else {
  echo "<b>Aquesta entrada no existeix</b><br><br>";
  echo '<a href="https://zend-rosaca.fjeclot.net/projFinal/menu.php">Torna al menú</a>';
}
