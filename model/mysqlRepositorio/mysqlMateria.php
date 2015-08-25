<?php
//include ('../model/repositorios/repositoriNino.php');
//include ('../controller/db.php');

include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriMateria.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");

class mysqlMateria implements repositoriMateria{
	private $db;

	public function cargarMateriaEdades($materia){
		$menorEdad=$materia->getMenorEdad();
		$mayorEdad=$materia->getMayorEdad();

		$this->db=Database::getInstance();
		$sql="SELECT * FROM materia WHERE menorEdad >='$menorEdad' AND mayorEdad <='$mayorEdad'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;
	}

}
?>