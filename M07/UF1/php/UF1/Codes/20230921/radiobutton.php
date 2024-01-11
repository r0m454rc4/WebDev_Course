<?php
if (!$_POST["resp1"]) {
	echo "Resposta invàlidada per no haver omplert el questionari<br>";
	exit(1);
} else {
	if ($_POST["resp1"] == "a") {
		echo "Resposta correcta</br>";
		exit(0);
	} else {
		echo "Resposta incorrecta</br>";
		exit(2);
	}
}
