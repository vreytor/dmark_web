<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_ticc'])) {
           $errors[] = "Nombre vacío";
        }  else if ($_POST['mod_estado']==""){
			$errors[] = "Selecciona el estado del registro";
		}  else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_codigoc']) &&
			$_POST['mod_estado']!="" 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigoc=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigoc"],ENT_QUOTES)));
		$ticc=mysqli_real_escape_string($con,(strip_tags($_POST["mod_ticc"],ENT_QUOTES)));
		$foto=mysqli_real_escape_string($con,(strip_tags($_POST["mod_foto"],ENT_QUOTES)));
		$dni=mysqli_real_escape_string($con,(strip_tags($_POST["mod_dni"],ENT_QUOTES)));
		$participa=mysqli_real_escape_string($con,(strip_tags($_POST["mod_participa"],ENT_QUOTES)));
		$id_empresa=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_empresa"],ENT_QUOTES)));
		$id_area=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_area"],ENT_QUOTES)));
		$id_empresa1=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_empresa1"],ENT_QUOTES)));
		$id_cargo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_cargo"],ENT_QUOTES)));
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["mod_fecha"],ENT_QUOTES)));
		$id_curso=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_curso"],ENT_QUOTES)));
		$ingreso=mysqli_real_escape_string($con,(strip_tags($_POST["mod_ingreso"],ENT_QUOTES)));
		$estadu=mysqli_real_escape_string($con,(strip_tags($_POST["mod_estadu"],ENT_QUOTES)));
		$salida=mysqli_real_escape_string($con,(strip_tags($_POST["mod_salida"],ENT_QUOTES)));
		$condicion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_condicion"],ENT_QUOTES)));
		$id_instructor=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_instructor"],ENT_QUOTES)));
		$id_empresa2=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_empresa2"],ENT_QUOTES)));
		$asiste=mysqli_real_escape_string($con,(strip_tags($_POST["mod_asiste"],ENT_QUOTES)));
		$hora=mysqli_real_escape_string($con,(strip_tags($_POST["mod_hora"],ENT_QUOTES)));
		$id_lugar=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id_lugar"],ENT_QUOTES)));
		$estado=intval($_POST['mod_estado']);
		
		$id_registro=intval($_POST['mod_id']);
		$sql="UPDATE registros SET codigoc_registro='".$codigoc."', ticc_registro='".$ticc."', foto_registro='".$foto."', dni_registro='".$dni."', participa_registro='".$participa."', id_empresa_registro='".$id_empresa."', id_area_registro='".$id_area."', id_empresa1_registro='".$id_empresa1."',	id_cargo_registro='".$id_cargo."', fecha_registro='".$fecha."', id_curso_registro='".$id_curso."', ingreso_registro='".$ingreso."',	estadu_registro='".$estadu."', salida_registro='".$salida."', condicion_registro='".$condicion."', id_instructor_registro='".$id_instructor."', id_empresa2_registro='".$id_empresa2."', asiste_registro='".$asiste."', hora_registro='".$hora."', id_lugar_registro='".$id_lugar."', status_registro='".$estado."' WHERE id_registro='".$id_registro."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Instructor ha sido actualizado satisfactoriamente.";
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