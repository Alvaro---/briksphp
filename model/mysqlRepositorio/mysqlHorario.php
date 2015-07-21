<?php
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriHorario.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");


class mysqlHorario implements repositoriHorario{

	private $db;	

	//carga el codigo del horario en base a los codigos de la materia de la hora que se pasan clases
	public function cargarHorario($horario){
		$idMateria=$horario->getIdMateria();
		$codHora=$horario->getCodHora();
		//echo $idMateria;
		$this->db=Database::getInstance();
		//$sql="SELECT * FROM `horario` WHERE codHora ='$codHora'";
		$sql="SELECT * FROM `horario` WHERE codHora ='$codHora' AND idMateria='$idMateria'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;

	}
}