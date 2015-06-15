<?php
@session_start(); //@ previene warning contra sesiones automáticas (no recomendado)
if(! isset($_SESSION["usuario"])){
    echo "Ninguna sesion iniciada..."; 
	echo '<a href="../index.php">Ingresar a Sesion 1</a>';
}
else{
	session_destroy();
	echo 'Gracias. Vuelva pronto. <a href="../index.php">Ingresar - aqui</a>';
}
?>