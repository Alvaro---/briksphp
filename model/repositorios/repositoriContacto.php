<?php

interface repositoriContacto{
	public function guardarContacto($contacto);
	public function obtenerUltimoId();
	public function obtenerIdActual($contacto);
}

?>