<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_registro=intval($_GET['id']);
		
			if ($delete1=mysqli_query($con,"DELETE FROM registros WHERE id_registro='".$id_registro."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}	
			
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('dni_registro', 'participa_registro');//Columnas de busqueda
		 $sTable = "registros";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by codigoc_registro DESC";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './registros.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Código</th>
					<th>DNI</th>
					<th>Participante</th>
					<th>Fotochet</th>
					<th>Fecha</th>
					<th>Estado</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_registro=$row['id_registro'];
						$codigoc_registro=$row['codigoc_registro'];
						$ticc_registro=$row['ticc_registro'];
						$foto_registro=$row['foto_registro'];
						$dni_registro=$row['dni_registro'];
						$participa_registro=$row['participa_registro'];
						$id_empresa_registro=$row['id_empresa_registro'];
						$id_area_registro=$row['id_area_registro'];
						$id_empresa1_registro=$row['id_empresa1_registro'];
						$id_cargo_registro=$row['id_cargo_registro'];
						$fecha_registro=$row['fecha_registro'];
						$id_curso_registro=$row['id_curso_registro'];
						$ingreso_registro=$row['ingreso_registro'];
						$estadu_registro=$row['estadu_registro'];
						$salida_registro=$row['salida_registro'];
						$condicion_registro=$row['condicion_registro'];
						$id_instructor_registro=$row['id_instructor_registro'];
						$id_empresa2_registro=$row['id_empresa2_registro'];
						$asiste_registro=$row['asiste_registro'];
						$modulo_registro=$row['modulo_registro'];
						$hora_registro=$row['hora_registro'];
						$id_lugar_registro=$row['id_lugar_registro'];
						$status_registro=$row['status_registro'];
						if ($status_registro==1){
							$estado="Activo";
							$label_class='label-success';}
						else {$estado="Inactivo";
						$label_class='label-danger';
						}
					?>
					
					
					<input type="hidden" value="<?php echo $codigoc_registro;?>" id="codigoc_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $ticc_registro;?>" id="ticc_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $foto_registro;?>" id="foto_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $dni_registro;?>" id="dni_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $participa_registro;?>" id="participa_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_empresa_registro;?>" id="id_empresa_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_area_registro;?>" id="id_area_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_empresa1_registro;?>" id="id_empresa1_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_cargo_registro;?>" id="id_cargo_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $fecha_registro;?>" id="fecha_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_curso_registro;?>" id="id_curso_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $ingreso_registro;?>" id="ingreso_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $estadu_registro;?>" id="estadu_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $salida_registro;?>" id="salida_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $condicion_registro;?>" id="condicion_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_instructor_registro;?>" id="id_instructor_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_empresa2_registro;?>" id="id_empresa2_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $asiste_registro;?>" id="asiste_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $modulo_registro;?>" id="modulo_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $hora_registro;?>" id="hora_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $id_lugar_registro;?>" id="id_lugar_registro<?php echo $id_registro;?>">
					<input type="hidden" value="<?php echo $status_registro;?>" id="status_registro<?php echo $id_registro;?>">
					
					<tr>
						<td><?php echo $codigoc_registro; ?></td>
						<td><?php echo $dni_registro; ?></td>
						<td><?php echo $participa_registro; ?></td>
						<td><?php echo $foto_registro; ?></td>
						<td><?php echo $fecha_registro; ?></td>
						<td><span class="label <?php echo $label_class;?>"><?php echo $estado; ?></span></td>
					<td><span class="pull-right">
					<a href="#" class='btn btn-success' title='Editar registro' onclick="obtener_datos('<?php echo $id_registro;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="#" class='btn btn-primary' title='Descargar factura' onclick="imprimir_registro('<?php echo $id_registro;?>');"><i class="glyphicon glyphicon-download"></i></a> 
					<a href="#" class='btn btn-danger' title='Borrar registro' onclick="eliminar('<?php echo $id_registro; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
					
						
					</tr>
					<?php
				}
				?>
				
					<td colspan=7>
					<span class="table-pagination pull-right">
						<?php echo paginate($reload, $page, $total_pages, $adjacents);?>
					</span>
				</td>
				
			  </table>
		
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div></div>
			<?php
		}
	}
?>