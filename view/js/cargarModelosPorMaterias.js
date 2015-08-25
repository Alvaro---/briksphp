$(document).on('ready',funcPrincipal);

var materias=$("#materiasTodas");

function funcPrincipal(){
	cargarMateriasDisponibles();

	materias.on("change", function(){
		var valor=$(this).val();
		cargarModelos(valor);
	});
}
//carga las materias en base a la edad dada
function cargarMateriasDisponibles(){
	var datosEnviados={
		'menorEdad'		:0,
		'mayorEdad'		:100
	};
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarMaterias.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		materias.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            materias.append('<option value="' + v.idMateria + '">' + v.materia + '</option>');
        });
	});
}

function cargarModelos(valor){
	alert(valor);
}
