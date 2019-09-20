<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>RST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/style.min.css" rel='stylesheet' type='text/css' />
        <!-- Graph CSS -->
        <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        <script src="<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/amcharts.js"></script>	
        <script src="<?php echo base_url(); ?>js/serial.js"></script>	
        <script src="<?php echo base_url(); ?>js/light.js"></script>	
        <script src="<?php echo base_url(); ?>js/radar.js"></script>	
        <link href="<?php echo base_url(); ?>css/barChart.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url(); ?>css/fabochart.css" rel='stylesheet' type='text/css' />
        <!--clock init-->
        <script src="<?php echo base_url(); ?>js/css3clock.js"></script>
        <!--Easy Pie Chart-->
        <!--skycons-icons-->
        <script src="<?php echo base_url(); ?>js/skycons.js"></script>

        <script src="<?php echo base_url(); ?>js/jquery.easydropdown.js"></script>

        <!--//skycons-icons-->
    </head> 
    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content" style="background-color: #FFFFFF">
                <div class="inner-content">
                    <!-- header-starts -->
                    <div class="header-section">
                        <!--menu-right-->
                        <div class="top_menu">

                            <!--/profile_details-->
                            <div class="profile_details_left">
                                <ul class="nofitications-dropdown">

                                    <?php
                                    if ((count($this->M_soporte->obtener_usuario($this->session->userdata('username')))) == 1) {
                                        if (($this->M_soporte->obtener_usuario($this->session->userdata('username'))[0]['estado']) == 't')
                                            $cantidad_de_pendiente = count($this->M_soporte->obtener_pendientes());
                                        ?>

                                        <li class="dropdown note">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge"><?php echo $cantidad_de_pendiente ?></span></a>

                                            <ul class="dropdown-menu two">
                                                <li>
                                                    <div class="notification_header">
                                                        <h3>Hay <?php echo $cantidad_de_pendiente ?> nuevas solicitudes de soporte</h3>
                                                    </div>
                                                </li>
                                                <?php foreach ($this->M_soporte->obtener_pendientes() as $pendientes) {
                                                    ?>
                                                    <li><a href="<?php echo base_url().'formulario/atencion/'.$pendientes['id']; ?>">
                                                            <div class="notification_desc">
                                                                <p><?php echo $this->auth_ad->get_all_user_data($pendientes['solicitante'])['cn'][0] ?> <br> <?php echo $this->auth_ad->get_all_user_data($pendientes['solicitante'])['department'][0] ?></p>
                                                                <p><span><?php echo $pendientes['fecha_hora_solicitud'] ?></span></p>
                                                            </div>
                                                            <div class="clearfix"></div>	
                                                        </a></li>

                                                <?php } ?>
                                               
                                                
                                                
                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <div class="clearfix"></div>	
                                </ul>
                            </div>
                            <div class="clearfix"></div>	
                            <!--//profile_details-->
                        </div>
                        <!--//menu-right-->
                        <div class="clearfix"></div>
                    </div>




                    <!-- //header-ends -->