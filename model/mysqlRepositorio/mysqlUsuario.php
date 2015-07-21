<?php

include ('model/repositorios/repositoriUser.php');
//include ('controller/db.php');
include ('controller/Database.php');
//include ('model/clases/usuario.php');

class mysqlUsuario implements repositoriUser{

 	private $db;	

	public function validarUsuario($usuario, $clave){
		
		// EL :: PERMITE ACCEDER A LOS ELEMENTOS ESTATICOS Y SOBREESCRIBIR PROPIEDADES
		$this->db = Database::getInstance();
		//$this->db = Database::getConnection();
		$sql="SELECT nick, clave, tipo FROM usuario WHERE nick='$usuario' AND clave='$clave'";
		
		$user=null;
		$result = $this->db->get_data($sql);
		//echo count($result['DATA']); //CONTAR DATOS DEL ARRAY DE RESULTADOS. SERVIRA PARA LOS CICLOS FOR O WHILE AL MOSTRAR DATOS
		//var_dump($result); // MUESTRA TODO EL ARRAY, EL KEY Y EL VALOR
		//echo $result['DATA'][0]['nick']; // MUESTRA ESA POSICION. ASI SE INGRESA A LOS VALORES
		if (isset($result['DATA'][0]['nick'])){
			$user=new usuario($usuario, $clave);
			$user->setTipoUsuario($result['DATA'][0]['tipo']);
			return $user;
		}else{
			return $user;
		}
	}
}

?>