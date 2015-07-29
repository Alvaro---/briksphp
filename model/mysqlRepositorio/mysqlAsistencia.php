<?php
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriAsistencia.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");

class mysqlAsistencia implements repositoriAsistencia{

	private $db;	

	//carga el modelo en cronograma para hoy, y el docente
	public function guardarAsistencia($asistencia){
		$codModelo=$asistencia->getCodModelo();
		$codInscripcion=$asistencia->getCodInscripcion();
		$codUsuario=$asistencia->getCodUsuario();
		$fecha=$asistencia->getFecha();
		//echo "Llega a guardarse con los valroes reales. ".$contacto->getNombre();
		$this->db = Database::getInstance();
		$sql="INSERT INTO asistencia (fecha, idModelo, idUsuario, idInscripcion) 
		VALUES ('$fecha', '$codModelo', '$codUsuario', '$codInscripcion')";
		$result=$this->db->exec($sql);
		//echo $result['ERROR'];
		return $result['ERROR'];
	}



}