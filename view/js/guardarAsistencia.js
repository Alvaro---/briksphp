$(document).on('ready',funcPrincipal);

var cuarpoTabla=$("#cuerpoTablaAsistencia");
var fecha=$('#HidenFechaReal');

function funcPrincipal(){
	$("#btnGuardarAsistencia").on("click", guardar);
}

function guardar(){
	alert("los datos se guardaran");
	//alert($('#cuerpoTablaAsistencia > tr').length);
	//alert($('#cuerpoTablaAsistencia > tr > td').length);

	//alert($('#idModelo').html());
	//alert($('#idProfe').html());
	if($("#modelo").html().length>0){	 //verificar si existe un modelo establecido
		$('#cuerpoTablaAsistencia > tr').each(function(){
			var isCheck=$(this).find('td:eq(4) input:checkbox').is(':checked');
			var idInscripcion =$(this).find("td:eq(4) input").val();
			if (isCheck){
				var datosEnviados={
				'modelo'		:$('#idModelo').html(),
				'inscripcion'	:idInscripcion,
				'profe'			:$('#idProfe').html(),
				'fecha'			:fecha.text()};
				$.ajax({
					type		:'POST',
					url			:'http://localhost/brikssphp/model/ajaxjson/guardarAsistencias.php',
					data		:datosEnviados,
					dataType	:'json',
					error		:function(xhr, status, error) {
					  				var err = eval("(" + xhr.responseText + ")");
					  				alert(err.Message)},
					encode		:true
				}).done(function(data){
					if (!data){
						alert("inscripcion "+idInscripcion+" Ya registrada ");
					}
				});
			}
		});
		$("#selectEdad").change();
	}else{
		alert("Debe haber realizado un modelo");
	}

}