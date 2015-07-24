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
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="//localhost/brikssphp/view/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="//localhost/brikssphp/view/css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="//localhost/brikssphp/view/css/estiloNavegacion.css">

    <script type="text/javascript" src="//localhost/brikssphp/view/js/seleccionPadres.js"></script>

<!--	<link rel="stylesheet" type="text/css" href="../view/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../view/css/estilo1.css">
	<link rel="stylesheet" type="text/css" href="../view/css/estiloNavegacion.css">

    <script type="text/javascript" src="../view/js/seleccionPadres.js"></script> -->

    <script src="//localhost/brikssphp/view/jquery/jquery-1.11.3.min.js"></script>

    

</head>
<body>

	<div class="container">
		<h1>Menu </h1>
		<a href="/brikssphp/controller/controlLogout.php">Cerrar Sesion</a>
	</div>
	
	<nav id="menu">
        <ul>
            <li class="nivel1"><a href="/brikssphp/controller/controlMenu.php?pag=inicio.php">Inicio</a></li>
            <li class="nivel1"><a href="/brikssphp/controller/controlMenu.php?pag=ni.php">Niños</a>
                <ul>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=registro.php">Registar Niño</a></li>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=inscribirenMateria.php">Inscribir</a></li>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=marcarAsistencia.php">Asistencia</a></li>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=kardex.php">Kardex</a></li>
                </ul>
            </li>
            <li class="nivel1"><a href="#">Materias</a> 
            	<ul>
            		<li><a href="/brikssphp/controller/controlMenu.php?pag=vermaterias">Ver materias</a></li>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=vermaterias">Adiciona Materias</a></li>
            	</ul>
            </li>
            <li class="nivel1"><a href="#">Modelos</a>
                <ul>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=vermaterias">Ver cronograma de clases</a></li>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=vermaterias">Asignar modelos</a></li>
                </ul>
            </li>
            <li class="nivel1"><a href="#">Horarios</a>
                <ul>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=verHorarios.php">Ver horario</a></li>
                    <li><a href="/brikssphp/controller/controlMenu.php?pag=armarHorarios.php">Armar Horarios</a></li>

                </ul>   
            </li>
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
    <hr>


	<div class="container" id="pagina"> 

        <p id="guardado"></p>
        
		<?php
            if (isset($_SESSION['guardadoCorrecto'])){
                if ($_SESSION['guardadoCorrecto']=="ok"){

        ?>
                <script type="text/javascript">
                    document.getElementById("guardado").innerHTML="<br>Guardado Correcto";
                </script>
        <?php

                }if ($_SESSION['guardadoCorrecto']=="no"){
                            ?>
                <script type="text/javascript">
                    document.getElementById("guardado").innerHTML="<br>No se guardo correctamente";
                </script>
        <?php
                }
            }
            $_SESSION['guardadoCorrecto']="";
            include ($pagina);

		?>

	</div>


    <hr>
    <hr>

</body>
</html>

