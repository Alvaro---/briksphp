<?php

	include '../clases/horario.php';

	$datos=array();

	$hora=$_POST['hora'];
	$materia=$_POST['materia'];

	$horario=new horario($materia, $hora);

	$result = $horario->cagarModelosHechos();

	echo json_encode($result);

?>