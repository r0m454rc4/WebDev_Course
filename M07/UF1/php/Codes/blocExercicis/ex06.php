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

    td#marca,
    #codi {
      font-weight: bold;
    }
  </style>
</header>

<body>
  <?php
  $llista = array("DELL" => 876, "HP" => 990, "ASUS" => 1002, "TOSHIBA" => 1028, "ACER" => 1056);

  echo "<table>";
  echo "<td id='marca'>" . "Marca" . "</td>";
  echo "<td id='codi'>" . "Codi" . "</td>";

  foreach ($llista as $marca => $codi) {
    echo "<tr>";
    echo "<td>" . $marca . "</td>";
    echo "<td>" . $codi . "</td>";
    echo "</tr>";
  }

  echo "</table>";
  ?>
</body>

</html>