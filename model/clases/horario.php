<?php
	include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlHorario.php");

	class horario{
		public $codHora;
		public $idMateria;
		public $aula;
		public $docente;

		protected $repository;

		public function __construct($idMateria, $codHora){
			$this->idMateria=$idMateria;
			$this->codHora=$codHora;
			$this->repository=new mysqlHorario;
		}

		public function getCodHora(){
			return $this->codHora;
		}

		public function setCodHora($codHora){
			$this->codHora=$codHora;
		}

		public function getIdMateria(){
			return $this->idMateria;
		}

		public function setIdMateria($idMateria){
			$this->idMateria=$idMateria;
		}

		public function cargarHorario(){
			return $this->repository->cargarHorario($this);
		}

		public function cargarAsistentesHoy(){
			return $this->repository->cargarAsistentesHoy($this);	
		}



	}


?>