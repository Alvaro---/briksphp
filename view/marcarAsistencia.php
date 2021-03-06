<h3>Asistencia</h3> 


<div class="container-fluid">

	<div class="row">
		<label class="col-md-1 col-md-offset-2">Fecha: </label> <label id="HidenFechaReal" hidden> </label> <label class="col-md-1" id="lblDia"> </label> <label id="lblFecha" class="col-md-4">tal fecha </label> <button id="cambiarFecha" type="button" class="col-md-2 btn btn-info">Modificar Fecha</button>
	</div>

	<div class="row" id="cambioFecha" hidden>
		<input id="fecha" type="date" class="col-md-3 col-md-offset-3"> <button id="volverFecha" type="button" class="col-md-2 btn btn-info">Vovler a Fecha Actual</button>
	</div>

	<br>

	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<label>Edad: </label>
			<select class="form-control col-md-12" id="selectEdad">
				<option>3-5</option>
				<option>6-8</option>
				<option>9-15</option>
				<option selected>Ver Todas</option>
			</select>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<label>Materia: </label>
			<select class="form-control col-md-12" id="selectMaterias">
			</select>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<label>Hora: </label>
			<select class="form-control col-md-12" id="selectHorasAsistencia">
			</select>
		</div>
	</div>
	
	<br>
	<br>

	<div class="row">
		<label class="col-md-1">Modelo</label> <label hidden id="idModelo" class="col-md-1"></label>  <label id="modelo" class="col-md-2"></label> <button type="button" class="col-md-2 btn btn-info" onclick="mostrarelDivModelos()">Modificar Modelo</button>
		<label class="col-md-1 col-md-offset-1">Profesor</label> <label hidden id="idProfe" class="col-md-1"></label>  <label class="col-md-1" id="profe"></label> <button type="button" class="col-md-2 btn btn-info">Modificar Profesor</button>
	</div>

	<br>
	<br>


	<div class="row">
		<div class="col-md-9 col-md-offset-2">
			<label>Alumnos para hoy:</label>
		</div>
	</div>	

	<div class="row">
		<div class="row">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre Completo</th>
					<th>Sesiones restantes por materia</th>
					<th>Sesiones restantes por dia</th>
					<th>Asistencia</th>
					<th>Falta Sin Permiso</th>
				</tr>
			</thead>

			<tbody id="cuerpoTablaAsistencia">
			</tbody>

		</table>

	</div>

	<div class="row">
		<button class="col-md-2 col-md-offset-5 btn btn-info">Aumentar Nino</button>
	</div>

	<br>
	<br>

	<div class="row">
		<button class="col-md-2 col-md-offset-5 btn btn-primary" id="btnGuardarAsistencia">Marcar Asistencia</button>
	</div>


	
	<br>
	<br>


	<div class="modall" id="modalModelo" style="display:none">
	 	<div id="contenido-interno">
	 		<div class="row">
	 			<h4>Selecciona el contacto de la siguiente lista</h4>
	 		</div>

	 		<div class="row">
	 			<div class="col-md-4 col-md-offset-4">
	 			Buscar <input type="search">
	 			</div>
	 		</div>
	 			Contactos:

			<div class="row">
				<button type="button" class="btn btn-info">Aceptar</button>
				<button type="button" class="btn btn-info" onclick="ocultareldivModelos()">Cerrar</button>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../view/js/cargarDatosAsistencia.js"></script>
	<script type="text/javascript" src="../view/js/cargarFechaHoy.js"></script>
	<script type="text/javascript" src="../view/js/cargarMateriasPorEdades.js"></script>
	<script type="text/javascript" src="../view/js/cargarAsistentesHoy.js"></script>
	<script type="text/javascript" src="../view/js/mostrarDivsInscripcion.js"></script>
	<script type="text/javascript" src="../view/js/guardarAsistencia.js"></script>

</div>