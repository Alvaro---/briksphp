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

<label>Modelo</label> <label hidden id="idModelo" class="col-md-1"></label><label id="modelo" class="col-md-2"></label>

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
	<label><input type="radio" name="optradio" id="op1" >SELECCIONAR </label>
</div>
<div class="row col-md-5 col-md-offset-2">
<label>Todos los modelos de la materia</label>
	<select class="form-control col-md-12" id="modelosMateria">
	</select>
	<label><input type="radio" name="optradio" id="op2">SELECCIONAR </label>
</div>
<div class="row col-md-5 col-md-offset-2">
<label>Materia y modelo</label>
	<select class="form-control col-md-12" id="materiasTodas">

	</select>

	<select class="form-control col-md-12" id="modelosMateriaCualquiera">

	</select>
	<label><input type="radio" name="optradio" id="op3">SELECCIONAR </label>
</div>
<br><br>
<div class="row col-md-5 col-md-offset-2">
	<label>Nota: </label>
	<textarea id="nota"></textarea>
</div>


<div class="row">
	<button class="btn btn-info col-md-5 col-md-offset-2" id="btnGuardarCronograma">Guardar</button>
</div>
<br><br>

<script type="text/javascript" src="../view/js/cargarModelosPorMaterias.js"></script> 
<script type="text/javascript" src="../view/js/cargarMateriasPorEdades.js"></script>
<script type="text/javascript" src="../view/js/cambiarFechaCronograma.js"></script>
<script type="text/javascript" src="../view/js/buscarDatosAlumnosCronograma.js"></script>
<script type="text/javascript" src="../view/js/controlRadio.js"></script>
<script type="text/javascript" src="../view/js/guardarCronograma.js"></script>

