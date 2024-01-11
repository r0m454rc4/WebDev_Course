<?php
	//Per comprovar l'aplicació:
	//usuari=joan.puig@fje.edu;
	//contrasenya=Fjeclot22@
	//
	//https://developer.mozilla.org/en-US/docs/Web/HTTP/Authentication#authentication_schemes
	//https://www.php.net/manual/en/features.http-auth.php
	//$_SERVER --> https://www.php.net/reserved.variables.server
	//	
	if (!isset($_SERVER['PHP_AUTH_USER'])){
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Area privada"');
		die("Intent d'accés cancel·lat per l'usuari. Sense autenticació no hi ha accés a la data de l'examen");
		// die() = echo + exit()		
	}
	else{
		$fp=fopen("usuari","r") or die ("No es pot fer l'autenticació");
		$midaFitxer=filesize("usuari");
		$dades = explode(PHP_EOL, fread($fp,$midaFitxer));
		fclose($fp);		
		array_pop($dades);
		$dadesUsuari = explode(":", $dades[0]);
		$nom = $dadesUsuari[0];
		$ctsnya = $dadesUsuari[1];
		if (($_SERVER['PHP_AUTH_USER']==$nom) && (password_verify($_SERVER['PHP_AUTH_PW'],$ctsnya))){
			echo "La data de l'examen del M07UF1 és el dia 20-12-2022<br>";
			//S'ha de netejar la memòria cau perquè torni a sortir la finestra de validació un cop s'ha validat o s'ha de tancar el navegador
		}
		else{
			header('HTTP/1.1 401 Unauthorized');
			die("Autenticació errònia");
			//S'ha de netejar la memòria cau perquè torni a sortir la finestra de validació un cop s'ha validat o s'ha de tancar el navegador
		}
	}
