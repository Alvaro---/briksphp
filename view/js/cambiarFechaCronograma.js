$(document).on('ready',funcPrincipal(new Date()));

function funcPrincipal(f){
	$('#fecha').change(function(){
		var f=$("#fecha").val();
		cambiarFecha(f);
	});
}

function cambiarFecha(f){
	var from =f.split("-");
	var ff = new Date(from[0], from[1]-1, from[2]);
	var dia=obtenerDia(ff);

	$("#lblDia").text(dia);
//	$('#selectHorasAsistencia').change();
//	$('#selectMaterias').change();
	$('#selectMaterias').change();
	//$("#lblFecha").text(hoy);
	//$('#HidenFechaReal').text(fechaBD);
}

function obtenerDia(f){
	var weekday = new Array(7);
	weekday[0]=  "Domingo";
	weekday[1] = "Lunes";
	weekday[2] = "Martes";
	weekday[3] = "Miercoles";
	weekday[4] = "Jueves";
	weekday[5] = "Viernes";
	weekday[6] = "Sabado";

	var n = weekday[f.getDay()];

	return n;
}