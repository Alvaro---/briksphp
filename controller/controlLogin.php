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
				$resultado=$usuario->validarUsuario();
				if(isset($resultado)){
					session_start();
					$_SESSION['usuario']=$nombre;
					$_SESSION['tipo']=$resultado->getTipoUsuario();
					$_SESSION['pagina']="inicio.php";
					//echo $_SESSION['tipo']; FUNCIONA¡¡¡¡¡ MVC CON PATRON REPOSITORY
					include('view/menu.php');
				}	
				else
					include('view/login.html');
			
			}else{
				@session_start();
				if(! isset($_SESSION["usuario"])){ 
 					include('view/login.html');	  	
    				exit;
				}else{
					$_SESSION['pagina']="inicio.php";
					include('view/menu.php');
				}
			}
			
		}

	}

?>