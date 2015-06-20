<?php
include ('../model/repositorios/repositoriNino.php');
include ('../controller/db.php');

class mysqlNino implements repositoriNino{


	public function guardarNino($nino){
		echo "Llega a guardarse con los valroes reales. ".$nino->getNombre();
	}
}

?>