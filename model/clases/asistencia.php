<?php
	include ($_SERVER["DOCUMENT_ROOT"]."/brikssphp/model/mysqlRepositorio/mysqlAsistencia.php");

	class asistencia{
		public $idAsistencia;
		public $fecha;
		public $codModelo;
		public $codUsuario;
		public $codInscripcion;

		protected $repository;

		public function __construct($codModelo, $codInscripcion, $codUsuario, $fecha){
			$this->codModelo=$codModelo;
			$this->codInscripcion=$codInscripcion;
			$this->codUsuario=$codUsuario;
			$this->fecha=$fecha;
			$this->repository=new mysqlAsistencia;
		}


		public function getIdAsistencia() {
        	return $this->idAsistencia;
	    }

	    public function getFecha() {
	        return $this->fecha;
	    }

	    public function getCodModelo() {
	        return $this->codModelo;
	    }

	    public function getCodUsuario() {
	        return $this->codUsuario;
	    }

	    public function getCodInscripcion() {
	        return $this->codInscripcion;
	    }

	    public function setIdAsistencia($idAsistencia) {
	        $this->idAsistencia = $idAsistencia;
	    }

	    public function setFecha($fecha) {
	        $this->fecha = $fecha;
	    }

	    public function setCodModelo($codModelo) {
	        $this->codModelo = $codModelo;
	    }

	    public function setCodUsuario($codUsuario) {
	        $this->codUsuario = $codUsuario;
	    }

	    public function setCodInscripcion($codInscripcion) {
	        $this->codInscripcion = $codInscripcion;
	    }
	    public function guardarAsistencia(){
	    	if ($this->repository->guardarAsistencia($this)=="")
				return true;
			else
				return false;
	    }
	}

?>