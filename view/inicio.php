<?php //Ejemplo curso PHP aprenderaprogramar.com
	echo "Inicio: ";
	$time = time();
	echo date("d-m-Y (H:i:s)", $time);
	echo "<br>";
	@session_start();
	echo "Usuario: ". $_SESSION["tipo"];
?>