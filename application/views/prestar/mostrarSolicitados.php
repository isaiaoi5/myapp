<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Libros Solicitados
        </h1>
    </div>
</div>
<div class="span8 well">
    <div class="accordion" id="acordion2">                         
        <?php foreach ($libros as $value) { ?>
            <?php $aux = ++$num ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion2" href="#demo<?php echo $aux ?>">
                            <h3><?php echo $aux ?> Tipo Prestamo: <?php echo $value->tipoPrestamo; ?></h3>
                            <p>Usuario solicitante : <?php echo $value->usuario; ?></p>                             
                        </a>                        
                </div>                
                <div id="demo<?php echo $aux ?>" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <label class="label label-info">
                            Libros
                        </label>
                        <div class="alert alert-info">
                            <?php
                                foreach ($value->libro as $lib) {
                                    echo $lib->titulo;
                                }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>        
        <?php } ?>
        <?php echo $enlaces; ?>        
    </div>
</div>