<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EX02</title>
</head>

<body>
  <?php
  date_default_timezone_set('Europe/Madrid');

  $horaServidor = date("H:i:s");
  $horaClient = date("H:i:s");
  $horaClient = (int)$horaClient;

  echo 'Hora del fus horari local del servidor: ' . $horaServidor . '<br>';

  if ($horaClient >= 12) {
    echo "Cada cop queda menys dia per endavant";
  } else {
    echo "Encara queda molt dia per endavant";
  }
  ?>
</body>

</html>