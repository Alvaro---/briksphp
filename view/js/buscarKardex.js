$(document).on('ready',funcPrincipal);

var conteo=0;
var valorEscritoNombre;
var valorEscritoTelefono;

var nomb;
var cuerpoTabla=$("#cuerpoTablaKardex");

function funcPrincipal(){
	$("#formBuscarKardex").on("submit",verificarNombre);
}

function verificarNombre(){
	if (valorEscritoNombre!=$("#txtBuscarNombre").val()){
		conteo=0;
	}
	if (valorEscritoTelefono!=$('#txtBuscarTelefono').val()){
		conteo=0
	}
	
	valorEscritoNombre = $("#txtBuscarNombre").val();
	valorEscritoTelefono =$('#txtBuscarTelefono').val();

	var datosEnviados={
		'nino'	: valorEscritoNombre,
		'telefono'	: valorEscritoTelefono
	};
	$.ajax({
		type		:'POST',
		url			:'http://localhost/brikssphp/model/ajaxjson/buscarKardex.php',
		data		:datosEnviados,
		dataType	:'json',
		encode		:true
	}).done(function(data){
		console.log(data);
		manipularDatos(data);
		conteo++;
		if(conteo>=data.DATA.length)
			conteo=0;
	});

	event.preventDefault();
}

function manipularDatos(data){
	try{
		if(nomb!=data.DATA[conteo].nombre){
			cambiarKardex(data);
		}else{
			conteo++;
			manipularDatos(data);
		}
	}catch (err){
		conteo=0;
	}
}

function cambiarKardex(data){
	cuerpoTabla.find('tr').remove();
	cuerpoTabla.find('td').remove();
	nomb=data.DATA[conteo].nombre;
	$("#lblNombre").html(nomb);

	$(data.DATA).each(function(i, v){ // indice, valor
       	cuerpoTabla.append( ((nomb==v.nombre)? "<tr><td>"+v.materia+"</td><td>"+v.modelo+"</td><td>"+v.fecha+"</td></tr>":"") );
       	//alert(nomb +" ---- "+v.nombre+"---"+conteo+"----");
    });
}