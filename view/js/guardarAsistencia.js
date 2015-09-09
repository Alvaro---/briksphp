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
			var isCheckFalta=$(this).find('td:eq(5) input:checkbox').is(':checked');
			var idInscripcion =$(this).find("td:eq(4) input").val();
			// SI ASISTIO SE GUARDA EL MODELO EN KARDEX Y CON UN DISPARADOR SE DESCUENTA LA ASISTENCIA.
			if (isCheck || isCheckFalta){
				var datosEnviados;
				if (isCheck){
					datosEnviados={
					'modelo'		:$('#idModelo').html(),
					'inscripcion'	:idInscripcion,
					'profe'			:$('#idProfe').html(),
					'fecha'			:fecha.text()};
				}
				//Se usara el id de modelo -1 para considerar una falta. Asi se sabran cuales faltan. 
				//Los que falten sin permiso entraran a asistencia y el disparador quitara una asistencia para el dia
				//Los que no tengan ninguna marca se consideraran CON PERMISO y asi no se les descontara la asistencia ni se guardara su kardex
				if (isCheckFalta){
					datosEnviados={
					'modelo'		:'-1',
					'inscripcion'	:idInscripcion,
					'profe'			:$('#idProfe').html(),
					'fecha'			:fecha.text()};
				}

				if (isCheck && isCheckFalta){
					alert("Error: Marcada Asistencia e inacistencia en la inscripcion" +idInscripcion);
				}else{
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
			}
		});
		$("#selectEdad").change();
	}else{
		alert("Debe haber realizado un modelo");
	}

}