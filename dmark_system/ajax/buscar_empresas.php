<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_empresa=intval($_GET['id']);
		
			if ($delete1=mysqli_query($con,"DELETE FROM empresas WHERE id_empresa='".$id_empresa."'")){
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
		 $aColumns = array('dni_empresa','nombre_empresa');//Columnas de busqueda
		 $sTable = "empresas";
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
		$sWhere.=" order by nombre_empresa";
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
		$reload = './empresas.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>RUC</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Dirección</th>
					<th>Estado</th>
					<th>Agregado</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_empresa=$row['id_empresa'];
						$dni_empresa=$row['dni_empresa'];
						$nombre_empresa=$row['nombre_empresa'];
						$telefono_empresa=$row['telefono_empresa'];
						$email_empresa=$row['email_empresa'];
						$direccion_empresa=$row['direccion_empresa'];
						$status_empresa=$row['status_empresa'];
						if ($status_empresa==1){$estado="Activo";
							$label_class='label-success';}
						else {$estado="Inactivo";
							$label_class='label-danger';
						}
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					
					<input type="hidden" value="<?php echo $dni_empresa;?>" id="dni_empresa<?php echo $id_empresa;?>">
					<input type="hidden" value="<?php echo $nombre_empresa;?>" id="nombre_empresa<?php echo $id_empresa;?>">
					<input type="hidden" value="<?php echo $telefono_empresa;?>" id="telefono_empresa<?php echo $id_empresa;?>">
					<input type="hidden" value="<?php echo $email_empresa;?>" id="email_empresa<?php echo $id_empresa;?>">
					<input type="hidden" value="<?php echo $direccion_empresa;?>" id="direccion_empresa<?php echo $id_empresa;?>">
					<input type="hidden" value="<?php echo $status_empresa;?>" id="status_empresa<?php echo $id_empresa;?>">
					
					<tr>
						<td><?php echo $dni_empresa; ?></td>
						<td><?php echo $nombre_empresa; ?></td>
						<td ><?php echo $telefono_empresa; ?></td>
						<td><?php echo $email_empresa;?></td>
						<td><?php echo $direccion_empresa;?></td>
						<td><span class="label <?php echo $label_class;?>"><?php echo $estado; ?></span></td>
						<td><?php echo $date_added;?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-success' title='Editar Empresa' onclick="obtener_datos('<?php echo $id_empresa;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-danger' title='Borrar Empresa' onclick="eliminar('<?php echo $id_empresa; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<td colspan=8>
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