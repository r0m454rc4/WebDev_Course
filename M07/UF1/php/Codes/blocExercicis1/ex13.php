<html>

<head>
  <style>
    table,
    td {
      border: solid 2px;
      padding: 4px;
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
  $dades = array(1, 5, 9, 3, -1, 4, 0, -7, 8, 6);

  function ordena_array(&$dades_ordre_antic, $tipus_ordre)
  {
    if ($tipus_ordre == 0) {
      sort($dades_ordre_antic);  // In order to be able reverse the order, because if not, I'll get 6,8,-7...
      $dades_ordre_antic = array_reverse($dades_ordre_antic);
    } else if ($tipus_ordre == 1) {
      sort($dades_ordre_antic);
    }
  }
  // print_r(ordena_array($dades, 0));

  function mostra_dades($dades_actuals, $tipus_mostra)
  {
    if ($tipus_mostra == 0) {
      $missatge  = "Array ordenat de major a menor.";
      ordena_array($dades_actuals, $tipus_mostra);
    } else if ($tipus_mostra == 1) {
      $missatge  = "Array ordenat de menor a major.";
      ordena_array($dades_actuals, $tipus_mostra);
    } else {
      $missatge = "Estat inicial de l'array.";
    }

    echo "<table>";
    echo "<tr>";
    echo "<td id='llista' colspan='10'>" . $missatge . "</td>" . "<br>";
    echo "</tr>";

    echo "<tr>";
    foreach ($dades_actuals as $dada) {
      echo "<td>" . $dada . "</td>";
    }
    echo "</tr>";
    echo "</table>";
  }

  mostra_dades($dades, 73);  // Estat inicial de l'array.
  mostra_dades($dades, 0);  // Array ordenat de major a menor.
  mostra_dades($dades, 1);  // Array ordenat de menor a major

  ?>
</body>

</html>