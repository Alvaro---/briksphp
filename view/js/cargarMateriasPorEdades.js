$(document).on('ready',funcPrincipal);

var menorEdad=0;
var mayorEdad=100;
function funcPrincipal(){
	cargarMateriasDisponibles();
	$('#selectEdad').on("change", function(){
		var valor=$(this).val();
		cargarEdades(valor);
		cargarMateriasDisponibles();
	});
	//$('#selectEdad').change(cargarMateriasDisponibles());

	$('#selectMaterias').on("change", function(){
		var valor=$(this).val();
		cargarHoras(valor);
	});
}

function cargarMateriasDisponibles(){
	var datosEnviados={
		'menorEdad'		:menorEdad,
		'mayorEdad'		:mayorEdad
	};
	var clases=$("#selectMaterias");
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarMaterias.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		clases.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            clases.append('<option value="' + v.idMateria + '">' + v.materia + '</option>').change();
        });
	});
}

function cargarEdades(valor){
		if (valor=="3-5"){
			menorEdad=3;
			mayorEdad=5;
		}else if (valor=="6-8"){
			menorEdad=6;
			mayorEdad=8;
		}else if (valor=="9-15"){
			menorEdad=9;
			mayorEdad=15;
		}else{
			menorEdad=0;
			mayorEdad=100;
		}
}

function cargarHoras(valor){
	var datosEnviados={
		'materia'		:valor
	};
	var clases=$("#selectHoras");
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarHoras.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		clases.find('option').remove();
		$(data.DATA).each(function(i, v){ // indice, valor
            clases.append('<option value="' + v.codHora + '">' + v.dia+': '+ v.horaInicial+" - "+v.horaFinal + '</option>');
        });
	});
}