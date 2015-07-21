<?php

	include '../clases/horario.php';

	$datos=array();

	$materia=$_POST['materias'];
	$hora=$_POST['horas'];

	$horario=new horario($materia, $hora);

	$result = $horario->cargarHorario();

	echo json_encode($result);

?>