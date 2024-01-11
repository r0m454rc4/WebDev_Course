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

    td#capital,
    #pais,
    #continent {
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php
  $capitals = array("Barcelona", "Madrid", "Paris", "Londres", "Washington", "Roma", "Tokyo", "El Caire", "Canberra", "Buenos Aires");

  $paisos_continents = array(
    ["Catalunya", "Espai sideral"],
    ["Espanya", "Europa"],
    ["França", "Europa"],
    ["Regne Unit", "Europa"],
    ["Estats Units", "Amèrica"],
    ["Itàlia", "Europa"],
    ["Japó", "Àsia"],
    ["Egipte", "Àfrica"],
    ["Austràlia", "Oceania"],
    ["Argentina", "Amèrica"]
  );

  $mon = array_combine($capitals, $paisos_continents);

  echo "<table>";
  echo "<td id='capital'>" . "Capital" . "</td>";
  echo "<td id='pais'>" . "Pais" . "</td>";
  echo "<td id='continent'>" . "Continent" . "</td>";
  echo "</tr>";

  foreach ($mon as $capitals => $paisos_continents) {
    echo "<tr>";
    echo "<td>" . $capitals . "</td>";

    foreach ($paisos_continents as $pais) {
      echo "<td>" . $pais . "</td>";
    }

    echo "</tr>";
  }

  echo "</table>";
  ?>
</body>

</html>