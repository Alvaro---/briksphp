<?php

	include '../clases/inscripcion.php';

	$datos=array();

	$codHorario=$_POST['codHorario'];
	$codNino=$_POST['idNino'];
	$sesiones=$_POST['sesiones'];
	$fecha=$_POST['fecha'];

	$inscripcion=new inscripcion($codHorario, $codNino);

	$inscripcion->setSesiones($sesiones);
	$inscripcion->setFechaInscripcion($fecha);

	$result = $inscripcion->guardarInscripcion();

	echo json_encode($result);

?>