<?php

	include '../clases/modelos.php';

	$datos=array();

	$idMateria=$_POST['idMateria'];

	$modelo=new modelos();

	$result = $modelo->cargarModelos($idMateria);
	echo json_encode($result);

?>