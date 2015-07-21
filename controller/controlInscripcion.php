<?php


class controlInscripcion{

	public $accion;
	public function __construct ($accion){
		$this->accion=$accion;
		if ($this->accion=="inscribir"){
			$this->redirigir();
		}elseif ($this->accion=="BuscarNomberSiguiente") {
			echo "string";
		}
	}

	public function redirigir(){
		@session_start(); 
		if ($this->accion=="inscribir"){
			$_SESSION['pagina']="registro.php";
			include_once ('../view/menu.php');
		}
	}


}


if (isset($_REQUEST['inscribir'])){
	$controlInscripcion=new controlInscripcion("inscribir");
}elseif(isset($_REQUEST['BuscarNomberSiguiente'])){
	$controlInscripcion=new controlInscripcion("BuscarNomberSiguiente");
}


?>