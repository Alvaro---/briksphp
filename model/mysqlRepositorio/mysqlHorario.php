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

	public function cargarAsistentesHoy($horario){
		$idMateria=$horario->getIdMateria();
		$codHora=$horario->getCodHora();
		//echo $idMateria;
		$this->db=Database::getInstance();
		//$sql="SELECT * FROM `horario` WHERE codHora ='$codHora'";
		$sql="SELECT * FROM `view_sistentesdia` WHERE idMateria='$idMateria' and codHora='$codHora'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;
	}

	public function cagarModelosHechos($horario){
		$codHora=$horario->getCodHora();
		$idMateria=$horario->getIdMateria();
		$this->db=Database::getInstance();

		$sql="SELECT * FROM `kardex` WHERE idNino IN (SELECT a.idNino FROM inscripcion a, horario b WHERE a.idHorario=b.idHorario AND b.codHora='$codHora' AND b.idMateria='$idMateria' AND sesiones>-2) ORDER BY materia, idNino";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;
	}

	public function cagarModelosNoHechos($horario){
		$codHora=$horario->getCodHora();
		$idMateria=$horario->getIdMateria();
		$this->db=Database::getInstance();

		$sql="SELECT idModelo, modelo FROM modelos WHERE idModelo NOT IN(SELECT idModelo FROM kardex WHERE idNino IN (SELECT a.idNino FROM inscripcion a, horario b WHERE a.idHorario=b.idHorario AND b.codHora='$codHora' AND b.idMateria='$idMateria' AND sesiones>-2) ) AND idMateria='$idMateria'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;
	}
}