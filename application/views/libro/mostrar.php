<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Libros
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
                            <h3><?php echo $aux ?> Titulo: <?php echo $value->titulo; ?></h3>
                            <p>Signatura Topográfica : <?php echo $value->area; ?> <?php echo $value->apellido; ?></p> 
                            <p class="btn btn-info btn-mini">
                                <?php
                                $auxi = $value->contador - $value->prestados1;
                                if ($auxi <= 0) {
                                    echo 'No disponible ';
                                } else {
                                    echo $auxi . ' Libros Disponibles '.$value->solicitado.' Solicitudes ';
                                }
                                ?>
                            </p>
                        </a>                        
                </div>                
                <div id="demo<?php echo $aux ?>" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <label class="label label-info">
                            Descripción
                        </label>
                        <div class="alert alert-info">
                            <?php echo $value->descripcion; ?>
                        </div> 
                        <label class="label label-info">
                            Autor y Editorial
                        </label>
                        <div class="alert alert-info">
                            <?php echo $value->Autor_id; ?></br>
                            <?php echo $value->Editorial_id; ?>
                        </div>
                        <label class="label label-info">
                            Cantidad de Libros
                        </label>
                        <div class="alert alert-info">
                            <?php echo $value->contador; ?>
                        </div>
                         <label class="label label-info">
                            Precio Libro
                        </label>
                        <div class="alert alert-info">
                            <p class="label label-success">Precio Unitario:</p>
                            <?php
                                $cn = 0;
                                $a  = 0;
                                foreach ($value->precio as $val) {
                                    $cn = $cn + $val;
                                    ++$a;
                            ?>                            
                            <p>
                                <?php
                                        echo $a.'.- '.$val.' Bs.';
                                ?>
                            </p>
                                <?php
                                    }
                                ?> 
                            
                            <p class="label label-success">Precio Total: <?php echo $cn; ?> Bs.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php echo $enlaces; ?>        
    </div>
</div>
