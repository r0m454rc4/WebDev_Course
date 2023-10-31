<html>
<header>
  <style>
    table,
    td,
    th {
      border: solid 1px;
      text-align: center;
    }

    td {
      padding: 5px;
    }
  </style>
</header>

<body>
  <?php
  $cognoms = array("Llopis", "García", "Peris", "Gomis", "Ramírez", "García", "Adams", "Ramírez", "García");
  $frequencia = array_count_values(array: $cognoms);
  arsort($frequencia);

  echo "<table>";
  echo "<th>COGNOM</th>";
  echo "<th>FREQ.</th>";

  foreach ($frequencia as $cogn => $quantitat) {
    echo "<tr>";
    echo "<td>" . $cogn . "</td>";
    echo "<td>" . $quantitat . "</td>";
    echo "</tr>";
  }
  ?>
</body>

</html>