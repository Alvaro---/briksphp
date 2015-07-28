<?php
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriCronograma.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");


class mysqlCronograma implements repositoriCronograma{

	private $db;	

	//carga el modelo en cronograma para hoy, y el docente
	public function cargarDatosHoy($cronograma){
		$idMateria=$cronograma->getIdMateria();
		$codHora=$cronograma->getCodHora();
		$fecha=$cronograma->getFecha();

		$this->db=Database::getInstance();

		$sql="SELECT a.idCronograma, a.fecha, a.idHorario, a.idModelo, c.modelo, a.nota, b.idMateria, b.idDocente, b.codHora, d.nombre, d.telefono FROM cronograma a, horario b, modelos c, usuario d WHERE a.fecha LIKE '$fecha' AND b.idHorario=a.idHorario and a.idModelo=c.idModelo and codHora like'$codHora' and b.idMateria='$idMateria' and d.idUsuario=b.idDocente";
		//echo $sql;
		$result=$this->db->get_data($sql);
		//echo $result["DATA"];
		return $result;

	}



}