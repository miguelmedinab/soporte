<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>RST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!--clock init-->
    </head> 
    <body>
        <!--/login-->

        <div class="error_page">
            <!--/login-top-->

            <div class="error-top">

                <div class="login">
                    <h3 class="inner-tittle t-inner">Iniciar Sesion</h3>

                     <?php  echo form_open(base_url().'inicio/autenticar'); ?>
                        <input type="text" class="text" value="Usuario" name='usuario' onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Usuario';
                                }" >
                        <input type="password" value="Contraseña" name='password' onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Contraseña';
                                }">
                        <div class="submit"><input type="submit" onclick="myFunction()" value="Ingresar" ></div>
                        <div class="clearfix"></div>


                     <?php echo form_close();?>
                </div>


            </div>


            <!--//login-top-->
        </div>

        <!--//login-->
        <!--footer section start-->
        <div class="footer">

            <p>&copy 2019 DICIE | Unidad de Informatica </p>
        </div>
        <!--footer section end-->
        <!--/404-->
        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>