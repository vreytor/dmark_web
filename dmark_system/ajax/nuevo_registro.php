<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigoc'])) {
           $errors[] = "Código vacío";
        } else if (!empty($_POST['codigoc'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigoc=mysqli_real_escape_string($con,(strip_tags($_POST["codigoc"],ENT_QUOTES)));
		$ticc=mysqli_real_escape_string($con,(strip_tags($_POST["ticc"],ENT_QUOTES)));
		$foto=mysqli_real_escape_string($con,(strip_tags($_POST["foto"],ENT_QUOTES)));
		$dni=mysqli_real_escape_string($con,(strip_tags($_POST["dni"],ENT_QUOTES)));
		$participa=mysqli_real_escape_string($con,(strip_tags($_POST["participa"],ENT_QUOTES)));
		$id_empresa=mysqli_real_escape_string($con,(strip_tags($_POST["id_empresa"],ENT_QUOTES)));
		$id_area=mysqli_real_escape_string($con,(strip_tags($_POST["id_area"],ENT_QUOTES)));
		$id_empresa1=mysqli_real_escape_string($con,(strip_tags($_POST["id_empresa1"],ENT_QUOTES)));
		$id_cargo=mysqli_real_escape_string($con,(strip_tags($_POST["id_cargo"],ENT_QUOTES)));
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
		$id_curso=mysqli_real_escape_string($con,(strip_tags($_POST["id_curso"],ENT_QUOTES)));
		$ingreso=mysqli_real_escape_string($con,(strip_tags($_POST["ingreso"],ENT_QUOTES)));
		$estadu=mysqli_real_escape_string($con,(strip_tags($_POST["estadu"],ENT_QUOTES)));
		$salida=mysqli_real_escape_string($con,(strip_tags($_POST["salida"],ENT_QUOTES)));
		$condicion=mysqli_real_escape_string($con,(strip_tags($_POST["condicion"],ENT_QUOTES)));
		$id_instructor=mysqli_real_escape_string($con,(strip_tags($_POST["id_instructor"],ENT_QUOTES)));
		$id_empresa2=mysqli_real_escape_string($con,(strip_tags($_POST["id_empresa2"],ENT_QUOTES)));
		$asiste=mysqli_real_escape_string($con,(strip_tags($_POST["asiste"],ENT_QUOTES)));
		$hora=mysqli_real_escape_string($con,(strip_tags($_POST["hora"],ENT_QUOTES)));
		$id_lugar=mysqli_real_escape_string($con,(strip_tags($_POST["id_lugar"],ENT_QUOTES)));
		$estado=intval($_POST['estado']);
		$sql="INSERT INTO registros (codigoc_registro, ticc_registro, foto_registro, dni_registro, participa_registro, id_empresa_registro, id_area_registro, id_empresa1_registro,	id_cargo_registro, fecha_registro, id_curso_registro, ingreso_registro,	estadu_registro, salida_registro, condicion_registro, id_instructor_registro, id_empresa2_registro, asiste_registro, hora_registro, id_lugar_registro, status_registro) VALUES ('$codigoc', '$ticc', '$foto','$dni', '$participa', '$id_empresa', '$id_area', '$id_empresa1', '$id_cargo', '$fecha', '$id_curso', '$ingreso', '$estadu', '$salida', '$condicion','$id_instructor', '$id_empresa2','$asiste','$hora', '$id_lugar', '$estado')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Registro ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Este registro ya esta registrado.";
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>