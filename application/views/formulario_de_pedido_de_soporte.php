<script>
    function validar() {
        var ok = 0;
        var ckbox = document.getElementsByName('ats[]');
        var campo_descripcion = document.getElementById('descripcion_de_falla').value;
        for (var i = 0; i < ckbox.length; i++) {
            if (ckbox[i].checked == true) {
                ok = 1;
            }
        }

        if (ok == 0 && campo_descripcion.length == 0) {
            alert('Seleccion al menos una falla o describala');
            return false;
        }
    }

</script> 
<div class="outter-wp">
    <!--/forms-->
    <div class="forms-main">
        <h2 class="inner-tittle">Formulario de Solicitud de Soporte</h2>
        <div class="graph-form">
            <div class="validation-form">
                <!---->

                <?php echo form_open(base_url() . 'inicio/cargar_notificacion', array('onsubmit' => 'return validar();')); ?>

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="width: 33%">
                        <h3 class="box-title m-b-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Asistencia Tecnica en Sitio</b></font></font></h3>
                        <?php
                        foreach ($catalogo_de_fallas as $fallas) {
                            if ($fallas['tipo'] == 1) {
                                ?>
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" name="ats[]" value="<?php echo $fallas['id'] ?>">
                                    <label for="checkbox1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php echo $fallas['descripcion'] ?></font></font></label>
                                </div>
                            <?php
                            }
                        }
                        ?>



                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="width: 33%">
                        <h3 class="box-title m-b-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Revision y/o mantenimiento</b></font></font></h3>
                        <?php
                        foreach ($catalogo_de_fallas as $fallas) {
                            if ($fallas['tipo'] == 2) {
                                ?>
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" name="ats[]" value="<?php echo $fallas['id'] ?>">
                                    <label for="checkbox1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php echo $fallas['descripcion'] ?></font></font></label>
                                </div>
    <?php
    }
}
?>



                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="width: 33%">
                        <h3 class="box-title m-b-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Instalar / Reinstalar programas</b></font></font></h3>
<?php
foreach ($catalogo_de_fallas as $fallas) {
    if ($fallas['tipo'] == 3) {
        ?>
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" name="ats[]" value="<?php echo $fallas['id'] ?>">
                                    <label for="checkbox1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <?php echo $fallas['descripcion'] ?></font></font></label>
                                </div>
    <?php
    }
}
?>



                    </div>
                    <div class="form-group">                   
                        <label class="col-sm-12"><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;">Otro problema</font></font></label>
                        <div class="col-sm-12">
                            <input id="descripcion_de_falla" type="text" class="form-control" placeholder="Descripcion del problema" name="descripcion_de_falla"> <span class="help-block"><small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Utilice este espacio para describir su problema</font></font></small></span> </div>
                    </div>
                    <div class="col-md-12 form-group button-2">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-default">Limpiar</button>
                    </div>
                    <div class="clearfix"> </div>
<?php echo form_close(); ?>
                </div>
            </div>
        </div> 					   
    </div>
</div>