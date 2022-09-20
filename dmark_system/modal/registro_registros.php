	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo Registro</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_registro" name="guardar_registro">
			<div id="resultados_ajax"></div>
			<div class="form-group row">
					<?php 
						$short_year = date("y");
						$sql = "SELECT codigoc_registro FROM registros WHERE codigoc_registro like 'DM$short_year%' ORDER BY codigoc_registro DESC LIMIT 1";
						$sql_ultimo_registro=mysqli_query($con, $sql);
						$rw=mysqli_fetch_array($sql_ultimo_registro);
						$ultimo_codigoc = (count($rw)>0) ? $rw['codigoc_registro'] : '-0';
						$siguiente_codigoc =  intval(explode('-', $ultimo_codigoc)[1]) + 1;
						$prefix_codigoc = 'DM';
						$codigoc = $prefix_codigoc . $short_year . '-' . str_pad($siguiente_codigoc,4,"0",STR_PAD_LEFT);
					?>
				  <label for="codigoc" class="col-md-2 control-label">CERTIFICADO</label>
				  <div class="col-md-4">
					  <input type="text" class="form-control input-sm" id="codigoc" name="codigoc" required value="<?php echo $codigoc; ?>" readonly>
				  </div>
				   <label for="ticc" class="col-md-2 control-label">TICC</label>
				  <div class="col-md-4">
					  <input type="text" class="form-control input-sm" id="ticc" name="ticc" required>
				  </div>
				 </div>
			<div class="form-group row">
				 
				  <label for="foto" class="col-md-2 control-label">Fotocheck</label>
					<div class="col-md-4">
					  <input type="text" class="form-control input-sm" id="foto"  name="foto" required>
					</div>
					<label for="dni" class="col-md-2 control-label">DNI</label>
				  <div class="col-md-4">
					  <input type="text" class="form-control input-sm" id="dni" name="dni" placeholder="Ingrese Dni" required>
				  </div>
			</div>
			
			<div class="form-group row">
				  
				  <label for="participa" class="col-md-2 control-label">Participante</label>
				<div class="col-md-4">
					 <input type="text" class="form-control input-sm" id="participa" name="participa" required >
				</div>
				<label for="id_empresa" class="col-md-2 control-label">Empresa</label>
				  <div class="col-md-4">
					 <select class="form-control input-sm" id="id_empresa" name="id_empresa" placeholder="Empresa">
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
				  
				  <label for="id_area" class="col-md-2 control-label">Area</label>
				   <div class="col-md-4">
					   <select class="form-control input-sm" id="id_area" name="id_area">
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
					 <label for="id_empresa1" class="col-md-2 control-label">Sub_empresa</label>
				  <div class="col-md-4">
					 <select class="form-control input-sm" id="id_empresa1" name="id_empresa1">
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
				 
				  <label for="id_cargo" class="col-md-2 control-label">Cargo</label>
					<div class="col-md-4">
					 <select class="form-control input-sm" id="id_cargo" name="id_cargo">
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
					<label for="fecha" class="col-md-2 control-label">Fecha_curso</label>
				  <div class="col-md-4">
					  <input type="date" class="form-control input-sm" min="0" max="20" id="fecha" name="fecha"required>
				  </div> 
				 </div>
			
				<div class="form-group row">
				 
				  <label for="id_curso" class="col-md-2 control-label">Curso</label>
				<div class="col-md-4">
				<select class="form-control input-sm" id="id_curso" name="id_curso">
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
				<label for="ingreso" class="col-md-2 control-label">Ingreso</label>
					<div class="col-md-4">
					  <input type="number" class="form-control input-sm" min="0" max="100" id="ingreso" name="ingreso"required>
					</div>
				</div>
			<div class="form-group row">
					   <label for="estadu" class="col-md-2 control-label">Estado</label>
				  <div class="col-md-4">
					  <select class="form-control" id="estadu" name="estadu" required>
					<option value="">-- Selecciona estado --</option>
					<option value="2" selected>Aprobado</option>
					<option value="1">Desaprobado</option>
					<option value="0">N/A</option>
				  </select>
				  </div>
				  <label for="salida" class="col-md-2 control-label">Salida</label>
				  <div class="col-md-4">
					    <input type="number" class="form-control input-sm" min="0" max="20" id="salida" name="salida" required>
				  </div>
			</div>
				 
			
			  
			<div class="form-group row">
				  
				   <label for="condicion" class="col-md-2 control-label">Condición</label>
				  <div class="col-md-4">
					  <select class="form-control" id="condicion" name="condicion" required>
					<option value="">-- Selecciona estado --</option>
					<option value="2" selected>Aprobado</option>
					<option value="1">Desaprobado</option>
					<option value="0">N/A</option>
				  </select>
				  </div>
				  <label for="id_instructor" class="col-md-2 control-label">Instructor</label>
				  <div class="col-md-4">
					  <select class="form-control input-sm" id="id_instructor" name="id_instructor">
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
				  
				  <label for="id_empresa2" class="col-md-2 control-label">Capacitador</label>
				   <div class="col-md-4">
					 <select class="form-control input-sm" id="id_empresa2" name="id_empresa2">
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
					  <label for="asiste" class="col-md-2 control-label">Asiste</label>
				  <div class="col-md-4">
					  <input type="text" class="form-control input-sm" id="asiste" name="asiste" required>
				  </div>
			</div>
				 
			<div class="form-group row">
<label for="id_lugar" class="col-md-2 control-label">Lugar</label>
				<div class="col-md-4">
				<select class="form-control input-sm" id="id_lugar" name="id_lugar">
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
					<label for="hora" class="col-md-2 control-label">Horas</label>
				   <div class="col-md-4">
					  <input type="number" class="form-control input-sm" min="0" max="20" id="hora" name="hora" required>
					  </div>
			</div>
						
			  <div class="form-group row">

				
				<label for="estado" class="col-sm-2 control-label">Estado</label>
				<div class="col-sm-4">
				 <select class="form-control" id="estado" name="estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>		  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>