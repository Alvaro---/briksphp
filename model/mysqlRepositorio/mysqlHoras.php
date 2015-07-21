<?php
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriHoras.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");


class mysqlHoras implements repositoriHoras{

	private $db;	

	//carga las horas de la tabla de horarios
	public function cargarHorasPorMateria($horas){
		$materia=$horas->getMateria();

		$this->db=Database::getInstance();
		$sql="SELECT * FROM horario a, materia b, horas c  WHERE a.idMateria=b.idMateria and c.codHora=a.codHora and b.idMateria='$materia' order by c.dia, c.horaInicial";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;
	}
}