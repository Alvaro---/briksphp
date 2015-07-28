<?php
	include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlCronograma.php");

	class cronograma{
		public $idCronograma;
		public $codHorario;
		public $fecha;
		public $codHora;
		public $idHoras;
		public $idModelo;
		public $nota;

		protected $repository;

	//al cronograma deberian mandarse el codigo del horario, en este caso se envia
	// el codigo de hora y codigo de materia. Al ser unicos en conjunto, se obtendra el codigo de hroario
	// Para no reapasar tantas veces la base buscando el codigo se añaden en valores del cronograma
	// Tambien se añaden al constructor por que seran valores mas conocidos que el codigo del horario.

		public function __construct($idMateria, $codHora, $fecha){
			$this->idMateria=$idMateria;
			$this->codHora=$codHora;
			$this->fecha=$fecha;
			$this->repository=new mysqlCronograma;
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

		public function getFecha(){
			return $this->fecha;
		}

		public function setFecha($fecha){
			$this->fecha=$fecha;
		}

		public function cargarDatosHoy(){
			return $this->repository->cargarDatosHoy($this);	
		}



	}


?>