<h1> Registrar Alumno </h1>

<hr>
<!-- Dos partes principales -->
<div class="container-fluid" id="cajaMargenGrande">
<form class="form-horizontal" role="form" method="post">
	<!--DATOS DE ALUMNO -->
	<div class="col-md-6">
		
		<h3>Datos del Alumno</h3>

		<hr><hr>

		<div class="row">

		</div>

		<div class="row">
		<label for="Nombre" class="col-md-4 control-label">Nombre:</label>
		<div class="col-md-7">
			<input type="text" class="form-control" id="Nombre" placeholder="Nombres" name="nombre" required>
		</div>
		</div>

		<div class="row">
		<label for="apellidoPaterno" class="col-md-4 control-label">Apellido Paterno:</label>
		<div class="col-md-7">
			<input type="text" class="form-control" id="apellidoPaterno" placeholder="Apellido Paterno" name="apellidoPaterno">
		</div>
		</div>

		<div class="row">
		<label for="apellidoMaterno" class="col-md-4 control-label">Apellido Materno:</label>
		<div class="col-md-7">
			<input type="text" class="form-control" id="apellidoMaterno" placeholder="Apellido Materno" name="apellidoMaterno">
		</div>
		</div>

		<div class="row">
		<label for="nacimiento" class="col-md-4 control-label">Fecha de Nacimiento:</label>
		<div class="col-md-7">
			<input type="date" class="form-control" id="nacimiento" placeholder="Nacimiento" name="nacimiento">
		</div>		
		</div>

		<div class="row">
		<label for="telefono" class="col-md-4 control-label">Telefono:</label>
		<div class="col-md-7">
			<input type="number" class="form-control" id="telefono" placeholder="Telefono" name="telefono">
		</div>
		</div>

		<div class="row">
		<label for="telefono" class="col-md-4 control-label">Colegio:</label>
		<div class="col-md-7">
			<input type="text" class="form-control" id="colegio" placeholder="Colegio" name="colegio">
		</div>
		</div>

		<div class="row">
		<label for="notas" class="col-md-4 control-label">Notas adicionales:</label>
		<div class="col-md-7">
			<textarea rows="4" cols="50" class="form-control" id="notas" placeholder="Telefono" name="notas">
			</textarea>
		</div>
		</div>



	</div>
	<!--DATOS DE CONTACTO -->
	<div class="col-md-6">
		<h3>Datos de Contacto</h3>

		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<button type="button" class="btn btn-info" onclick="mostrarelDiv()">Contacto Existente (Papá)</button>
			</div>
		</div>

		<div class="row">
		<label for="NombrePapa" class="col-md-4 control-label">Nombre de Papá:</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="NombrePapa" placeholder="Nombre Papa" name="NombrePapa">
		</div>
		</div>

		<div class="row">
		<label for="celuPapa" class="col-md-4 control-label">Celular:</label>
		<div class="col-md-8">
			<input type="number" class="form-control" id="celuPapa" placeholder="Celular Papa" name="celuPapa">
		</div>
		</div>

		<div class="row">
		<label for="correoPapa" class="col-md-4 control-label">Correo:</label>
		<div class="col-md-8">
			<input type="email" class="form-control" id="correoPapa" placeholder="Correo Papá" name="correoPapa">
		</div>
		</div>

		<div class="row">
		<label for="direccionPapa" class="col-md-4 control-label">Direccion:</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="direccionPapa" placeholder="Direccion Papá" name="direccionPapa">
		</div>
		</div>

		<br>
		<!-- DATOS DE MAMA -->
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<button type="button" class="btn btn-info" onclick="mostrarelDiv()">Contacto Existente (Mamá)</button>
			</div>
		</div>

		<div class="row">
		<label for="NombreMama" class="col-md-4 control-label">Nombre de Mamá:</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="NombreMama" placeholder="Nombre Mamá" name="NombreMama">
		</div>
		</div>

		<div class="row">
		<label for="celuMama" class="col-md-4 control-label">Celular:</label>
		<div class="col-md-8">
			<input type="number" class="form-control" id="celuMama" placeholder="Celular Mamá" name="celuMama">
		</div>
		</div>

		<div class="row">
		<label for="correoMama" class="col-md-4 control-label">Correo:</label>
		<div class="col-md-8">
			<input type="email	" class="form-control" id="correoMama" placeholder="Correo Mama" name="correoMama">
		</div>
		</div>

		<div class="row">
		<label for="direccionMama" class="col-md-4 control-label">Direccion:</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="direccionMama" placeholder="Direccion Mama" name="direccionMama">
		</div>
		</div>

	</div>
	<!-- BOTONES DE REGISTRO --> 
	<div class="row">
	<div class="col-md-offset-4 col-md-8" id="cajaMargen">
		<button type="submit" class="btn btn-primary" name="inscribir" formaction="controlRegistro.php">Guardar e inscribir</button>
		<button type="submit" class="btn btn-primary" name="continuar" formaction="controlRegistro.php">Guardar</button>
		<button type="reset" class="btn btn-primary">Limpiar Campos</button>

	</div>
	</div>
	<hr>

</form>
</div>



<hr>


<div id="modal" style="display:none">
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
			<button type="button" class="btn btn-info" onclick="ocultareldiv()">Cerrar</button>
		</div>
	</div>
</div>