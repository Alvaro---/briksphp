<?php

interface repositoriHorario{
	//carga el codigo del horario en base a los codigos de la materia de la hora que se pasan clases
	public function cargarHorario($horario);
	public function cargarAsistentesHoy($horario);
	public function cagarModelosHechos($horario);
	public function cagarModelosNoHechos($horario);
}

?>