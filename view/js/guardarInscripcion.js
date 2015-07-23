$(document).on('ready',funcPrincipal);

var idNino;

function funcPrincipal(){
	$('#inscribir').on('submit', funcInscribir);
}

function funcInscribir(){
	codHorario=obtenerIdHorario();
	event.preventDefault();
}

function obtenerIdHorario(){
	var horario;
	var horas=$('#selectHoras').val();
	var materias=$('#selectMaterias').val();

	var datosEnviados={
		'horas'	: horas,
		'materias'	: materias
	};
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarHorario.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		//console.log(data);
		//alert(data.DATA[0].idHorario);
		horario=data.DATA[0].idHorario;
		//alert(horario);
		guardarInscripcion(horario);
	});

}

function guardarInscripcion(codHorario){

	//alert(codHorario);
	idNino=$('#lblIdAlumno').text();
	//alert(idNino);
	var sesiones=$('#txtNumeroSesiones').val();
	var f = new Date();
	hoy=f.getFullYear()+"-"+(f.getMonth() +1)+"-"+f.getDate();
	if (!isNaN(idNino)){
		var datosEnviados={
		'idNino'		: idNino,
		'codHorario'	: codHorario,
		'sesiones'		: sesiones,
		'fecha'			: hoy
		};
		$.ajax({
			type		:'POST',
			url			:'http://localhost/brikssphp/model/ajaxjson/guardarInscripcion.php',
			data		:datosEnviados,
			dataType	:'json',
			encode		:true
		}).done(function(data){
			if (data){
				alert("Datos Guardados Correctamente");
				idNino=$('#lblIdAlumno').change();
			}else{
				confirmar=confirm("El niño ya esta inscrito en esta materia, este horario. Se añadiran las "+sesiones+" sesiones a su inscripcion");
				if (confirmar)
					actualizarInscripcion(sesiones, idNino, codHorario);
				else
					alert("verifique los datos");
			}

		});
	}else{
		alert('verifique los datos del niño')
	}
}

function actualizarInscripcion(sesiones,idNino,codHorario){
	var datosEnviados={
		'idNino'		: idNino,
		'codHorario'	: codHorario,
		'sesiones'		: sesiones
		};
		$.ajax({
			type		:'POST',
			url			:'http://localhost/brikssphp/model/ajaxjson/actualizarInscripcion.php',
			data		:datosEnviados,
			dataType	:'json',
			encode		:true
		}).done(function(data){
			if (data){
				alert("Datos Actualizados Correctamente");
				$('#lblIdAlumno').change();
			}else{
				alert("verifique los datos");
			}
		});

}