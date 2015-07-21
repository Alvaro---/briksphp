<?php

include ('../model/mysqlRepositorio/mysqlContacto.php');

class contacto{

	public $idContacto;
	public $nombre;
	public $celular;
	public $correo;
	public $direccion;

	protected $repository;

	public function __construct($nombre){
		$this->nombre=$nombre;
		$this->repository=new mysqlContacto;
	}

	public function getIdContacto (){
		return $this->idContacto;
	}

	public function setIdContacto ($idContacto){
		$this->idContacto=$idContacto;
	}

	public function getNombre (){
		return $this->nombre;
	}

	public function setNombre ($nombre){
		$this->nombre=$nombre;
	}

	public function getCelular (){
		return $this->celular;
	}

	public function setCelular ($celular){
		$this->celular=$celular;
	}

	public function getCorreo (){
		return $this->correo;
	}

	public function setCorreo ($correo){
		$this->correo=$correo;
	}

	public function getDireccion (){
		return $this->direccion;
	}

	public function setDireccion ($direccion){
		$this->direccion=$direccion;
	}

	public function guardarContacto(){
		if ($this->repository->guardarContacto($this)==""){
			//echo "sin error <br>";
			//OBTENER ULTIMO ID INGRESADO
			$this->idContacto=$this->repository->obtenerUltimoId();
		}else{
			//OBTENER EL ID DEL USUARIO EXISTENTE
			$this->idContacto=$this->repository->obtenerIdActual($this);
			//echo $this->repository->guardarContacto($this)."<br>";
		}
	}

}

?>