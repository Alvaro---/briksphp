<?php

interface repositoriNino{
	//obtiene un objeto nino y lo guarda en la base de datos
	public function guardarNino($nino);
	//retorno el ultimo id
	public function obtenerUltimoId();
	//obtiene el objeto nino y retorna su id
	public function obtenerIdActual($nino);
	//obtiene un nombre y devuelve un arreglo con todos los datos necesarios (PARA PHP multiarrays...)
	public function cargarNinosNombre($nombre);
	//obtiene el telefono y carga los ni;os con ese telefono
	public function cargarNinosTelefono($telf);
	//obtiene el nombre y el telefono y carga los ni;os con esos datos (solo deberia devolver un registro)
	public function cargarNinosNombreTelf($nombre, $telf);
	//BUSCA DENTRO DE LA VISTA KARDEX. NO SE LA LLAMA TODOE EL TIEMPO PARA MEJORAR EL RENDIMIENTO DE LA BASE DE DATOS
	public function cargarKardexNombre($nombre);
	//obtiene el telefono y carga EL KARDEX con ese telefono
	public function cargarKardexTelefono($telf);
	//obtiene el nombre y el telefono y carga EL KARDEX con esos datos (solo deberia devolver un registro)
	public function cargarKardexNombreTelf($nombre, $telf);

}



?>