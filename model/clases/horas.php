<?php
	include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlHoras.php");

	class horas{
		public $idHora;
		public $materia;
		public $docente;
		public $aula;

		protected $repository;

		public function __construct($materia){
			$this->materia=$materia;
			$this->repository=new mysqlHoras;
		}

		public function getIdHora(){
			return $this->idHora;
		}

		public function setIdHora($idHora){
			$this->idHora=$idHora;
		}

		public function getMateria(){
			return $this->materia;
		}

		public function setMateria($materia){
			$this->materia=$materia;
		}

		public function cargarHoras(){
			return $this->repository->cargarHorasPorMateria($this);
		}



	}


?>