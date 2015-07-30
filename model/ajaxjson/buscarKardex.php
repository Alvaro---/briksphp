<?php

	include '../clases/nino.php';

	$datos =array();
	$nombre=$_POST['nino'];
	$telf=$_POST['telefono'];

	$nino=new nino("","","");
	if (empty($nombre)&&empty($telf)||empty($telf))
		$result=$nino->cargarKardexNombre($nombre);
	elseif(empty($nombre))
		$result=$nino->cargarKardexTelefono($telf);
	else
		$result=$nino->cargarKardexNombreTelf($nombre,$telf);
	//echo $result['DATA'][0]['nombres'];

	echo json_encode($result);

?>