$(document).on('ready',funcPrincipal);

var radio1=$("#op1");
var radio2=$("#op2");
var radio3=$("#op3");
var btnGuardarCronograma=$("#btnGuardarCronograma");
var idModelo;
var materia;
var fecha;
var hora;

function funcPrincipal(){
	btnGuardarCronograma.on("click",guardar);
}

function guardar(){
	cargarModeloDado();
	if (idModelo==null){
		alert("Seleccione un modelo");
	}else{
		materia=$("#selectMaterias").val();
		hora=$("#selectHorasAsistencia").val();
		fecha=$("#fecha").val();
		if (materia==null || hora==null ||fecha==null){
			alert("verifique los datos por favor");
		}else{

			if($("#modelo").html()==""){
				var mod=idModelo;
				var hora=hora
				var mat=materia;
				var fe=fecha;
				var nota=$("nota").text();
				var datosEnviados={
				'modelo'		:mod,
				'materia'		:mat,
				'hora'			:hora,
				'nota'			:nota,
				'fecha'			:fe};
				$.ajax({
					type		:'POST',
					url			:'http://localhost/brikssphp/model/ajaxjson/guardarCronograma.php',
					data		:datosEnviados,
					dataType	:'json',
					error		:function(xhr, status, error) {
					  				var err = eval("(" + xhr.responseText + ")");
					  				alert(err.Message)},
					encode		:true
				}).done(function(data){
					console.log(data);
					if (!data){
						alert("Guardando Correctamente");
					}
				});
			}else{
				alert("Ya hay un modelo seleccionado. Desea Reemplazarlo?");
			}




		}
	}

}

function cargarModeloDado(){
	 if (radio1.is(':checked')){
 		idModelo=$("#selectModelosDisponibles").val();
 		//alert(idModelo);
 	}
 	if (radio2.is(':checked')){
 		idModelo=$("#modelosMateria").val();
 		//alert(idModelo);
 	}
	if (radio3.is(':checked')){
 		idModelo=$("#modelosMateriaCualquiera").val();
 		//alert(idModelo);
 	}
}