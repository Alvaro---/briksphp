<?php
include ('../model/repositorios/repositoriContacto.php');
include_once ('../controller/db.php');

class mysqlContacto implements repositoriContacto{


	public function guardarContacto($contacto){
		echo "Llega a guardarse con los valroes reales. ".$contacto->getNombre();
	}
}

?>