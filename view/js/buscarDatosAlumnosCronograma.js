$(document).on('ready',funcPrincipal);

var btnBuscar=$("#btnBuscarDatos");
var horas=$("#selectHorasAsistencia");
var materias=$("#selectMaterias");
var cuerpoTabla=$("#cuerpoTablaModelosEchos");
var selectDisponibles=$("#selectModelosDisponibles");
var selectModelosMaterias=$("#modelosMateria");
var fecha;

function funcPrincipal(){
	btnBuscar.on("click", cargarDatosAlumnos);
	btnBuscar.on("click", buscarModeloAsignado);
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
		//console.log(data);
		selectDisponibles.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            selectDisponibles.append('<option value="' + v.idModelo + '">' + v.modelo + '</option>').change();
        });
	});	
	cargarModelosMateria();
}

function cargarModelosMateria(){
	var materia= materias.val();
	var datosEnviados={
		'idMateria'	:materia
	};
	//alert(materia);
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarModelosMateria.php',
		data		:datosEnviados,
		dataType	:'json',
		/*error: 		function(XMLHttpRequest, textStatus, errorThrown) {
     					alert(XMLHttpRequest.responseText);
  		},*/
		encode		:true
	}).done(function(data){
		console.log(data);
		selectModelosMaterias.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            selectModelosMaterias.append('<option value="' + v.idModelo + '">' + v.modelo + '</option>').change();
        });
		
	});	
	
}

function buscarModeloAsignado(){
	$("#idModelo").html("");
	$("#modelo").html("");
	if (horas.val()!=null && materias.val()!=null){
		var hor=horas.val();
		var mat=materias.val();
		var fe=$("#fecha").val();
		var datosEnviados={
		'hora'			:hor,
		'materia'		:mat,
		'fecha'			:fe};
		$.ajax({
			type		:'POST',
			url			:'http://localhost/brikssphp/model/ajaxjson/cargarDatosHoy.php',
			data		:datosEnviados,
			dataType	:'json',
			error		:function(xhr, status, error) {
			  				var err = eval("(" + xhr.responseText + ")");
			  				alert(err.Message)},
			encode		:true
		}).done(function(data){
			console.log(data);
			$("#idModelo").html(data.DATA[0].idModelo);
			$("#modelo").html(data.DATA[0].modelo);
		});

	}
	else{
		$("#modelo").html("");
		$("#profe").html("");
		$("#idModelo").html("");
		$("#idProfe").html("");
	}
}
