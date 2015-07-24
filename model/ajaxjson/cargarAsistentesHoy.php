<?php

	include '../clases/horario.php';

	$datos=array();

	$materia=$_POST['materia'];
	$hora=$_POST['hora'];

	$horario=new horario($materia, $hora);

	$result = $horario->cargarAsistentesHoy();

	echo json_encode($result);

?>