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
  </style>
</header>

<body>
  <?php
  $files = $_GET["files"];
  $columnes = $_GET["columnes"];

  echo "<table>";
  for ($i = 1; $i <= $files; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $columnes; $j++) {
      echo "<td>" . ($i * $j) .  "</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  echo "<br>"
  ?>

  <button onclick="location.href='http://localhost:8080/ex05.html'" type="button">Retorna a ex05.html</button>
</body>

</html>