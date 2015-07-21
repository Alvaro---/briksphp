<?php

	include '../clases/nino.php';

	$datos =array();
	$nombre=$_POST['usuario'];
	$telf=$_POST['telefono'];

	$nino=new nino("","","");
	if (empty($nombre)&&empty($telf)||empty($telf))
		$result=$nino->cargarNinosNombre($nombre);
	elseif(empty($nombre))
		$result=$nino->cargarNinosTelefono($telf);
	else
		$result=$nino->cargarNinosNombreTelf($nombre,$telf);
	//echo $result['DATA'][0]['nombres'];

	echo json_encode($result);

?>