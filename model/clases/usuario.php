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

	public function validarUsuario(){
		return $this->repository->validarUsuario($this->nombre, $this->clave);
	}

}


?>