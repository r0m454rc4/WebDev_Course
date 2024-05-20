<?php
	namespace Tables01;
	class Table {
	  public $titol = "";
	  public $numFiles = 0;
	  public function missatge() {
		echo "<p>Taula '{$this->titol}' té {$this->numFiles} files.</p>";
	  }
	}
	#
	namespace Tables02;
	// Even thogh the name of the class is the same. the created object will be different. as it's on another namespace.
	class Table {
	  public $titulo = "";
	  public $numFilas = 0;
	  public function mensaje() {
		echo "<p>Tabla '{$this->titulo}' tiene {$this->numFilas} filas.</p>";
	  }
	}
?>
