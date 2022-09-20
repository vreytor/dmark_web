<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM registros where codigoc_registro like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_registro=$row['id_registro'];
		$row_array['value'] = $row['codigoc_registro'];
		$row_array['id_registro']=$id_registro;
		$row_array['codigoc_registro']=$row['codigoc_registro'];
		$row_array['ticc_registro']=$row['ticc_registro'];
		$row_array['foto_registro']=$row['foto_registro'];
		$row_array['dni_registro']=$row['dni_registro'];
		$row_array['participa_registro']=$row['participa_registro'];
		$row_array['id_empresa_registro'] = $row['id_empresa_registro'];
		$row_array['id_area_registro']=$row['id_area_registro'];
		$row_array['id_empresa1_registro']=$row['id_empresa1_registro'];
		$row_array['id_cargo_registro']=$row['id_cargo_registro'];
		$row_array['id_fecha_registro']=$row['id_fecha_registro'];
		$row_array['id_curso_registro']=$row['id_curso_registro'];
		$row_array['ingreso_registro']=$row['ingreso_registro'];
		$row_array['estadu_registro']=$row['estadu_registro'];
		$row_array['salida_registro']=$row['salida_registro'];
		$row_array['condicion_registro']=$row['condicion_registro'];
		$row_array['id_instructor_registro']=$row['id_instructor_registro'];
		$row_array['id_empresa2_registro']=$row['id_empresa2_registro'];
		$row_array['asiste_registro']=$row['asiste_registro'];
		$row_array['modulo_registro']=$row['modulo_registro'];
		$row_array['hora_registro']=$row['hora_registro'];
		$row_array['id_lugar_registro']=$row['id_lugar_registro'];
		array_push($return_arr,$row_array);
    }

}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>