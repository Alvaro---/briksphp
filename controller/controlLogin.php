<?php
	
	include 'model/clases/usuario.php';
	class controlLogin {


		public $usuario;

		public $inactivo = 900;
		public function __construct(){
		}

		public function inicio(){
			//verificar si se entra por primera vez o si la variable fue creada es isset
			if (isset($_REQUEST['inputNombre'])&&isset($_REQUEST['inputClave'])){

				$nombre=$_REQUEST['inputNombre'];
				$clave=$_REQUEST['inputClave'];

				$usuario=new usuario($nombre,$clave);
				if($usuario->validarUsuario()){
					session_start();
					$_SESSION['usuario']=$nombre;
					include('view/menu.php');
				}	
				else
					include('view/login.html');
			
			}else{
				@session_start();
				if(! isset($_SESSION["usuario"])){ 
 					include('view/login.html');	  	
    				exit;
				}else
					include('view/menu.php');
			}
			
		}

	}

?>