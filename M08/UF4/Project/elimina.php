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
# Entrada a esborrar: usuari 3 creat amb el projecte2
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
# Esborrant l'entrada
#
$ldap = new Ldap($opcions);
$ldap->bind();
try {
  $ldap->delete($dn);
  echo "<b>Entrada esborrada</b><br>";
  echo '<a href="https://zend-rosaca.fjeclot.net/projFinal/menu.php">Torna al menú</a>';
} catch (Exception $e) {
  echo "<b>Aquesta entrada no existeix</b><br>";
  echo '<a href="https://zend-rosaca.fjeclot.net/projFinal/menu.php">Torna al menú</a>';
}
