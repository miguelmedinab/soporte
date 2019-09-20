<div class="outter-wp">
    <style>
        .embed-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }
        .embed-container iframe {
            position: absolute;
            top:0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <div class="embed-container">
        <?php echo base_url('formulario/imprimir_formulario/').$numero_de_servicio ?>
        <iframe width="560" height="315" src="<?php echo base_url('formulario/imprimir_formulario/').$numero_de_servicio ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>