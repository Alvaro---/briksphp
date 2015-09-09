$(document).on('ready',funcPrincipal);

var radio1=$("#op1");
var radio2=$("#op2");
var radio3=$("#op3");

function funcPrincipal(){
	cargarEstadoUno();
	radio1.on("click", cargarEstadoUno);
	radio2.on("click", cargarEstadoDos);
	radio3.on("click", cargarEstadoTres);
}

function cargarEstadoUno(){
	radio1.prop('checked', 'checked');
	//Modelos seleccionados disponibles
	$("#selectModelosDisponibles").removeAttr('disabled');
	//Modelos de la materia seleccionada
	$("#modelosMateria").attr('disabled','disabled');
	// Seleccion de materias y modelo
	$("#materiasTodas").attr('disabled','disabled');
	$("#modelosMateriaCualquiera").attr('disabled','disabled');
}

function cargarEstadoDos(){
	//radio1.prop('checked', 'checked');
	//Modelos seleccionados disponibles
	$("#selectModelosDisponibles").attr('disabled','disabled');
	//Modelos de la materia seleccionada
	$("#modelosMateria").removeAttr('disabled');
	// Seleccion de materias y modelo
	$("#materiasTodas").attr('disabled','disabled');
	$("#modelosMateriaCualquiera").attr('disabled','disabled');
}

function cargarEstadoTres(){
	//radio1.prop('checked', 'checked');
	//Modelos seleccionados disponibles
	$("#selectModelosDisponibles").attr('disabled','disabled');
	//Modelos de la materia seleccionada
	$("#modelosMateria").attr('disabled','disabled');
	// Seleccion de materias y modelo
	$("#materiasTodas").removeAttr('disabled');
	$("#modelosMateriaCualquiera").removeAttr('disabled');
}