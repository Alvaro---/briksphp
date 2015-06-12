<?php

include ('model/repositorios/repositoriUser.php');

class mysqlUsuario implements repositoriUser{

	public function validarUsuario($usuario, $clave){
		if ($usuario=="Alvaro" && $clave=="123456")
			return true;
		else return false;
	}


}
?>