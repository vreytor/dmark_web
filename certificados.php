<?php
	session_start();
	/* Connect To Database*/
	require_once ("dmark_system/config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("dmark_system/config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html>
<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Certificado D'MARK</title>	

		<meta name="keywords" content="dmarksys" />
		<meta name="description" content="dmarksys">
		<meta name="author" content="dmarksys.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.min.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">


		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css">	<script src="master/style-switcher/style.switcher.localstorage.js"></script>

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>
		<div class="body">
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 17, 'stickySetTop': '-17px', 'stickyChangeLogo': true}">
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									<a>
										<img alt="dmarksys" width="150" height="48" src="img/logo.svg">
									</a>
								</div>
							</div>
							
							<div class="header-column">
								<div class="header-row">
									<div class="header-nav">
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
											<i class="fa fa-bars"></i>
										</button>
										<nav>
										<ul class="header-social-icons social-icons hidden-xs" id="mainNav">
											<li class="social-icons-facebook"><a href="https://www.facebook.com/dmark.training/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
											<li class="social-icons-twitter"><a href="https://twitter.com/dmarksys" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
											<li class="social-icons-linkedin"><a href="https://www.linkedin.com/company/dmarksys/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
										</ul>
										</nav>
										<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
										<nav>
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown active">
														<a href="index.html">
															Inicio
														</a>
													</li>
													<li>
														<a href="nosotros.html">
															Nosotros
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-toggle" href="#">Capacitación</a>
														<ul class="dropdown-menu">
															<li><a href="induccion.html">Inducción General</a></li>
															<li>
																		<a href="materia_prevencionn.html">Capacitación en SSO - Minería</a>
																		
															</li>
															
															<li >
																		<a href="seguridad_construccionn.html">Capacitación en SSO - Industria y Construcción</a>
																		
															</li>
															<li >
																		<a href="seguridad_viall.html">Gestión vehicular y seguridad vial</a>
																		
															</li>
															<li >
																		<a href="izajes_cargaa.html">Izajes de carga</a>
																		
															</li>
															<li >
																		<a href="maquinaria_pesadaa.html">Maquinaria pesada</a>
																		
				
															</li>
															<li >
																		<a href="resp_emergenciaa.html">Respuesta a emergencia</a>
																		
															</li>
															
														</ul>
													</li>
													<li class="dropdown">
														<a class="dropdown-toggle" href="#">Servicios</a>
														<ul class="dropdown-menu">
															<li>
																		<a href="gestion_auditoriaa.html">Gestión y auditoria HSEQ</a>
															</li>
															<li>
																		<a href="diplomados_hsee.html">Diplomados HSE</a>
                                                            </li>
															<li>		<a href="intermediacion_laboral.html">Intermediación laboral</a>
                                                            
                                                            </li>
															<li>
																		<a href="gestion_transitoo.html">Gestión en tránsito</a>
															</li>
															<li><a href="respuesta_emergencias.html">Respuesta a emergencias</a></li>
															<li><a href="brigadas.html">Brigadas de emergencia</a></li>
															<li><a href="hse_campo.html">HSE en campo</a></li>
															<li>
																<a href="equipos_izajese.html">Equipos de Izajes y Operadores</a>
														    </li>
                                                            <li>
																<a href="programa_capacitacion.html">Programa de Capacitación</a>
														    </li>															
														</ul>
													</li>
                                                    
                                                    <li class="dropdown">
														<a class="dropdown-toggle" href="#">Programas</a>
														<ul class="dropdown-menu">
															<li>
																		<a href="training_driver/entrenando_al_conductor ">Entrenando al Conductor</a>
																		<a href="index.html">Seguridad en Maniobras de Izaje </a>
															</li>
																														
														</ul>
													</li>
                                                    
                                                                                                     
													<li class="dropdown">
													<li>
														<a href="galeria.html">GALERÍA</a>
													</li>
                                                    
													<li class="dropdown">
														<a class="dropdown-toggle" href="accesos">Accesos</a>
														<ul class="dropdown-menu">
																			<li><a href="trabajo_dmark.html">Trabaja con Nosotros</a></li>
																			<li><a href="siscod.html">Sistema de Gestión</a></li>
																			<li><a href="certificados.php">Certificados</a></li>
																			<li><a href="dmark_system/index.php" target="_blank">Login D'MARK</a></li>
														</ul>
													</li>
													
                                                    <li>
														<a href="contactenos.html">Contáctenos</a>
													</li>
                                                   </li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Inicio</a></li>
									<li class="active">Certificado</li>
								</ul>
							</div>
						</div>

					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-12">

							<div class="alert alert-info">
								<p><strong>Info: </strong> Ahora donde te encuentres puedes revisar el número de tu certificado con solo digitar su DNI</p>
							</div>

							<form method="POST" action="" onSubmit="return validarForm(this)">
								<div class="input-group">
									<input class="form-control" placeholder="Ingresar DNI" name="palabra" id="palabra" type="text" required>
									<span class="input-group-btn">
										<button type="submit" value="Buscar" name="buscar" class="btn btn-primary"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>
											<?php  
											//si existe una petición  
											if(isset($_POST['buscar'])){
												?>
											   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
								<div class="table-responsive">
											   <table class="table table-bordered table-striped table-condensed mb-none">
													<thead>
														<tr>
															<th class="text-center">CERTIFICADO</th>
															<th class="text-center">DNI</th>
															<th class="text-center">PARTICIPANTE</th>
															<th class="text-center">CURSO</th>
															<th class="text-center">FECHA</th>
														</tr>
													</thead>
															   <?php
															   //obtenemos la información introducida anteriormente desde nuestro buscador PHP
															   $buscar = $_POST['palabra'];
															   $consulta_mysql= mysqli_query ($con,"SELECT * FROM registros INNER JOIN products ON products.id_producto = registros.id_curso_registro WHERE dni_registro like '%$buscar%' or participa_registro like '%$buscar%'");
															   while($registro = mysqli_fetch_array($consulta_mysql)) 
															   {
																   ?> 
															<tr>
																<td class="text-center"><?=$registro['codigoc_registro']?></td>
																<td class="text-center"><?=$registro['dni_registro']?></td>
																<td><?=$registro['participa_registro']?></td>
																<td><?=$registro['nombre_producto']?></td>
																<td class="text-center"><?=$registro['fecha_registro']?></td>
															</tr><br>
													   <?php 
													   
															   } 
											 
												?>
												
												</table> <br><br><center><a href="javascript:window.print()" class="btn btn-success"><i class="icon-print"></i>Imprimir</a></center>	  
												<?php
														
													} 
												
											?>
												<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
								</div>
						</div>
					</div>
				</div>
			</div>

			<footer id="footer">	
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
								<nav id="sub-menu">
								<ul>
										<li><a >Mapa del Sitio</a></li>
										<li><a >Contáctenos</a></li>
									</ul>
								</nav>
							<div class="col-md-12 center">
								<p> <i class="fa fa-map-marker"></i>  Av. Oscar R. Benavides 4226 - Urb. El Aguila - Bellavista Callao<span class="separator">|</span> Jr. Historia N° 484, Cajamarca<span class="separator">|</span> <i class="fa fa-phone"></i> 076 600293 Cel:976597530<span class="separator">|</span> <i class="fa fa-envelope"></i> inscripciones.entrenamiento@dmarksys.com</p>
								<ul class="social-icons mb-md">
								
								<li class="social-icons-facebook"><a href="https://www.facebook.com/dmark.training/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-twitter"><a href="https://twitter.com/dmarksys" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								
								<li class="social-icons-linkedin"><a href="https://www.linkedin.com/company/dmarksys/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="master/style-switcher/style.switcher.js" id="styleSwitcherScript" data-base-path="" data-skin-src=""></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/common/common.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/vide.min.js"></script>
		 
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
				
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>	


		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-42715764-5', 'auto');
			ga('send', 'pageview');
			$(window).load(function() {
    $('.sort-source a').on('click', function() {
        setTimeout(function() {
			setPopups();
		}, 300);
    });
	 function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     } 
		</script>
		<script src="master/analytics/analytics.js"></script>

	</body>
</html>