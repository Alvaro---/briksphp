<?php

include ('../model/mysqlRepositorio/mysqlContacto.php');

class contacto{

	public $nombre;
	public $celular;
	public $correo;
	public $direccion;

	protected $repository;

	public function __construct($nombre){
		$this->nombre=$nombre;
		$this->repository=new mysqlContacto;
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
		$this->repository->guardarContacto($this);
	}

}

?>