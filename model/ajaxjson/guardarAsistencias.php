<?php

	include '../clases/asistencia.php';

	$datos=array();

	$codModelo=$_POST['modelo'];
	$codInscripcion=$_POST['inscripcion'];
	$profe=$_POST['profe'];
	$fecha=$_POST['fecha'];

	$asistencia=new asistencia($codModelo, $codInscripcion, $profe, $fecha);

	$result = $asistencia->guardarAsistencia();

	echo json_encode($result);

?>