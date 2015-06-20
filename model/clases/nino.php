<?php

include ('../model/mysqlRepositorio/mysqlNino.php');

class nino{
	public $idNino;
	public $idContacto1;
	public $idContacto2;
	public $nombre;
	public $apPaterno;
	public $apMaterno;
	public $telefono;
	public $nacimiento;
	public $notas;

	protected $repository;

	public function __construct($nombre, $apPaterno, $apMaterno){
		$this->nombre=$nombre;
		$this->apPaterno=$apPaterno;
		$this->apMaterno=$apMaterno;

		$this->repository=new mysqlNino;
	}

	public function getNombre (){
		return $this->nombre;
	}

	public function setNombre ($nombre){
		$this->nombre=$nombre;
	}

	public function getApPaterno (){
		return $this->tipUsuario;
	}

	public function setApPaterno ($apPaterno){
		$this->apPaterno=$apPaterno;
	}

	public function getApMaterno (){
		return $this->apMaterno;
	}

	public function setApMaterno ($apMaterno){
		$this->apMaterno=$apMaterno;
	}

	public function getTelefono (){
		return $this->telefono;
	}

	public function setTelefono ($telefono){
		$this->telefono=$telefono;
	}

	public function getNacimiento (){
		return $this->nacimiento;
	}

	public function setNacimiento ($nacimiento){
		$this->nacimiento=$nacimiento;
	}

	public function getNotas (){
		return $this->notas;
	}

	public function setNotas ($notas){
		$this->notas=$notas;
	}

	public function getIdContacto1 (){
		return $this->idContacto1;
	}

	public function setIdContacto1 ($idContacto1){
		$this->idContacto1=$idContacto1;
	}

	public function getIdContacto2 (){
		return $this->idContacto2;
	}

	public function setIdContacto2 ($idContacto2){
		$this->idContacto2=$idContacto2;
	}

	public function guardarNuevoAlumno(){
		return $this->repository->guardarNino($this);
	}





}

?>