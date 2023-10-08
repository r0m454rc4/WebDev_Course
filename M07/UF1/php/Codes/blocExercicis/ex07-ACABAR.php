<html>
<header>
  <style>
    table,
    td {
      border: solid 1px;
      text-align: center;
    }

    td {
      padding: 5px;
    }

    td#cognom,
    #frequencia {
      font-weight: bold;
    }
  </style>
</header>

<body>
  <?php
  $cognoms = array("Llopis", "García", "Peris", "Gomis", "Ramírez", "García", "Adams", "Ramírez", "García");
  $frequencia = array_count_values(array: $cognoms);
  arsort($frequencia);

  echo "<table>";

  foreach ($frequencia as $freq) {
    echo "<tr>";
    // echo $cognom . "<br>";
    echo "<td>" . $freq . "</td>";
  }
  echo "</table>"

  ?>
</body>

</html>