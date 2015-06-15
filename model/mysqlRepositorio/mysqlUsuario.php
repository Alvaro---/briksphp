<?php

include ('model/repositorios/repositoriUser.php');
include ('controller/db.php');

class mysqlUsuario implements repositoriUser{


	public function validarUsuario($usuario, $clave){
		
		$bd=db::getInstance();
		$sql="SELECT nick, clave, tipo FROM usuario WHERE nick='$usuario' AND clave='$clave'";
		//echo $sql;
		$stmt=$bd->ejecutar($sql);
		$array=$bd->obtener_fila ($stmt, 0);

		/*if ($usuario=="Alvaro" && $clave=="123456")
			return true;
		else return false;*/

		if (isset($array[0])){
			return true;
		}else{
			return false;
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