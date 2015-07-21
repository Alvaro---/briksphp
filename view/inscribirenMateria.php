<h1>Inscribir en Materia </h1>

<div class="container-fluid" id="cajaMargenGrande">
<form class="form-horizontal" role="form" method="get">
	<div class="col-md-6">
		<h3>Buscar Alumno </h3>
		<button type="submit" class="btn btn-warning" name="inscribir" formaction="controlInscripcion.php">Registrar Alumno</button>
		<br>
</form>
<form id="BuscarNino" class="form-horizontal" role="form" method="get">
		<div class="row">
			<label for="txtBuscaNombre" class="col-md-4">Buscar Nombre: </label>
			<input name="txtBuscaNombre" class="col-md-4" id="txtBuscarNombre"> 		
			<button class="btn btn-success col-md-4" name="BuscarNomberSiguiente" id="btnSiguienteNombre">Buscar Siguiente </button>
		</div>
		<br>
	<!--	<div class="row">
			<label for="txtBuscaApPaterno" class="col-md-5">Buscar Apellido Paterno: </label>
			<input name="txtBuscaApPaterno" class="col-md-4" id="txtBuscarApPaterno">
			<button class="btn btn-success col-md-3" name="inscribir" id="btnSiguienteApPaterno">Buscar Siguiente</button>
		</div>
		<br>
		<div class="row">
			<label for="txtBuscaApMaterno" class="col-md-5">Buscar Apellido Materno: </label>
			<input name="txtBuscaApMaterno" class="col-md-4">
			<button type="submit" class="btn btn-success col-md-3" name="inscribir">Buscar Siguiente</button>
		</div>
		<br> -->
		<div class="row">
			<label for="txtBuscaTelefono" class="col-md-4">Buscar Telefono: </label>
			<input name="txtBuscaTelefono" class="col-md-4" id="txtBuscarTelefono">
			<button type="submit" class="btn btn-success col-md-4" name="inscribir">Buscar Siguiente</button>
		</div>
		<br>
	</div>
</form>
	<div class="col-md-6">
		<h3>Datos para inscripcion</h3>
		<br>
		<div class="row">
			<label for="lblIdAlumno" class="col-md-4">id</label>
			<label name="lblIdAlumno" id="lblIdAlumno" class="col-md-7"> <?php @session_start();
				if(isset($_SESSION['inscribirAlumno'])){
					echo $_SESSION['inscribirAlumno']->getIdNino();
					//echo "aaa";
				}else echo "#";
			 ?> </label>
		</div>
		<br>
		<div class="row">
			<label for="lblNombre" class="col-md-4">Nombre Completo </label>
			<label id="lblNombre" name="lblNombre" class="col-md-7"><?php @session_start();
				if(isset($_SESSION['inscribirAlumno'])){
					echo $_SESSION['inscribirAlumno']->getNombre()." ".$_SESSION['inscribirAlumno']->getApPaterno()." ".$_SESSION['inscribirAlumno']->getApMaterno();
				}else echo "Nombre Completo";
			 ?></label>
		</div>
		<br>
		<div class="row">
			<label for="lblEdad" class="col-md-4">Edad: </label>
			<label id="lblEdadAlumno" name="lblEdad" class="col-md-7"><?php @session_start();
				if(isset($_SESSION['inscribirAlumno'])){
					$fecha = $_SESSION['inscribirAlumno']->getNacimiento();
					$date2 = date('Y-m-d');
				//	$diff = abs(strtotime($date2) - $fecha);
			//		$years = floor($diff / (365*60*60*24));
					$years=$date2-$fecha;
					echo $years;
				}else echo "#";
			 ?></label>
		</div>
		<br>
		<div class="row">
			<label for="lblNotas" class="col-md-4">Notas: </label>
			<label id="lblNotas" name="lblNotas" class="col-md-7"><?php @session_start();
				if(isset($_SESSION['inscribirAlumno'])){
					echo $_SESSION['inscribirAlumno']->getNotas();
				}else echo "Notas";?>
			</label>
		</div>
	</div>
</div>
<hr>

<?php 
//vaciar la variable de sesion
	@session_start();
	if(isset($_SESSION['inscribirAlumno'])){
		unset($_SESSION['inscribirAlumno']);
	}
?>


<form id="inscribir" class="form-horizontal" role="form" method="get">
<div class="container-fluid" id="cajaMargenGrande">
	<div class="col-md-6">

		<h3>Materia</h3>
		<br>
		<div class="row">
			<label for="cbEdadesMaterias" class="col-md-6">Edad de Materias: </label>
			<select name="selectEdadesMaterias" class="form-control col-md-6" id="selectEdad">
				<option selected>Ver Todas</option>
				<option>3-5</option>
				<option>6-8</option>
				<option>9-15</option>
			</select>
		</div>
		<br>
		<div class="row">
			<label class="col-md-6">Materias: </label>
			<select name="selectMateria" class="form-control col-md-6" id="selectMaterias">
			</select>
		</div>
		<br>
		<div class="row">
			<label class="col-md-6">Horas Disponibles: </label>
			<select name="selectHoras" class="form-control col-md-6" id="selectHoras">
			</select>
		</div>
		<br>
		<div class="row">
			<label class="col-md-6">Numero de Sesiones: </label>
			<input name="txtNumeroSesiones" class="col-md-4" id="txtNumeroSesiones">
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<h3>Datos de Interes</h3>
		<br>
		<div class="row">
			<label> Horarios Disponibles:  </label>			
		</div>
		<br>
		<div class="row">
			<label> Lunes:  </label>			
			<label> </label>			
		</div>
		<div class="row">
			<label> Martes:  </label>			
			<label> </label>			
		</div>
		<div class="row">
			<label> Miercoles:  </label>			
			<label> </label>			
		</div>
		<div class="row">
			<label> Jueves:  </label>			
			<label> </label>			
		</div>
		<div class="row">
			<label> Viernes:  </label>			
			<label> </label>			
		</div>
		<div class="row">
			<label> Sabado:  </label>			
			<label> </label>			
		</div>

	</div>
	<br>
	<div class="col-md-6 col-md-offset-3">
		<hr>
		<button type="submit" class="btn btn-primary">Guardar e inscribir en otra materia</button>
		<button type="submit" class="btn btn-primary">Guardar</button>
		<button type="cancel" class="btn btn-primary">Cancelar</button>
		<hr>
	</div>
	<br>	

</div>
</form>
<hr>


<script type="text/javascript" src="../view/js/cargarMateriasPorEdades.js"></script>
<script type="text/javascript" src="../view/js/cambiarNinos.js"></script>
<script type="text/javascript" src="../view/js/guardarInscripcion.js"></script>