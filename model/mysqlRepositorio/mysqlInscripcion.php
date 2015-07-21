<?php

include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriInscripcion.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");


class mysqlInscripcion implements repositoriInscripcion{

	private $db;	

	public function guardarInscripcion($inscripcion){
		$codHorario=$inscripcion->getCodHorario();
		$idNino=$inscripcion->getIdNino();
		$sesiones=$inscripcion->getSesiones();
		$fechaInscripcion=$inscripcion->getFechaInscripcion();
		//echo "Llega a guardarse con los valroes reales. ".$contacto->getNombre();
		$this->db = Database::getInstance();
		$sql="INSERT INTO inscripcion (idHorario, idNino, sesiones, fechaInscripcion) VALUES ('$codHorario', '$idNino','$sesiones','$fechaInscripcion')";
		$result=$this->db->exec($sql);
		//echo $result['ERROR'];
		return $result['ERROR'];
	}

}

?>