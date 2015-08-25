<?php
//include ('../model/repositorios/repositoriNino.php');
//include ('../controller/db.php');

include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriModelo.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");

class mysqlModelo implements repositoriModelo{
	private $db;

	public function cargarModelos($materia){
		$idMat=$materia;

		$this->db=Database::getInstance();
		$sql="SELECT * FROM modelos WHERE idMateria ='$idMat'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;
	}
}
?>