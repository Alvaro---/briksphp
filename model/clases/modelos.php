<?php
	include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlModelo.php");

	class modelos{

		public $idModelo;
		public $modelo;

		protected $repository;

		public function __construct(){
			$this->repository=new mysqlModelo;
		}

		public function getIdModelo(){
			return $this->idModelo;
		}

		public function setIdModelo($idModelo){
			$this->idMateria=$idModelo;
		}

		public function getModelo(){
			return $this->modelo;
		}

		public function setModelo($modelo){
			$this->modelo=$modelo;
		}

		public function cargarModelos($materia){
			return $this->repository->cargarModelos($materia);
		}
	}

?>