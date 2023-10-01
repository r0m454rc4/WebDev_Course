<html>

<body>
  <?php
  $files = $_GET["files"];
  $columnes = $_GET["columnes"];

  for ($i = 0; $i < $columnes; $i++) {

    for ($j = 0; $j < $files; $j++) {
      echo "<table>";
      echo "<tr>";
      echo "<td>";
      echo "$i";
      echo "$j";
    }
    $resultat = $i * $j;

    echo "$resultat";
    echo '<br>';
  }
  ?>

  <button onclick="location.href='http://localhost:8080/ex05.html'" type="button">Retorna a ex05.html</button>
</body>

</html>