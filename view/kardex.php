<h3>Kardex de alumnos</h3>

<div class="container-fluid">

	<div class="row">
		<label>Buscar:</label>
	</div>
	<form id="formBuscarKardex">
	<div class="row">
		<div class="col-md-4">
			<input type="text" class="form-control" id="txtBuscarNombre" placeholder="Nombre" name="nombre" />
		</div> 
		<div class="col-md-4">
			<input type="text" class="form-control" id="txtBuscarTelefono" placeholder="Telefono" name="nombre" />
		</div>
		<button type="submit" class="btn btn-info col-md-2">Buscar</button>
	</div>
	</form>

	<br><br>

	<div><label id="lblNombre">Nombre completo del alumno</label></div>


	<div>
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Materia</th>
					<th>Modelo</th>
					<th>Fecha</th>
				</tr>

			</thead>
			<tbody id="cuerpoTablaKardex">
				<tr>
					<td>Arquitectura</td>
					<td>Patito</td>
					<td>2015-07-28</td>
				</tr>

			</tbody>
		</table>	

	</div>

	<br>
	<br>


	<script type="text/javascript" src="../view/js/buscarKardex.js"></script>

</div>
