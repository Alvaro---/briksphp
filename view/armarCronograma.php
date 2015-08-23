<h3>Crongorama</h3>

<div class="container-fluid"> 
	<label class="col-md-2 col-md-offset-1">Seleccionar Fecha</label>
	<div class="row col-md-3">
		<input type="date" class="form-control" id="fecha">
	</div>
	<label class="col-md-1" id="lblDia"> </label>

	<br><br>
	<label class="col-md-2 col-md-offset-1">Materias del Dia:</label>
	<div class="row col-md-3">
		<select class="form-control col-md-12" id="selectMaterias">

		</select>
	</div>
	<br><br>
	<label class="col-md-2 col-md-offset-1">Seleccionar Hora</label>
	<div class="row col-md-3">
		<select class="form-control col-md-12" id="selectHorasAsistencia">
			<option>.....0</option>
		</select>
	</div>

</div>


<br><br>

<div class="row">
	<button class="btn btn-info col-md-5 col-md-offset-2" id="btnBuscarDatos">Buscar</button>
</div>

<br><br>

<label> alumnos inscritos </label>

	<div class="row">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Alumno</th>
					<th>Materia</th>
					<th>Modelos Realizados</th>
				</tr>
			</thead>

			<tbody id="cuerpoTablaModelosEchos">
				<tr>
				</tr>
			</tbody>
		</table>
	</div>
<div class="row col-md-5 col-md-offset-2">
<label>Modelo Disponibles para la clase</label>
	<select class="form-control col-md-12" id="selectModelosDisponibles">

	</select>
</div>
<div class="row col-md-5 col-md-offset-2">
<label>Todos los modelos de la materia</label>
	<select class="form-control col-md-12">
		<option>conejor</option>
		<option>barco</option>
	</select>
</div>
<div class="row col-md-5 col-md-offset-2">
<label>Materia y modelo</label>
	<select class="form-control col-md-12">
		<option>Arquitecturar</option>
		<option>Ingenieria</option>
	</select>

	<select class="form-control col-md-12">
		<option>mnodelo arqui</option>
		<option>otro modelo arqui</option>
	</select>
</div>
<br><br>
<div class="row">
	<button class="btn btn-info col-md-5 col-md-offset-2">Guardar</button>
</div>
<br><br>

<script type="text/javascript" src="../view/js/cargarMateriasPorEdades.js"></script>
<script type="text/javascript" src="../view/js/cambiarFechaCronograma.js"></script>
<script type="text/javascript" src="../view/js/buscarDatosAlumnosCronograma.js"></script>

