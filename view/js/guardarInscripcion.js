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
		console.log(data);
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
	if (idNino>'#'){
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
			console.log(data);
			console.log(data.ERROR);
		});
	}else{
		alert('verifique los datos del niño')
	}
}