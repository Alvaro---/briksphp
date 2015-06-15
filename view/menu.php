<!DOCTYPE html>

<?php
@session_start(); //@ previene warning contra sesiones automáticas (no recomendado)
if(! isset($_SESSION["usuario"])){ 
    Header('Location: ../index.php'); 
    exit;
}
?>

<html>
<head>
	<title> Briks4 kids Menu</title>
	<link rel="stylesheet" type="text/css" href="view/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="view/css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="view/css/estiloNavegacion.css">
</head>
<body>

	<div class="container">
		<h1>Menu </h1>
		<a href="controller/controlLogout.php">Cerrar Sesion</a>
	</div>

	<nav class="clearfix"> 
	    <ul class="clearfix"> 
	        <li><a href="#">Inicio</a></li> 
	        <li><a href="#">Niños</a></li> 
	        <li><a href="#">Materias</a></li> 
	        <li><a href="#">Horarios</a></li> 
	        <li><a href="#">Modelos</a></li> 
	        <li><a href="#">Usuarios</a></li>     
	    </ul> 
    	<a href="#" id="pull">Menu</a> 
	</nav> 





</body>
</html>

