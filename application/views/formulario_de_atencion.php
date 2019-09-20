<script>
    function validar() {
        var campo_descripcion = document.getElementById('descripcion_de_solucion').value;
        if (campo_descripcion.length == 0) {
            alert('Ingrese descripcion del servicio realizado');
            return false;
        }
    }

</script> 
<div class="outter-wp">
    <!--/forms-->
    <div class="forms-main">
        <h2 class="inner-tittle">Formulario de Registro de Soporte</h2>
        <div class="graph-form">
            <div class="validation-form">
                <!---->

                <?php echo form_open(base_url() . 'formulario/registrar_atencion', array('onsubmit' => 'return validar();')); ?>

                <div class="row">

                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="width: 33%">
                        <h3 class="box-title m-b-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Usuario Solicitante</b></font></font></h3>

                        <div class="form-group">                   
                            <label class="col-sm-12"><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;">Numero de Ticket:</font></font></label>
                            <div class="col-sm-12">
                                <span class="help-block"><small><font style="vertical-align: inherit;"><?php echo $info_soporte[0]['id'] ?></font></small></span>
                                <input type="hidden" name="id_soporte" id="id_soporte" value="<?php echo $info_soporte[0]['id'] ?>">
                            </div>
                        </div>


                        <div class="form-group">                   
                            <label class="col-sm-12"><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;">Nombre:</font></font></label>
                            <div class="col-sm-12">
                                <span class="help-block"><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo$this->auth_ad->get_all_user_data($info_soporte[0]['solicitante'])['cn'][0] ?></font></font></small></span>
                            </div>
                        </div>
                        <div class="form-group">                   
                            <label class="col-sm-12"><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;">Oficina:</font></font></label>
                            <div class="col-sm-12">
                                <span class="help-block"><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo$this->auth_ad->get_all_user_data($info_soporte[0]['solicitante'])['department'][0] ?></font></font></small></span>
                            </div>
                        </div>



                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="width: 33%">
                        <h3 class="box-title m-b-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Problema Reportado</b></font></font></h3>

                        <div class="form-group">                   
                            <label class="col-sm-12"><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;">Descripcion Rapida:</font></font></label>
                            <?php
                            foreach ($info_fallas as $fallas) {
                                ?>
                                <div class="col-sm-12">
                                    <span class="help-block"><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $fallas['descripcion'] ?></font></font></small></span>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="form-group">                   
                            <label class="col-sm-12"><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;">Descripcion Detallada:</font></font></label>

                            <div class="col-sm-12">
                                <span class="help-block"><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $info_soporte[0]['falla_descriptiva'] ?></font></font></small></span>
                            </div>

                        </div>


                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="width: 33%">
                        <h3 class="box-title m-b-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Servicio Realizado</b></font></font></h3>
                        <div class="form-group">                   
                            <label class="col-sm-12"><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;">Detalle del servicio realizado:</font></font></label>

                            <div class="col-sm-12">
                                <input id="descripcion_de_solucion" type="text" class="form-control" placeholder="Descripcion de la solucion" name="descripcion_de_solucion"> 
                            </div>

                        </div>



                    </div>
                    
                   

                    <div class="col-md-12 form-group button-2">
                        <button type="submit" class="btn blue">Cerrar Caso</button>
                        <!--<button type="reset" class="btn btn-default">Limpiar</button>-->
                        
                        <a class="btn yellow" href="<?php echo base_url() . 'formulario/imprimir_formulario/'.$info_soporte[0]['id'] ?>" target="_blank"><font style="vertical-align: inherit;">Imprimir Formulario</font></a>
                        <a class="btn red" href="<?php echo base_url() . 'inicio/cargar_formulario_de_pedido_de_soporte' ?>"><font style="vertical-align: inherit;">Cancelar</font></a>         
                    </div>
                    <div class="clearfix"> </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div> 					   
    </div>
</div>