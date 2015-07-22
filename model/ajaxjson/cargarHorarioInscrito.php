<?php

	include '../clases/inscripcion.php';

	$datos=array();
	$codNino=$_POST['idNino'];
	$inscripcion=new inscripcion("", $codNino);

	$result = $inscripcion->cargarHorarioCompleto();

	echo json_encode($result);

?>