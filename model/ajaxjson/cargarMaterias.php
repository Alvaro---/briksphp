<?php

	include '../clases/materias.php';

	$datos=array();

	$menorEdad=$_POST['menorEdad'];
	$mayorEdad=$_POST['mayorEdad'];

	$materia=new materias($menorEdad,$mayorEdad);

	$result = $materia->cargarMaterias();
	echo json_encode($result);

?>