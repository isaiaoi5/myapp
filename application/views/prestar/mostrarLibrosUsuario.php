<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Libros Prestados
        </h1>
    </div>
</div>
<?php $aux = 0; ?>
<div class="span8 well">
    <div class="accordion" id="acordion2">                         
        <?php foreach ($libros as $value) { ?>
            <?php $aux = ++$aux; ?>
            <div class="accordion-group">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion2" href="#demo<?php echo $aux ?>">
                    <h3><?php echo $aux ?> Libro: <?php echo $value->titulo; ?></h3>                            
                </a> 
            </div>
            <div id="demo<?php echo $aux ?>" class="accordion-body collapse">
                <div class="accordion-inner">
                    <label class="label label-info">
                            Apellido del libro
                    </label>
                    <div class="alert alert-info">
                        <?php echo $value->apellido; ?>
                    </div>
                    <label class="label label-info">
                            Descripción
                    </label>
                    <div class="alert alert-info">
                        <?php echo $value->descripcion; ?>
                    </div>
                    <label class="label label-info">
                            Fecha de solicitud
                    </label>
                    <div class="alert alert-info">
                        <?php echo $value->FechaSolicitud; ?>
                    </div>
                    <label class="label label-info">
                            Fecha que Recogiste el Libro
                    </label>
                    <div class="alert alert-info">
                        <?php echo $value->fechaEntrega; ?>
                    </div>
                    <label class="label label-info">
                            Fecha de Devolución
                    </label>
                    <div class="alert alert-info">
                        <?php echo $value->fechaDevolucion; ?>
                    </div>
                </div>            
            </div>
        <?php } ?>
    </div>
</div>
