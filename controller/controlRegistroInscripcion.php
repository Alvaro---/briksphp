<?php
	//GUARDAR

	@session_start(); 
	$_SESSION['pagina']="inscribirenMateria.php";
	$_SESSION['NombreAlumnoNuevo']=$_REQUEST['nombre'];
	echo $_SESSION['NombreAlumnoNuevo'];
	include_once ('../view/menu.php');
?>