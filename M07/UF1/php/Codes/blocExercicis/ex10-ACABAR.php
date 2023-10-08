<html>

<head>
  <style>
    table,
    td {
      border-collapse: collapse;
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
  echo "Llista 1 = Llista original sense ordre" . "<br>";
  echo "Llista 2 = Llista original en ordre alfabètic" . "<br>";
  echo "Llista 3 = Llista original en ordre alfabètic invers" . "<br>";

  $llista = array(array("Nova York", "Londres", "Paris", "Roma", "Barcelona", "Los Angeles", "Tokyo", "Amsterdam", "Manchester", "Singapur", "Brasilia"), array(), array());

  echo "<table>";
  echo "<tr>";
  echo "<td id='llista'>" . "Llista 1" . "</td>";
  echo "<td id='llista'>" . "Llista 2" . "</td>";
  echo "<td id='llista'>" . "Llista 3" . "</td>";
  echo "</tr>" . "<br>";

  $llista[1] = $llista[0];  // Here I send the information from the fisrt array to the second one.
  sort($llista[1]);  // I order alphabetically.

  $llista[2] = $llista[1];
  $arrayReversa = array_reverse($llista[2]);

  echo "<tr>";
  foreach ($llista[0] as $list) {
    echo "<td>" . $list . "</td>";
  }
  echo "</tr>";

  echo "<tr>";
  foreach ($llista[1] as $list) {
    echo "<td>" . $list . "</td>";
  }
  echo "</tr>";

  echo "<tr>";
  foreach ($arrayReversa as $list) {
    echo "<td>" . $list . "</td>";
  }
  echo "</tr>";

  echo "</table>";
  ?>
</body>

</html>