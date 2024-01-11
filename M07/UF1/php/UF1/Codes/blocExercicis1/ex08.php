<html>

<body>
  <?php
  function suma($v1, $v2)
  {
    $resultat = round($v1 + $v2, 2);
    return "La suma de $v1 i $v2 és $resultat";
  }

  function resta($v1, $v2)
  {
    $resultat = round($v1 - $v2, 2);
    return "La resta de $v1 i $v2 és $resultat";
  }

  function multiplicacio($v1, $v2)
  {
    $resultat = round($v1 * $v2, 2);
    return "La multiplicació de $v1 i $v2 és $resultat";
  }

  function divisio($v1, $v2)
  {
    $resultat = round($v1 / $v2, 2);
    return "La divisió de $v1 i $v2 és $resultat";
  }

  $operacions = array("suma", "resta", "multiplicacio", "divisio");
  $v1 = 3.27;
  $v2 = 2.65;

  foreach ($operacions as $operacio) {
    echo $operacio($v1, $v2) . "<br>";
  }
  ?>
</body>

</html>