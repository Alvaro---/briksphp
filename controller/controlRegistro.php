<?php
	
include '../model/clases/nino.php';
include '../model/clases/contacto.php';

class controlRegistro{

	//VALORES DE REGISTRO-FORMULARIO
	public $nombrePapa;
	public $celPapa;
	public $correoPapa;
	public $direccionPapa;

	public $nombreMama;
	public $celMama;
	public $correoMama;
	public $direccionMama;

	public $nombre;
	public $apPaterno;
	public $apMaterno;
	public $nacimiento;
	public $telefono;
	public $notas;

	//OBJETOS
	public $nino;
	public $contacto1;
	public $contacto2;

	//BOTON
	public $accion;
	public $guardado;

	public function __construct ($accion){
		$this->cargarDatos();
		$this->crearObjetos();
		$this->guardarContacto($this->contacto1);
		$this->guardarContacto($this->contacto2);
		$this->actualizarIdContactos();
		$this->guardarNino();
		$this->accion=$accion;
		$this->redirigir();
	}

	//OBTIENE TODOS LOS DATOS DEL FORMULARIO
	public function cargarDatos(){
		//DATOS NINO
		$this->nombre=$_REQUEST['nombre'];
		$this->apPaterno=$_REQUEST['apellidoPaterno'];
		$this->apMaterno=$_REQUEST['apellidoMaterno'];
		$this->nacimiento=$_REQUEST['nacimiento'];
		$this->telefono=$_REQUEST['telefono'];
		$this->notas=$_REQUEST['notas'];

		$this->nombrePapa=$_REQUEST['NombrePapa'];
		$this->celPapa=$_REQUEST['celuPapa'];
		$this->correoPapa=$_REQUEST['correoPapa'];
		$this->direccionPapa=$_REQUEST['direccionPapa'];

		$this->nombreMama=$_REQUEST['NombreMama'];
		$this->celMama=$_REQUEST['celuMama'];
		$this->correoMama=$_REQUEST['correoMama'];
		$this->direccionMama=$_REQUEST['direccionMama'];
	}
	//CREACION DE TODOS LOS OBJETOS
	public function crearObjetos(){
		//OBJETO NIÑO
		$this->nino=new nino($this->nombre, $this->apPaterno, $this->apMaterno);

		$this->nino->setNacimiento($this->nacimiento);
		$this->nino->setTelefono($this->telefono);
		$this->nino->setNotas($this->notas);

		//CONTACTO PAPA - O CONTACTO1
		$this->contacto1=new contacto($this->nombrePapa);
		$this->contacto1->setCelular($this->celPapa);
		$this->contacto1->setCorreo($this->correoPapa);
		$this->contacto1->setDireccion($this->direccionPapa);

		//CONTACTO MAMA - O CONTACTO2
		$this->contacto2=new contacto($this->nombreMama);
		$this->contacto2->setCelular($this->celMama);
		$this->contacto2->setCorreo($this->correoMama);
		$this->contacto2->setDireccion($this->direccionMama);

	}

	public function actualizarIdContactos(){
		$this->nino->setIdContacto1($this->contacto1->getIdContacto());
		$this->nino->setIdContacto2($this->contacto2->getIdContacto());
	}


	//GUARDADO DEL NIÑO
	public function guardarNino(){
		if($this->nino->guardarNuevoAlumno()){ // SI DEVUELVE ALGUN ERROR
			$this->guardado="no";
		}
		else
			$this->guardado="ok";
	}

	public function guardarContacto($contact){
		$contact->guardarContacto();
		//echo "IdContacto1: ".$this->contacto1->getIdContacto()."<br>";
		//echo "IdContacto2: ".$this->contacto2->getIdContacto()."<br>";
	}

	//	REDIRIGE A LA PAGINA DESEADA
	public function redirigir(){
		@session_start(); 
		if ($this->accion=="continuar"){
			$_SESSION['pagina']="registro.php";
			$_SESSION['guardadoCorrecto']=$this->guardado;
			include_once ('../view/menu.php');
		}else {
			$_SESSION['guardadoCorrecto']=$this->guardado;
			$_SESSION['pagina']="inscribirenMateria.php";
			$_SESSION['inscribirAlumno']=$this->nino;
			echo $_SESSION['guardadoCorrecto']."<br>";
			echo $this->nino->getIdNino();
			echo $this->nino->getNombre();

			include_once ('../view/menu.php');
		}
	}
}

//	CREACION DE LA CLASE	//**********************************************************************/

if (isset($_REQUEST['continuar']))
	$controlRegistro=new controlRegistro("continuar");
else 
	$controlRegistro=new controlRegistro("inscribir");

?>