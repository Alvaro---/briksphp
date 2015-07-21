<?php
include ('../model/repositorios/repositoriContacto.php');
include_once ('../controller/Database.php');

class mysqlContacto implements repositoriContacto{

	private $db;	

	public function guardarContacto($contacto){
		$nombre=$contacto->getNombre();
		$celular=$contacto->getCelular();
		$correo=$contacto->getCorreo();
		$direccion=$contacto->getDireccion();
		//echo "Llega a guardarse con los valroes reales. ".$contacto->getNombre();
		$this->db = Database::getInstance();
		$sql="INSERT INTO contacto (nombre, celular, correo, direccion) 
		VALUES ('$nombre','$celular','$correo','$direccion')";
		$result=$this->db->exec($sql);
		//echo $result['ERROR'];
		return $result['ERROR'];
	}

	public function obtenerUltimoId(){
		$this->db = Database::getInstance();
		$sql="SELECT MAX(idContacto) AS id FROM contacto";
		$result = $this->db->get_data($sql);
		return $result['DATA'][0]['id'];
	}

	public function obtenerIdActual($contacto){
		$nombre=$contacto->getNombre();
		$celular=$contacto->getCelular();
		$this->db = Database::getInstance();
		$sql="SELECT idContacto AS id FROM contacto WHERE nombre='$nombre' AND celular='$celular'";
		$result = $this->db->get_data($sql);
		return $result['DATA'][0]['id'];
	}
}

?>