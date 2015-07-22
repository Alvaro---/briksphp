<?php

	include '../clases/inscripcion.php';

	$datos=array();

	$codHorario=$_POST['codHorario'];
	$codNino=$_POST['idNino'];
	$sesiones=$_POST['sesiones'];

	$inscripcion=new inscripcion($codHorario, $codNino);

	$inscripcion->setSesiones($sesiones);

	$result = $inscripcion->actualizarInscripcion();

	echo json_encode($result);

?>