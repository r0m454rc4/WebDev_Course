<html>

<head>
  <style>
    table,
    td {
      border: solid 2px;
      padding-left: 4px;
    }

    td {
      border: solid 1px;
    }

    td#llista {
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php
  $capitals = array("Barcelona", "Madrid", "Paris", "Londres", "Washington", "Roma", "Tokyo", "El Caire", "Canberra", "Buenos Aires");
  $tamanyLlista = sizeof($capitals);

  echo "<table>";
  echo "<tr>";
  echo "<td id='llista' colspan='10'>" . "Llista de capitals inicials" . "</td>";
  echo "</tr>" . "<br>";

  echo "<tr>";
  foreach ($capitals as $capital) {
    echo "<td>" . $capital . "</td>";
  }
  echo "</tr>";
  echo "</table>";

  echo "Número de capitals introduïdes inicialment a la taula: $tamanyLlista" . "<br>";

  echo "<table>";
  echo "<tr>";
  echo "<td id='llista' colspan='12'>" . "Llista de capitals finals" . "</td>";
  echo "</tr>" . "<br>";

  array_push($capitals, "Moscou", "Beijing");
  $tamanyLlista = sizeof($capitals);
  
  echo "<tr>";
  foreach ($capitals as $capital) {
    echo "<td>" . $capital . "</td>";
  }
  echo "</tr>";
  echo "</table>";

  echo "Número de capitals introduïdes finalment a la taula: $tamanyLlista" . "<br>";
  ?>
</body>

</html>