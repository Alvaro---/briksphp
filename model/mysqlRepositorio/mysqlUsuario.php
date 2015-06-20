<?php

include ('model/repositorios/repositoriUser.php');
include ('controller/db.php');
//include ('model/clases/usuario.php');

class mysqlUsuario implements repositoriUser{


	public function validarUsuario($usuario, $clave){
		
		$bd=db::getInstance();
		$sql="SELECT nick, clave, tipo FROM usuario WHERE nick='$usuario' AND clave='$clave'";
		//echo $sql;
		$stmt=$bd->ejecutar($sql);
		$array=$bd->obtener_fila ($stmt, 0);

		$user=null;

		if (isset($array[0])){
			$user=new usuario($usuario, $clave);
			$user->setTipoUsuario($array[2]);
			return $user;
		}else{
			return $user;
		}
	}
}

/* probar
echo "INICIANDO";
echo '<br>';
$var=new mysqlUsuario();
echo '<br>';
echo $var->validarUsuario('system','system');*/

?>