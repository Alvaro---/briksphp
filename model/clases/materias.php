<?php
	include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlMateria.php");

	class materias{

		public $idMateria;
		public $materia;
		public $estado;
		public $menorEdad;
		public $mayorEdad;

		protected $repository;

		public function __construct($menorEdad, $mayorEdad){
			$this->menorEdad=$menorEdad;
			$this->mayorEdad=$mayorEdad;

			$this->repository=new mysqlMateria;
		}

		public function getIdMateria(){
			return $this->idMateria;
		}

		public function setIdMateria($idMateria){
			$this->idMateria=$idMateria;
		}

		public function getMateria(){
			return $this->materia;
		}

		public function setMateria($materia){
			$this->materia=$materia;
		}

		public function getMenorEdad(){
			return $this->menorEdad;
		}

		public function setMenorEdad($menorEdad){
			$this->menorEdad=$menorEdad;
		}

		public function getMayorEdad(){
			return $this->mayorEdad;
		}

		public function setMayorEdad($mayorEdad){
			$this->mayorEdad=$mayorEdad;
		}

		public function getEstado(){
			return $this->estado;
		}

		public function setEstado($estado){
			$this->estado=$estado;
		}

		public function cargarMaterias(){
			return $this->repository->cargarMateriaEdades($this);
		}

	}


?>