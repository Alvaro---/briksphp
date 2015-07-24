$(document).on('ready',funcPrincipal);

var edad=$("#selectEdad");
var materias=$("#selectMaterias");
var horas=$("#selectHorasAsistencia");
var cuerpoTabla=$("#cuerpoTablaAsistencia");

function funcPrincipal(){
	/*edad.on("change", verificar);
	materia.on("change", verificar);*/
	horas.on("change", verificar);
	materias.on("change", verificar);
	edad.on("change", verificar);
}

function verificar(){
	if (horas.text().trim().length!=0){
		var hora= horas.val();
		var materia= materias.val();
		var datosEnviados={
		'hora'			:hora,
		'materia'		:materia};

		$.ajax({
			type		:'POST',
			url			:'http://localhost/brikssphp/model/ajaxjson/cargarAsistentesHoy.php',
			data		:datosEnviados,
			dataType	:'json',
			encode		:true
		}).done(function(data){
			//la asistencia al ser guardad necesitara el idInscripcion
			cuerpoTabla.find('tr').remove();
			cuerpoTabla.find('td').remove();
			$(data.DATA).each(function(i, v){ // indice, valor
            	cuerpoTabla.append('<tr>'+
            		'<td>' + v.idNino + '</td>'+
            		'<td>' + v.nombre + '</td>'+
            		'<td>' + v.suma + '</td>'+
            		'<td>' + v.sesiones + '</td>'+
            		'<td> <input type="checkbox" id="'+v.idInscripcion+'" value="'+v.idInscripcion+'"/> </td>'+

            		'</tr>').change();
        	});
		});
	}
}