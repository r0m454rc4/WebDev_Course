<?php
	session_start();
	if (!isset($_SESSION['usuari'])){
		header("Location: error_acces.php");
	}
?>
<!DOCTYPE html>
<html lang="ca">
    <head>
		<meta charset="utf-8">
        <title>Selecció de producte</title>
    </head>
    <body>
		<?php
			require("biblioteca.php");
			$nomFitxer=DIRECTORI_CISTELLA.$_SESSION['usuari'];
			$_SESSION['producte']=fLlegeixFitxer($nomFitxer);
			if ($_SESSION['producte']){
				echo "Producte actual a la cistella: ".$_SESSION['producte'][0]."<br>";
			}else{
				echo "Cap producte a la cistella<br>";
			}
			if(isset($_POST['producte'])){
				$_SESSION['producte']=$_POST['producte']."\n";
				header("Location: logout.php");				
			} 
		?>
		<b><u>LLISTA DE PRODUCTES:</u></b><br>
		<form action="producte.php" method="POST">
			<input type="radio" name="producte" value="bombetes30W"/> Bombetes de 30 W<br/>
			<input type="radio" name="producte" value="bombetes60W"/> Bombetes de 60 W<br/>
			<input type="radio" name="producte" value="bombetes100W"/> Bombetes de 100 W<br/>
			<input value="Selecciona" type="submit"></td>						
		</form>		
    </body>
</html>
