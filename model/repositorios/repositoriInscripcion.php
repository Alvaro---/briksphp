<?php

interface repositoriInscripcion{
	//Guarda la inscripcion de un alumno. La inscripcion debe tener el codigo del niño, el codigo del horario, las sesiones y la fecha
	public function guardarInscripcion($inscripcion);
	//Recibe la inscripcion y actualiza los datos sumando las sesiones existentes con las dela nueva inscripcion
	public function actualizarInscripcion($inscripcion);
	//carga el horario completo. El unico dato necesario de la inscripcion es el id del nino.
	public function cargarHorarioCompleto($inscripcion);
}

?>