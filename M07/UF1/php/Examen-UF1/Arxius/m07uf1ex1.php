<?php
echo "<b>Resultats:</b><br> ";

function fCalcularPreuEuros()
{
  $total_cpu = $_GET['cpu'];
  $preu_total_cpu = 0;

  $total_ram = $_GET['ram'];
  $preu_total_ram = 0;

  $total_disc = $_GET['disc'];
  $preu_total_disc = 0;

  $sistema_operatiu = $_GET['so'];
  $preu_so = 0;

  $ip_fixa = $_GET['ip'];
  $preu_ip = 0;

  for ($i = 0; $i < $total_cpu; $i++) {
    $preu_total_cpu += 2;
  }

  for ($i = 0; $i < $total_ram; $i++) {
    $preu_total_ram += 1;
  }

  for ($i = 0; $i < $total_disc; $i++) {
    $preu_total_disc += 0.15;
  }

  if ($sistema_operatiu == '1') {
    $preu_so = 1;
  } else {
    $preu_so = 5;
  }

  if ($ip_fixa == '0') {
    $preu_ip = 0;
  } else {
    $preu_ip = 2;
  }

  $preu_total_euros = $preu_total_cpu + $preu_total_ram + $preu_total_disc + $preu_so + $preu_ip;

  return $preu_total_euros;
}

function fCalcularPreuDolars()
{
  return fCalcularPreuEuros() * 1.09;
}

function fCalcularPreuLliures()
{
  return fCalcularPreuEuros() * 0.86;
}

function fMostrarResultat()
{
  $monedes = $_GET['moneda'];

  foreach ($monedes as $moneda) {
    switch ($moneda) {
      case "euros":
        echo "El preu mensual del VPS en EUROS és de: " . number_format(fCalcularPreuEuros(), 2) . " euros." . "<br>";
        break;
      case "dolars":
        echo "El preu mensual del VPS en DOLARS és de: " . number_format(fCalcularPreuDolars(), 2)  . " dolars." . "<br>";
        break;
      case "lliures":
        echo "El preu mensual del VPS en LLIURES és de: " . number_format(fCalcularPreuLliures(), 2)  . " lliures." . "<br>";
        break;
    }
  }
}

fMostrarResultat();
?>
<html>

<head>
  <title>m07uf1ex1</title>
</head>

<body>
  <form action="m07uf1ex1.html">
    <br>
    <input type="submit" value="Torna a introduïr les dades." />
  </form>
</body>

</html>