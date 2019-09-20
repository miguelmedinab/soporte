<!--footer section start-->      
<footer>
                        <p>&copy 2019 DICIE | Unidad de Informatica</p>
                    </footer>
                    <!--footer section end-->
                </div>
            </div>
            <!--//content-inner-->
            <!--/sidebar-menu-->
         <?php include 'menu.php'; ?>
            <div class="clearfix" style="background-color: #FFFFFF"></div>		
        </div>
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function () {
                if (toggle)
                {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position": "absolute"});
                } else
                {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function () {
                        $("#menu span").css({"position": "relative"});
                    }, 400);
                }

                toggle = !toggle;
            });
        </script>
        <!--js -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/vroom.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/vroom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/TweenLite.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/CSSPlugin.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    </body>
</html>