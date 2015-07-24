$(document).on('ready',funcPrincipal);


function funcPrincipal(){
	
	var f = new Date();

	var dia=obtenerDia(f);
	var hoy=obtenerFecha(f);	
	var fechaBD=obtenerFechaFormatoBDMYSQL(f);

	$("#lblDia").text(dia);
	$("#lblFecha").text(hoy);
	$('#HidenFechaReal').text(fechaBD);
}

function obtenerFecha(f){

	var mes = new Array(12);
	mes[0]=  "Enero";
	mes[1] = "Febrero";
	mes[2] = "Marzo";
	mes[3] = "Abril";
	mes[4] = "Mayo";
	mes[5] = "Junio";
	mes[6] = "Julio";
	mes[7] = "Agosto";
	mes[8] = "Septiembre";
	mes[9] = "Octuvbre";
	mes[10] = "Noviembre";
	mes[11] = "Diciembre";

	var m = mes[f.getMonth()];

	var hoy=f.getDate()+" de " +m+" de "+ f.getFullYear();
	return hoy;	
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
function obtenerFechaFormatoBDMYSQL(f){
	return f.getFullYear()+"-"+(f.getMonth() +1)+"-"+f.getDate();
}