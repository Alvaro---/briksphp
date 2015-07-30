<?php
//include ('../model/repositorios/repositoriNino.php');
//include ('../controller/db.php');

include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/repositorios/repositoriNino.php");
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/controller/Database.php");

class mysqlNino implements repositoriNino{
	
	private $db;	

	//obtiene un objeto de nino y lo guarda el la base de datos
	public function guardarNino($nino){
		//echo "Llega a guardarse con los valroes reales. ".$nino->getNombre();
		$nombre=$nino->getNombre();
		$apPaterno=$nino->getApPaterno();
		$apMaterno=$nino->getApMaterno();
		$telefono=$nino->getTelefono();
		$colegio=$nino->getColegio();
		$nacimiento=$nino->getNacimiento();
		$notas=$nino->getNotas();
		$contacto1=$nino->getIdContacto1();
		$contacto2=$nino->getIdContacto2();

		$this->db = Database::getInstance();
		$sql="INSERT INTO nino (nombres, apPaterno, apMaterno, telefono, idContactoPapa, idContactoMama, nacimiento, notas, estado, colegio)
		VALUES ('$nombre','$apPaterno','$apMaterno','$telefono','$contacto1','$contacto2','$nacimiento','$notas','no','$colegio')";
		$result=$this->db->exec($sql);
		echo $result['ERROR'];
		return $result['ERROR'];
	}
	//retorno el ultimo id de ni;o ingresado
	public function obtenerUltimoId(){
		$this->db = Database::getInstance();
		$sql="SELECT MAX(idNino) AS id FROM nino";
		$result = $this->db->get_data($sql);
		return $result['DATA'][0]['id'];
	}
	// obtiene o objeto del ni;o y devuelve el id del ni;o actual
	public function obtenerIdActual($nino){
		$nombre=$nino->getNombre();
		$telefono=$nino->getTelefono();
		$this->db = Database::getInstance();
		$sql="SELECT idNino AS id FROM nino WHERE nombres='$nombre' AND telefono='$telefono'";
		$result = $this->db->get_data($sql);
		return $result['DATA'][0]['id'];
	}
	//obtiene el nombre del ni;o y devuelve un array con valores de los datos
	public function cargarNinosNombre($nombre){
		$this->db=Database::getInstance();
		$sql="SELECT * FROM nino WHERE concat(nombres,' ',apPaterno,' ',apMaterno) like  '%".str_replace(" ", "%", $nombre)."%'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		return $result;
	}

	public function cargarNinosTelefono($telf){
		$this->db=Database::getInstance();
		$sql="SELECT * FROM nino WHERE telefono like '%$telf%'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		return $result;
	}

	public function cargarNinosNombreTelf($nombre, $telf){
		$this->db=Database::getInstance();
		$sql="SELECT * FROM nino WHERE concat(nombres,' ',apPaterno,' ',apMaterno) like  '%".str_replace(" ", "%", $nombre)."%' AND telefono like'%$telf%'";
		//echo $sql;
		$result=$this->db->get_data($sql);
		return $result;
	}

	//CARGA EL KARDEX
	public function cargarKardexNombre($nombre){
		$this->db=Database::getInstance();
		$sql="SELECT * FROM kardex WHERE nombre like  '%".str_replace(" ", "%", $nombre)."%' order by nombre";
		//echo $sql;
		$result=$this->db->get_data($sql);
		return $result;
	}

	public function cargarKardexTelefono($telf){
		$this->db=Database::getInstance();
		$sql="SELECT * FROM kardex WHERE telefono like '%$telf%' order by nombre";
		//echo $sql;
		$result=$this->db->get_data($sql);
		return $result;
	}

	public function cargarKardexNombreTelf($nombre, $telf){
		$this->db=Database::getInstance();
		$sql="SELECT * FROM kardex WHERE nombre like  '%".str_replace(" ", "%", $nombre)."%' AND telefono like'%$telf%' order by nombre";
		//echo $sql;
		$result=$this->db->get_data($sql);
		return $result;
	}
}

?>