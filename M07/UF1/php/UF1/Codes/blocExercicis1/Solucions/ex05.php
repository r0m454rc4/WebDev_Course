</html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title>Exercici 5</title>
	</head>  
	<body>
		<?php
			echo "<table border=\"1\">";
			for ($fila=1;$fila<=$_GET['files'];$fila++) {
				echo "<tr>";
				for ($col=1;$col<=$_GET['columnes'];$col++) {
					$x=$col*$fila;
					echo "<td>$x</td>";	
				}
				echo "</tr>";        
			}
			echo "</table>";    
		?> 	
		<br>
		<button onclick="location.href='http://localhost/ex05.html'" type="button">Retorna a ex05.html</button>
	</body>
</html>
