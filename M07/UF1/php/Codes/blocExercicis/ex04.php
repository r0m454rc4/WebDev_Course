<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EX04</title>
</head>

<body>
  <?php
  date_default_timezone_set('Europe/Madrid');

  $diaSetmana = date("l");

  switch ($diaSetmana) {
    case 'Monday':
      echo 'Examen de HTTP';
      break;
    case 'Tuesday':
      echo 'Examen de Git';
      break;
    case 'Wednesday':
      echo 'Examen de PHP';
      break;
    case 'Thursday':
      echo 'Examen de Javascript';
      break;
    case 'Friday':
      echo 'Examen de Java';
      break;
    default:
      echo 'Avui no hi ha examen';
      break;
  }
  ?>
</body>

</html>