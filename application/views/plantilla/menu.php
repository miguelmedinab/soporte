<div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>RST</h1></span> 
        <!--<img id="logo" src="" alt="Logo"/>-->
        </a> 
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">	
        <a href="index.html"><img src="<?php echo base_url(); ?>images/perfil.png"></a>
        <a href="index.html"><span class=" name-caret"><?php echo $this->session->userdata('cn') ?></span></a>
        <p><?php echo $this->session->userdata('title') ?><br><?php echo$this->auth_ad->get_all_user_data($this->session->userdata('username'))['department'][0] ?></p>

        <ul>

            <li><a class="tooltips" href="<?php echo base_url(); ?>inicio/salir"><span>Salir</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <?php
    if ((count($this->M_soporte->obtener_usuario($this->session->userdata('username')))) == 1) {
        if (($this->M_soporte->obtener_usuario($this->session->userdata('username'))[0]['estado']) == 't') {
            ?>
            <div class="menu">
                <ul id="menu" >
                    <li><a href='<?php echo base_url(); ?>inicio/cargar_cuadro_de_mando'><i class="fa fa-tachometer"></i> <span>Inicio</span></a></li>


                    <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Registro de Servicio</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul id="menu-academico-sub" >
                            <li id="menu-academico-avaliacoes" ><a href='<?php echo base_url(); ?>formulario'>Formulario de atencion</a></li>
                        </ul>
                    </li>

                    <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Reportes</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul id="menu-academico-sub" >
                            <li id="menu-academico-avaliacoes" ><a href="grids.html">Reportes por mes</a></li>
                            <li id="menu-academico-boletim" ><a href="media.html">Reportes por Tecnico</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
        <?php
        }
    }
    ?>
</div>