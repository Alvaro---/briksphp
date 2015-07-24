$(document).on('ready',funcPrincipal);

var edad=$("#selectEdad");
var materia=$("#selectMaterias");
var horas=$("#selectHorasAsistencia");
var tabla=$("#cuerpoTablaAsistencia");

function funcPrincipal(){
	/*edad.on("change", verificar);
	materia.on("change", verificar);*/
	horas.on("change", verificar);
}

function verificar(){
	if (horas.text().trim().length!=0){
		alert(horas.val());
		alert(materia.val());
	}
}