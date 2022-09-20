<?php
 session_start();
 $fecha=date('d-m-Y');
				header("content-type: application/vnd.ms-excel");
				header("content-Disposition: attachment; filename=Reporte_Inventario_$fecha.xls");
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<center></center><br><br>
<div id="nuevoReporte">
	
    <!-- Button to trigger modal -->
<table width="80%" border="1" class="table table-hover">
<thead>
  <tr>
    <td colspan="8"><strong><center>Registros Existencia</center></strong></td>
    </tr>
  <tr>
    <td width="7%"><strong><center>Codigo</center></strong></td>
    <td width="7%"><strong>DNI</strong></td>
    <td width="20%"><strong>APELLIDO Y NOMBRE</strong></td>
    <td width="29%"><div align="right"><strong><center>CURSO.</center></strong></div></td>
    <td width="9%"><div align="right"><strong><center>Fecha</center></strong></div></td>
    <td width="9%"><div align="right"><strong><center>Hora</center></strong></div></td>
    <td width="12%"><div align="right"><strong><center>Instructor</center></strong></div></td>
    <td width="12%"><div align="right"><strong><center>Lugar</center></strong></div></td>
   
  </tr>
</thead>
<tbody>
<?php 
	$mensaje='no';
	
    $can=mysqli_query($con,"SELECT registros.codigoc_registro, registros.dni_registro, registros.participa_registro, products.nombre_producto, registros.fecha_registro, registros.hora_registro, docentes.nombre_docente, lugares.nombre_lugar
FROM registros
INNER JOIN products ON products.id_producto = registros.id_curso_registro
INNER JOIN docentes ON docentes.id_docente = registros.id_instructor_registro
INNER JOIN lugares ON lugares.id_lugar = registros.id_lugar_registro");	
    while($dato=mysqli_fetch_array($can)){
		$cant=$dato['dni_registro'];
		$nombre_producto=$dato['nombre_producto'];
		$nombre_docente=$dato['nombre_docente'];
		$nombre_lugar=$dato['nombre_lugar'];
		if($cant>0){
			$mensaje='si';
?>
  <tr>

    <td><center><?php echo $dato['codigoc_registro']; ?></center></td>
    <td><div align="right"><center><?php echo $dato['dni_registro']; ?></center></div></td>
    <td><div align="left"><?php echo $dato['participa_registro']; ?></div></td>
     <td><div align="left"><?php echo $nombre_producto;?></div></td> 
    <td><div align="right"><center><?php echo $dato['fecha_registro']; ?></center></div></td>
    <td><div align="right"><center><?php echo $dato['hora_registro']; ?></center></div></td>
    <td><div align="left"><?php echo $nombre_docente;?></div></td> 
    <td><div align="left"><?php echo $nombre_lugar;?></div></td> 

  </tr>
<?php } }?>
  </tbody>
</table>
<?php	if($mensaje=='no'){
	echo '<div class="alert alert-success" align="center"><strong>No existen registros!</strong></div>'; 
	} ?><br><br>
</body>
</html>