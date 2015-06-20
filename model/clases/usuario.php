<?php

include ('model/mysqlRepositorio/mysqlUsuario.php');

class usuario {

	public $id;
	public $nombre;
	public $clave;
	public $tipUsuario;

	protected $repository;

	public function __construct($nombre, $clave){
		$this->nombre = $nombre;
		$this->clave = $clave;
		$this->repository=new mysqlUsuario;
	}

	public function getTipoUsuario (){
		return $this->tipUsuario;
	}

	public function setTipoUsuario ($tipUsuario){
		$this->tipUsuario=$tipUsuario;
	}


	public function validarUsuario(){
		return $this->repository->validarUsuario($this->nombre, $this->clave);
	}

}


?>