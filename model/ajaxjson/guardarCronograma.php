<?php
	include '../clases/cronograma.php';

	$datos=array();

	$materia=$_POST['materia'];
	$modelo=$_POST['modelo'];
	$hora=$_POST['hora'];
	$fecha=$_POST['fecha'];
	$nota=$_POST['nota'];
	//$fecha="";

	$cronograma=new cronograma($materia, $hora, $fecha);
	//al cronograma deberian mandarse el codigo del horario, en este caso se envia
	// el codigo de hora y codigo de materia. Al ser unicos en conjunto, se obtendra el codigo de hroario
	// Para no repasar tantas veces la base buscando el codigo se añaden en valores del cronograma

	$cronograma->setIdModelo($modelo);
	$cronograma->setNota($nota);

	$result = $cronograma->guardarCronograma();

	echo json_encode($result);

?>