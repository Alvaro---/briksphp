<?php
	
	include 'model/clases/usuario.php';
	class controlLogin {

		public $usuario;

		public function __construct(){
		}

		public function inicio(){

			//verificar si se entra por primera vez o si la variable fue creada es isset
			if (isset($_REQUEST['name'])&&isset($_REQUEST['pass'])){

				$nombre=$_REQUEST['inputNombre'];
				$clave=$_REQUEST['inputClave'];

				$usuario=new usuario($nombre,$clave);
				if($usuario->validarUsuario())
					include('view/menu.php');
				else
					include('view/login.html');
			
			}else
				include('view/login.html');
			
		}

	}

?>