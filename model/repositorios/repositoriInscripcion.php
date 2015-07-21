<?php

interface repositoriInscripcion{
	//Guarda la inscripcion de un alumno. La inscripcion debe tener el codigo del niño, el codigo del horario, las sesiones y la fecha
	public function guardarInscripcion($inscripcion);
}

?>