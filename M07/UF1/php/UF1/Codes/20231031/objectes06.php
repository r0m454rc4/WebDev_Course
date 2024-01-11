<?php
# Treballant amb constructors i destructors
class fitxers_html
{
	private $nom_fitxer;
	private $df; # Descriptor de fitxer

	public function __construct($nf, $usuari, $permisos)
	{
		$this->nom_fitxer = $nf;
		$this->df = fopen($this->nom_fitxer, "w");
		if ($this->df) {
			echo "Creat el fitxer" . $this->nom_fitxer . "<br>";
			chown($this->nom_fitxer, $this->usuari);
			chgrp($this->nom_fitxer, $usuari);
			chmod($this->nom_fitxer, $permisos);
			echo "Assignats propietari, grup i permisos a " . $this->nom_fitxer . "<br>";
		}
	}

	# S'executa quan l'objecte ja no es torna a utilitzar  dins d'un script, o al
	# finalitzar el script amb un exit o per qualsevol altre motiu de finalització.
	public function __destruct()
	{
		if ($this->df) {
			fclose($this->df);
			echo "Tancat el fitxer " . $this->nom_fitxer . "<br>";
		}
	}

	public function introdueix_contingut($cont)
	{
		if ($this->df) {
			fwrite($this->df, "<html>\n");
			$cont = "    Hola a " . $cont . "!!!!!!!\n";
			fwrite($this->df, $cont);
			fwrite($this->df, "</html>\n");
		}
	}
}

$fitxer = new fitxers_html("index1.html", "www-data", 0644);
$fitxer->introdueix_contingut("Hello World!!!!!");
