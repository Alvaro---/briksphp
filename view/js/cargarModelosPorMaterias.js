$(document).on('ready',funcPrincipal);

var materiasTodas=$("#materiasTodas");
var selectModelosMateriasCualquiera=$("#modelosMateriaCualquiera");


function funcPrincipal(){
	cargarTodasMaterias();

	materiasTodas.on("change", function(){
		var valor=$(this).val();
		cargarModelos(valor);
	});
}
//carga las materias en base a la edad dada
function cargarTodasMaterias(){
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
		materiasTodas.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            materiasTodas.append('<option value="' + v.idMateria + '">' + v.materia + '</option>');
        });
		cargarModelos(materiasTodas.val());
	});
}

function cargarModelos(valor){
	var datosEnviados={
		'idMateria'	:valor
	};
	//alert(materia);
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarModelosMateria.php',
		data		:datosEnviados,
		dataType	:'json',
		error: 		function(XMLHttpRequest, textStatus, errorThrown) {
     					alert(XMLHttpRequest.responseText);
  		},
		encode		:true
	}).done(function(data){
		//console.log(data);
		selectModelosMateriasCualquiera.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            selectModelosMateriasCualquiera.append('<option value="' + v.idModelo + '">' + v.modelo + '</option>');
        });
		
	});	
}
