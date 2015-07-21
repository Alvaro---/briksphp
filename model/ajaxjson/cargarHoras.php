<?php

	include '../clases/horas.php';

	$datos=array();

	$materia=$_POST['materia'];

	$horas=new horas($materia);

	$result = $horas->cargarHoras();

	echo json_encode($result);

?>