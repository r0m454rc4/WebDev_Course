<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Creació d'un fitxer de texte</title>	
	</head>  
	<body>
	<?php
		# VISTA
		function missatge($res){
			switch ($res){
				case 1:
					echo "El fitxer s'ha pogut obrir però, no s'ha pogut modificar el seu contingut<br>";
					break;
				case 2: 
					echo "<p>El fitxer no s'ha pogut obrir per ser actualitzat</p>";
					break;
				case 3: 
					echo "<p>No s'ha enviat el nom del fitxer que s'ha d'actualitzar</p>";
					break;
				case 4: 
					echo "<p>Error 405: Mètode incorrecte. El mètode ha de ser PUT</p>";
					break;
				default:
					echo "<p>El fitxer s'ha pogut obrir i modificar amb èxit</p>"; 	
				}
		}
		# MODEL
		function esborraText($nomFitxer,$text){
			# L'ordre file() obre un fitxer, i aboca TOT el seu contingut dins d'un array de $linies.
			# El caràcter separador de línies és "\n".
			# Amb FILE_IGNORE_NEW_LINES el caràcter "\n" no s'inclou al final de cada línia			
			if($linies = file($nomFitxer,FILE_IGNORE_NEW_LINES)){ 
				foreach($linies as $posicio => $linia) {
					if($text==$linia) {
						unset($linies[$posicio]); 
						#unset esborra la posició de l'array. Si l'array tenia 10 posicions, després d'executar unset en tindrà 9
					}	
				}
			}
			else $res=2;
			# implode("\n", $linies) uneix els elements d'un l'array creant un string i afegint un caràcter separador entre elements.
			# En aquest cas serà el caràcter separador de línies "\n"
			$text_final=implode("\n", $linies)."\n"; #Faltarà un \n final
			# file_put_contents escriu dades (strings,arrays,...) dins d'un fitxer. Si el fitxer existeix, per defecte es sobreescriu
			if (!file_put_contents($nomFitxer, $text_final)) $res=1;
			else $res=0;
										
			return $res;			
		}
		#
		function modificaText($nomFitxer,$textActual,$nouText){
			if($linies = file($nomFitxer,FILE_IGNORE_NEW_LINES)){ 
				foreach($linies as $posicio => $linia) {
					if($textActual==$linia) {
						$linies[$posicio]=$nouText;						
					}	
				}
			}
			else $res=2;
			$text_final=implode("\n", $linies)."\n";
			if (!file_put_contents($nomFitxer, $text_final)) $res=1;
			else $res=0;
										
			return $res;			
		}
		# 
		function afegeixText($nomFitxer,$text){
			$text = $text."\n";
			if ($fitxer=fopen($nomFitxer,"a")){
				if (fwrite($fitxer,$text)){
					$res=0;
					fclose($fitxer);
				}
				else{
					$res=1;
					fclose($fitxer);
				}
			}
			else $res=2;
			
			return $res;			
		}
		# CONTROL
		if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['metode']=="PUT")) {
			echo "<p><b>ACTUALITZACIONS DIVERSES D'UN FITXERS: AFEGINT DADES AL FINAL, ESBORRANT DADES, MODIFICANT DADES</b></p>";
			if ($_POST["nom"]){				
				$nomFitxer="/var/www/html/fitxers/dades/".$_POST["nom"];
				$opc=$_POST["opc"];
				$text=$_POST["text"];
				switch ($opc){
					case "esb": 
						$res=esborraText($nomFitxer,$text);
						break;
					case "mod": 
						$res=modificaText($nomFitxer,$text,$_POST["noutext"]);
						break;
					case "nou": 
						$res=afegeixText($nomFitxer,$text);
						break;	
				}
			}
			else $res=3;
		}
		else $res=4;
		missatge($res);
	?>
	<a href="http://localhost:8080/actualitza_diverses_opcions.html">Torna a la pàgina anterior</a><br>
	<a href="http://localhost:8080/menu.html">Torna al menú</a>
	</body>
</html>
