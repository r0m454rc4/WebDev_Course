<html>

<head>
	<title>OPERADORS TERNARIS - I</title>
</head>

<body>
	<?php
	//The ternary operator is a conditional operator that decreases the length of code while performing comparisons and conditionals.
	//This method is an alternative for using if-else and nested if-else statements.
	//The order of execution for this operator is from left to right. 
	error_reporting(0);
	$nota = 6.6;
	$missatge = ($nota >= 5) ? "Aprovat<br>" : "Suspés<br>";
	echo $missatge;
	?>
</body>

</html>