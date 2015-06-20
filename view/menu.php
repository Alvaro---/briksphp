<!DOCTYPE html>

<?php
@session_start(); //@ previene warning contra sesiones automáticas (no recomendado)
if(! isset($_SESSION["usuario"])){ 
    Header('Location: ../index.php'); 
    exit;
}else{
	$pagina=$_SESSION['pagina'];
}

?>

<html>
<head>
	<title> Briks4 kids Menu</title>


	<link rel="stylesheet" type="text/css" href="view/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="view/css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="view/css/estiloNavegacion.css">

    <script type="text/javascript" src="view/js/seleccionPadres.js"></script>
    <script type="text/javascript" src="../view/js/validacionesCampos.js"></script>

	<link rel="stylesheet" type="text/css" href="../view/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../view/css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="../view/css/estiloNavegacion.css">

    <script type="text/javascript" src="../view/js/seleccionPadres.js"></script>
    <script type="text/javascript" src="../view/js/validacionesCampos.js"></script>

    

</head>
<body>

	<div class="container">
		<h1>Menu </h1>
		<a href="/brikssphp/controller/controlLogout.php">Cerrar Sesion</a>
	</div>
	
	<nav id="menu">
        <ul>
            <li class="nivel1"><a href="/brikssphp/controller/controlMenu.php?pag=inicio.php">Inicio</a></li>
            <li class="nivel1"><a href="/brikssphp/controller/controlMenu.php?pag=niños.php">Niños</a>
                <ul>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=registro.php">Registar Niño</a>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=inscribirenMateria.php">Inscribir</a>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=vern.php">Verificar Datos</a>
                </ul>
            </li>
            <li class="nivel1"><a href="#">Materias</a> 
            	<ul>
            		<li><a href="/brikssphp/controller/controlMenu.php?pag=vermaterias">Ver materias</a></li>
            	</ul>
            </li>
            <li class="nivel1"><a href="#">Modelos</a></li>
            <li class="nivel1"><a href="#">Horarios</a></li>
            <li class="nivel1"><a href="#">Usuarios</a>
                <ul>
                    <li><a href="#">Crear Usuario</a></li>
                    <li><a href="#">Modificar Usuarios</a></li>
                    <li><a href="#">Eliminar Usuarios</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <hr>
    <br>
    <hr>


	<div class="container" id="pagina"> 

		<?php
			include ($pagina);
		?>

	</div>


    <hr>
    <hr>

</body>
</html>

