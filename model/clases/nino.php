<?php

//include ('../model/mysqlRepositorio/mysqlNino.php');
include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlNino.php");

class nino{
	public $idNino;
	public $idContacto1;
	public $idContacto2;
	public $nombre;
	public $apPaterno;
	public $apMaterno;
	public $telefono;
	public $colegio;
	public $nacimiento;
	public $notas;
	public $estado;

	protected $repository;

	public function __construct($nombre, $apPaterno, $apMaterno){
		$this->nombre=$nombre;
		$this->apPaterno=$apPaterno;
		$this->apMaterno=$apMaterno;

		$this->repository=new mysqlNino;
	}

	public function getIdNino (){
		return $this->idNino;
	}

	public function setIdNino ($idNino){
		$this->idNino=$idNino;
	}

	public function getNombre (){
		return $this->nombre;
	}

	public function setNombre ($nombre){
		$this->nombre=$nombre;
	}

	public function getApPaterno (){
		return $this->apPaterno;
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

	public function getColegio(){
		return $this->colegio;
	}

	public function setColegio($colegio){
		$this->colegio=$colegio;
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

	public function getEstado (){
		return $this->estado;
	}

	public function setEstado ($estado){
		$this->estado=$estado;
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
		$retorno=$this->repository->guardarNino($this);
		if ($retorno==""){
			//OBTENER ULTIMO ID INGRESADO
			$this->idNino=$this->repository->obtenerUltimoId();
		}else{
			//OBTENER EL ID DEL USUARIO EXISTENTE
			$this->idNino=$this->repository->obtenerIdActual($this);
			//echo $this->repository->guardarContacto($this)."<br>";
		}
		return $retorno;
	}

	public function cargarNinosNombre($nombre){
		return $this->repository->cargarNinosNombre($nombre);
	}

	public function cargarNinosTelefono($telf){
		return $this->repository->cargarNinosTelefono($telf);
	}

	public function cargarNinosNombreTelf($nombre, $telf){
		return $this->repository->cargarNinosNombreTelf($nombre, $telf);
	}

	public function cargarKardexNombre($nombre){
		return $this->repository->cargarKardexNombre($nombre);
	}

	public function cargarKardexTelefono($telf){
		return $this->repository->cargarKardexTelefono($telf);
	}

	public function cargarKardexNombreTelf($nombre, $telf){
		return $this->repository->cargarKardexNombreTelf($nombre, $telf);
	}
}

?>