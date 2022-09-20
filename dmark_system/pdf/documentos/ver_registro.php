<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	$id_registro= intval($_GET['id_registro']);
	$sql_count=mysqli_query($con,"select * from registros where id_registro='".$id_registro."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Registro no encontrada')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_registro=mysqli_query($con,"select * from registros where id_registro='".$id_registro."'");
	$rw_registro=mysqli_fetch_array($sql_registro);
	$dni_registro=$rw_registro['dni_registro'];
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/ver_registro_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('L', 'mm', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Registros.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
