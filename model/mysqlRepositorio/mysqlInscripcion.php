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

	public function actualizarInscripcion($inscripcion){
		$codHorario=$inscripcion->getCodHorario();
		$idNino=$inscripcion->getIdNino();
		$sesiones=$inscripcion->getSesiones();
		//echo "Llega a guardarse con los valroes reales. ".$contacto->getNombre();
		$this->db = Database::getInstance();
		$sql="UPDATE inscripcion SET sesiones=sesiones+'$sesiones' WHERE idHorario='$codHorario' AND idNino='$idNino'";
		$result=$this->db->exec($sql);
		//echo $result['ERROR'];
		return $result['ERROR'];
	}

	public function cargarHorarioCompleto($inscripcion){
		$idNino=$inscripcion->getIdNino();
		//echo "Llega a guardarse con los valroes reales. ".$contacto->getNombre();
		$this->db = Database::getInstance();
		$sql=
		"SELECT a.idInscripcion, a.sesiones, b.idHorario, b.codHora, b.idMateria, c.dia, c.horaInicial, c.HoraFinal, d.materia
		 FROM inscripcion a, horario b, horas c, materia d
		 WHERE idNino='$idNino' and a.idHorario=b.idHorario and b.codHora=c.codHora and d.idMateria=b.idMateria
		 ORDER BY c.dia";
		$result=$this->db->get_data($sql);
		//echo $result['ERROR'];
		return $result;
	}

}

?>