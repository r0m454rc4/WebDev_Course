<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EX03</title>
</head>

<body>
  <?php
  date_default_timezone_set('Europe/Madrid');

  $horaServidor = date("H:i:s");
  $horaClient = date("H:i:s");
  $horaClient = (int)$horaClient;

  echo 'Hora del fus horari local del servidor: ' . $horaServidor . '<br>';

  if ($horaClient < 15) {
    echo "Encara no és hora d'estar a classe.";
  } elseif ($horaClient >= 15 && $horaClient <= 21) {
    echo "Hauries d'estar a classe";
  } else {
    echo "Es hora d'estar sopant, dormint o altres opcions";
  }
  ?>
</body>

</html>