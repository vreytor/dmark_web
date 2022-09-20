<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar registro</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_registro" name="editar_registro">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_codigoc" class="col-md-2 control">Código</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="mod_codigoc" name="mod_codigoc" readonly>
				<input type="hidden" name="mod_id" id="mod_id">
			  </div>
			  
			  <label for="mod_ticc" class="col-md-2 control">ficc</label>
				<div class="col-md-4">
				 <input type="text" class="form-control" id="mod_ticc" name="mod_ticc"  required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_foto" class="col-md-2 control-lobel">foto</label>
				<div class="col-md-4">
				  <input type="text" class="form-control" id="mod_foto" name="mod_foto"  required>
				</div>
				<label for="mod_dni" class="col-md-2 control-label">DNI</label>
				  <div class="col-md-4">
					  <input type="text" class="form-control" id="mod_dni" name="mod_dni" required>
				  </div>
			  </div>

			  <div class="form-group row">
				  
				  <label for="mod_participa" class="col-md-2 control-label">Participante</label>
				<div class="col-md-4">
					 <input type="text" class="form-control" id="mod_participa" name="mod_participa" required >
				</div>
				<label for="mod_id_empresa" class="col-md-2 control-label">Empresa</label>
				  <div class="col-md-4">
					 <select class="form-control" id="mod_id_empresa" name="mod_id_empresa">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from empresas order by nombre_empresa");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_empresa"];
											$nombre_vendedor=$rw["nombre_empresa"];
											if ($id_vendedor==$_SESSION['id_empresa']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
				  </div>
				 </div>
			   
			   			<div class="form-group row">
				  
				  <label for="mod_id_area" class="col-md-2 control-label">Area</label>
				   <div class="col-md-4">
					   <select class="form-control" id="mod_id_area" name="mod_id_area">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from areas order by nombre_area");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_area"];
											$nombre_vendedor=$rw["nombre_area"];
											if ($id_vendedor==$_SESSION['id_area']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
					  </div>
					<label for="mod_id_empresa1" class="col-md-2 control-label">Sub_empresa</label>
				  <div class="col-md-4">
					 <select class="form-control" id="mod_id_empresa1" name="mod_id_empresa1">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from empresas order by nombre_empresa");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_empresa"];
											$nombre_vendedor=$rw["nombre_empresa"];
											if ($id_vendedor==$_SESSION['id_empresa']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
				  </div>
				 </div>
			
			<div class="form-group row">
				  
				  <label for="mod_id_cargo" class="col-md-2 control-label">Cargo</label>
				   <div class="col-md-4">
					 <select class="form-control" id="mod_id_cargo" name="mod_id_cargo">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from cargos order by nombre_cargo");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_cargo"];
											$nombre_vendedor=$rw["nombre_cargo"];
											if ($id_vendedor==$_SESSION['id_cargo']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
					  </div>
					  <label for="mod_fecha" class="col-md-2 control-label">Fecha_curso</label>
				  <div class="col-md-4">
					  <input type="date" class="form-control" id="mod_fecha" name="mod_fecha"required>
				  </div>
				 </div>
			
				<div class="form-group row">
				  
				  <label for="mod_id_curso" class="col-md-2 control-label">Curso</label>
				<div class="col-md-4">
				<select class="form-control" id="mod_id_curso" name="mod_id_curso">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from products order by nombre_producto");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_producto"];
											$nombre_vendedor=$rw["nombre_producto"];
											if ($id_vendedor==$_SESSION['id_producto']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
				</div>
				<label for="mod_ingreso" class="col-md-2 control-label">Ingreso</label>
				   <div class="col-md-4">
					  <input type="number" class="form-control" min="0" max="100" id="mod_ingreso" name="mod_ingreso" required>
					  </div>
				</div>
			<div class="form-group row">
				 
					   <label for="mod_estadu" class="col-md-2 control-label">Estado</label>
				  <div class="col-md-4">
					  <select class="form-control" id="mod_estadu" name="mod_estadu" required>
					<option value="">-- Selecciona estado --</option>
					<option value="2" selected>Aprobado</option>
					<option value="1">Desaprobado</option>
					<option value="0">N/A</option>
				  </select>
				  </div>
				   <label for="mod_salida" class="col-md-2 control-label">Salida</label>
				  <div class="col-md-4">
					    <input type="number" class="form-control" min="0" max="20" id="mod_salida" name="mod_salida" required>
				  </div>
			</div>
				 
			
			  
			<div class="form-group row">
				 
				   <label for="mod_condicion" class="col-md-2 control-label">Condición</label>
				  <div class="col-md-4">
					  <select class="form-control" id="mod_condicion" name="mod_condicion" required>
					<option value="">-- Selecciona estado --</option>
					<option value="2" selected>Aprobado</option>
					<option value="1">Desaprobado</option>
					<option value="0">N/A</option>
				  </select>
				  </div>
				   <label for="mod_id_instructor" class="col-md-2 control-label">Instructor</label>
				  <div class="col-md-4">
					  <select class="form-control" id="mod_id_instructor" name="mod_id_instructor">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from docentes order by nombre_docente");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_docente"];
											$nombre_vendedor=$rw["nombre_docente"];
											if ($id_vendedor==$_SESSION['id_docente']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
					</select>					
				  </div>
			</div>
				
			<div class="form-group row">
				 
				  <label for="mod_id_empresa2" class="col-md-2 control-label">Capacitador</label>
				   <div class="col-md-4">
					 <select class="form-control" id="mod_id_empresa2" name="mod_id_empresa2">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from empresas order by nombre_empresa");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_empresa"];
											$nombre_vendedor=$rw["nombre_empresa"];
											if ($id_vendedor==$_SESSION['id_empresa']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
					</div>
					<label for="mod_asiste" class="col-md-2 control-label">Asiste</label>
				  <div class="col-md-4">
					  <input type="text" class="form-control" id="mod_asiste" name="mod_asiste"required>
				  </div>  
			</div>
				 
			<div class="form-group row">
				  
				 <label for="mod_id_lugar" class="col-md-2 control-label">Lugar</label>
				<div class="col-md-4">
				<select class="form-control" id="mod_id_lugar" name="mod_id_lugar">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from lugares order by nombre_lugar");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_lugar"];
											$nombre_vendedor=$rw["nombre_lugar"];
											if ($id_vendedor==$_SESSION['id_lugar']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>							
				</div>
					<label for="mod_hora" class="col-md-2 control-label">Horas</label>
				   <div class="col-md-4">
					  <input type="number" class="form-control" min="0" max="20" id="mod_hora" name="mod_hora" required>
					  </div>
			</div>
						
			  <div class="form-group">
			  
				
				<label for="mod_estado" class="col-md-2 control-label">Estado</label>
				<div class="col-md-4">
				 <select class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>