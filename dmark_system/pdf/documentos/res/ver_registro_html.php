<style type="text/css">
<!--
body{
         font-family: arial, helvetica, sans-serif;
            color: #000;
            background: #fff;
            padding:40px;
            text-align: center;
            line-height: 200%;
        }
        .logo{
            font-size: 30px;
        }
        .orange{
            color:orange;
        }
        .titulo{
            padding:45px 380px;
            font-size:30px;
			font-family: arial;
            font-weight: bold;
        }
           .descripcion{
            padding:5px 325px;
            font-size: 21px;
            font-family: arial;
            font-weight: bold;
        }
		.nombre{
            padding:-2px 430px;
            font-size: 20px;
            font-family: arial;
            font-weight: normal;
        }
		.hora{
            padding:1px 805px;
            font-size: 20px;
            font-family: arial;
            font-weight: normal;
        }
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >

       
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
              
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">

                
            </td>
			<td style="width: 25%;text-align:right">
			
			</td>
			
        </tr>
    </table>
	
       <br>
		
	<br>
	
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-weight:arial; font-size: 12pt;">
        
		<tr>
           <td style="width: 100%; color: #34495e;font-size:12px;text-align:center" >
			<?php 
				$sql_cliente=mysqli_query($con,"select participa_registro,fecha_registro,id_curso_registro, monthname(fecha_registro)as mes, hora_registro, nombre_producto from registros inner join products on registros.id_curso_registro=products.id_producto where id_registro='$id_registro' ");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				function mesLetra($mes){
				$mesetra=array();
				$mesetra['January'] = "Enero";
				$mesetra['February'] = "Febrero";
				$mesetra['March'] = "Marzo";
				$mesetra['April'] = "Abril";
				$mesetra['May'] = "Mayo";
				$mesetra['June'] = "Junio";
				$mesetra['July'] = "Julio";
				$mesetra['August'] = "Agosto";
				$mesetra['September'] = "Setiembre";
				$mesetra['October'] = "Octubre";
				$mesetra['November'] = "Noviembre";
				$mesetra['December'] = "Diciembre";

				return $mesetra[$mes];
				}
				
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
?>
		   </td>
		   </tr>
		   <tr>
		    <td class="titulo"><?php echo $rw_cliente['participa_registro'];?></td>
		    </tr>
			<tr>
		    <td class="descripcion"><?php echo $rw_cliente['nombre_producto'];?></td>
		    </tr>
		   <tr>
		    <td class="nombre"><?php echo date("d", strtotime($rw_cliente['fecha_registro']))." de  ".mesLetra($rw_cliente['mes'])." del  ".date("Y", strtotime($rw_cliente['fecha_registro']));?></td>
		    </tr>
		   <tr>
		    <td class="hora"><?php echo $rw_cliente['hora_registro'];?></td>
		    </tr>
     
    </table>
    <br>
    
       <br>
		
	<br>
  
    
	
	
	
	<br>
	
	
	
	  

</page>