$(document).on('ready',funcPrincipal);
var conteo=0;
var valorEscritoNombre;
var valorEscritoTelefono;
var edad=$("#lblEdadAlumno").text();
var idNinoActual=$('#lblIdAlumno').text();

function funcPrincipal(){
	seleccionarEdad();
	funcActualizarMateriasInscritas();
	$('#BuscarNino').on('submit', funcVerificar);
	//$('#btnSiguienteNombre').on('click',funcVerificar);
	$('#lblIdAlumno').on('change', funcActualizarMateriasInscritas);
}

function funcVerificar(event){
	if (valorEscritoNombre!=$("#txtBuscarNombre").val()){
		conteo=0;
	}
	if (valorEscritoTelefono!=$('#txtBuscarTelefono').val()){
		conteo=0
	}
	
	valorEscritoNombre = $("#txtBuscarNombre").val();
	valorEscritoTelefono =$('#txtBuscarTelefono').val();

/*	$.get('http://localhost/brikssphp/model/ajaxjson/nino.php?usuario='+valorEscritoNombre, function(data){
		alert("repuesta: "+data);
	});*/
	
	var datosEnviados={
		'usuario'	: valorEscritoNombre,
		'telefono'	: valorEscritoTelefono
	};
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/nino.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		//console.log(data);
		try{
			$("#lblIdAlumno").text(data.DATA[conteo].idNino).change();
			$("#lblNombre").text(data.DATA[conteo].nombres+" "+data.DATA[conteo].apPaterno+" "+data.DATA[conteo].apMaterno);
			edad=obtenerEdad(data.DATA[conteo].nacimiento);
			$("#lblEdadAlumno").text(edad);
			$("#lblNotas").text(data.DATA[conteo].notas);

			seleccionarEdad();

		}catch (err){
			conteo=0;
			//alert(data.DATA[conteo].idNino);
		}
		conteo++;
		if(conteo>=data.DATA.length)
			conteo=0;

	});
	event.preventDefault();
}

function obtenerEdad(nac){
	fecha = new Date(nac)
	hoy = new Date()
	ed = parseInt((hoy-fecha)/365/24/60/60/1000)
	return (ed);
}

function seleccionarEdad(){
	if (edad>=3 && edad<=5){
		$('select#selectEdad').val('3-5').change();
	}else if(edad>=6 && edad<=8){
		$('select#selectEdad').val('6-8').change();
	}else if(edad>=9 && edad<=16){
		$('select#selectEdad').val('9-15').change();
	}else 
		$('select#selectEdad').val('Ver Todas').change();
}

function funcActualizarMateriasInscritas(){
	var idAlumno=$('#lblIdAlumno').text();
	var datosInteres=$('#datosInteres');
	var datosEnviados={
		'idNino'	: idAlumno,
	};
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/cargarHorarioInscrito.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){

		console.log(data);

		var contenerdorLunes=$('#contenerdorLunes');
		var contenerdorMartes=$('#contenerdorMartes');
		var contenerdorMiercoles=$('#contenerdorMiercoles');
		var contenerdorJueves=$('#contenerdorJueves');
		var contenerdorViernes=$('#contenerdorViernes');
		var contenerdorSabado=$('#contenerdorSabado');

		datosInteres.find('li').remove();
		datosInteres.find('br').remove();

		for (i=0; i<data.DATA.length;i++){
			var ses=data.DATA[i].sesiones;
			if (data.DATA[i].dia=="Lunes")	
				contenerdorLunes.append("<li> "+
					"<ul "+((ses==0) ? 'class="alerta"': '')+" > <li> Materia: "+data.DATA[i].materia+" </li>"+
					"<li> Horas: "+data.DATA[i].horaInicial+" a "+
					data.DATA[i].HoraFinal+" </li> "+
					"<li> sesiones restantes: "+ data.DATA[i].sesiones+"</li> </ul>");
				//contenerdorLunes.append("<br>");

			if (data.DATA[i].dia=="Martes")
				contenerdorMartes.append("<li> "+
					"<ul "+((ses==0) ? 'class="alerta"': '')+" > <li> Materia: "+data.DATA[i].materia+" </li>"+
					"<li> Horas: "+data.DATA[i].horaInicial+" a "+
					data.DATA[i].HoraFinal+" </li> "+
					"<li> sesiones restantes: "+ data.DATA[i].sesiones+"</li> </ul>");
				//contenerdorLunes.append("<br>");


			if (data.DATA[i].dia=="Miercoles")
				contenerdorMiercoles.append("<li> "+
					"<ul "+((ses==0) ? 'class="alerta"': '')+" > <li> Materia: "+data.DATA[i].materia+" </li>"+
					"<li> Horas: "+data.DATA[i].horaInicial+" a "+
					data.DATA[i].HoraFinal+" </li> "+
					"<li> sesiones restantes: "+ data.DATA[i].sesiones+"</li> </ul>");
				//contenerdorLunes.append("<br>");

			if (data.DATA[i].dia=="Jueves")
				contenerdorJueves.append("<li> "+
					"<ul "+((ses==0) ? 'class="alerta"': '')+" > <li> Materia: "+data.DATA[i].materia+" </li>"+
					"<li> Horas: "+data.DATA[i].horaInicial+" a "+
					data.DATA[i].HoraFinal+" </li> "+
					"<li> sesiones restantes: "+ data.DATA[i].sesiones+"</li> </ul>");
				//contenerdorLunes.append("<br>");

			if (data.DATA[i].dia=="Viernes")
				contenerdorViernes.append("<li> "+
					"<ul "+((ses==0) ? 'class="alerta"': '')+" > <li> Materia: "+data.DATA[i].materia+" </li>"+
					"<li> Horas: "+data.DATA[i].horaInicial+" a "+
					data.DATA[i].HoraFinal+" </li> "+
					"<li> sesiones restantes: "+ data.DATA[i].sesiones+"</li> </ul>");
				//contenerdorLunes.append("<br>");

			if (data.DATA[i].dia=="Sabado")
				contenerdorSabado.append("<li> "+
					"<ul "+((ses==0) ? 'class="alerta"': '')+" > <li> Materia: "+data.DATA[i].materia+" </li>"+
					"<li> Horas: "+data.DATA[i].horaInicial+" a "+
					data.DATA[i].HoraFinal+" </li> "+
					"<li> sesiones restantes: "+ data.DATA[i].sesiones+"</li> </ul>");
				//contenerdorLunes.append("<br>");
		}


	$(datosInteres).each(function( index ) {
  		console.log(index+ ": " + $(this).text() );
  		
	});

	});
}