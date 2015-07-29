$(document).on('ready',funcPrincipal);

var materias=$("#selectMaterias");
var horas=$("#selectHorasAsistencia");
var fecha=$('#HidenFechaReal');

function funcPrincipal(){
	horas.on("change",cambiarValores)
}

function cambiarValores(){
	cambiarModelos();
}

function cambiarModelos(){
	if (horas.val()!=null && materias.val()!=null){
		//alert("Horas "+horas.val());
		//alert("Materias "+materias.val());
		//alert(fecha.text());
		var hor=horas.val();
		var mat=materias.val();
		var fe=fecha.text();
		//alert(hor+" "+mat+" "+fe);
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
			$("#idProfe").html(data.DATA[0].idDocente);
			$("#modelo").html(data.DATA[0].modelo);
			$("#profe").html(data.DATA[0].nombre+" - "+data.DATA[0].telefono);
		});

	}
	else{
		$("#modelo").html("");
		$("#profe").html("");
		$("#idModelo").html("");
		$("#idProfe").html("");
	}
}