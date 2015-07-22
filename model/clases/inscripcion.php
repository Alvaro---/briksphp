<?php
	include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlInscripcion.php");

	class inscripcion{
		public $idInscripcion;
		public $codHorario;
		public $idNino;
		public $numSesiones;
		public $fechaInscripcion;

		protected $repository;

		public function __construct($codHorario, $idNino){
			$this->codHorario=$codHorario;
			$this->idNino=$idNino;
			$this->repository=new mysqlInscripcion;
		}

		public function getCodHorario(){
			return $this->codHorario;
		}

		public function setCodHorario($codHorario){
			$this->codHorario=$codHorario;
		}

		public function getIdNino(){
			return $this->idNino;
		}

		public function setIdNino($idNino){
			$this->idNino=$idNino;
		}

		public function getSesiones(){
			return $this->sesiones;
		}

		public function setSesiones($sesiones){
			$this->sesiones=$sesiones;
		}

		public function getFechaInscripcion(){
			return $this->fechaInscripcion;
		}

		public function setFechaInscripcion($fechaInscripcion){
			$this->fechaInscripcion=$fechaInscripcion;
		}

		public function guardarInscripcion(){
			if ($this->repository->guardarInscripcion($this)=="")
				return true;
			else
				return false;

		}

		public function actualizarInscripcion(){
			if ($this->repository->actualizarInscripcion($this)=="")
				return true;
			else
				return false;
		}

		public function cargarHorarioCompleto(){
			return $this->repository->cargarHorarioCompleto($this);
		}



	}


?>