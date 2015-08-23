$(document).on('ready',funcPrincipal);

var btnBuscar=$("#btnBuscarDatos");
var horas=$("#selectHorasAsistencia");
var materias=$("#selectMaterias");
var cuerpoTabla=$("#cuerpoTablaModelosEchos");
var selectDisponibles=$("#selectModelosDisponibles");

function funcPrincipal(){
	btnBuscar.on("click", cargarDatosAlumnos);
}

function cargarDatosAlumnos(){
	var hora= horas.val();
	var materia= materias.val();

	var datosEnviados={
		'hora'		:hora,
		'materia'	:materia
	};

	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarModelosHechos.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		//alert(hora+" "+materia);
		//console.log(data);
		cuerpoTabla.find('tr').remove();
		cuerpoTabla.find('td').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            	cuerpoTabla.append('<tr>'+
            		'<td>' + v.nombre + '</td>'+
            		'<td>' + v.materia + '</td>'+
            		'<td>' + v.modelo + '</td>'+
            		'</tr>');
        	});
		
	});	
	cargarDisponibles(hora, materia);}

function cargarDisponibles(hora, materia){
	var datosEnviados={
		'hora'		:hora,
		'materia'	:materia
	};

	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarModelosNoHechos.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		console.log(data);
		selectDisponibles.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            selectDisponibles.append('<option value="' + v.idModelo + '">' + v.modelo + '</option>').change();
        });
	});	

}
