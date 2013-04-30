<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Libros
        </h1>
    </div>
</div>
<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <?php echo anchor('prestar/solicitar', 'Realizar nueva busqueda de Libros','class="btn btn-warning btn-mini"'); ?>
    </div>
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
                                    echo $auxi . ' Libros Disponibles '.$value->solicitado.' Libros Solicitados ';
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
                        <label class="label label-info">
                            Solicitar Prestamo
                        </label>
                        <div class="alert alert-info">
                            <?php
                                $auxi = $value->contador - $value->prestados1;
                                if ($auxi <= 0) {
                            ?>                           
                                    <a class="btn btn-danger btn-mini disabled" data-toggle="modal" href="#solicitar" >Solicitar Prestamo de Libro</a>
                            <?php
                            } else {
                                $data = array(
                                    'class' => 'btn btn-success btn-mini'
                                );
                                echo anchor('prestar/solicitarUna/'.$value->idLibro.'/'.$ayu=1, 'Solicitar Prestamo de Libro', $data);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>        
        <?php } ?>
        <div class="pagination pagination-centered">
            <?php echo $enlaces; ?> 
        </div>               
    </div>
</div>
<div class="span8 modal hide fade" id="solicitar">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Solicitar libro</h3>
    </div>
    <div class="modal-body">
        <p>
            Por ahora el libro no puede ser solicitado
        </p>
    </div>   
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" >Cerrar</a>
    </div>
</div>
<div class="span8 modal hide fade" id="solicitar1">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Solicitar libro</h3>
    </div>
    <div class="modal-body">
        <?php
        $data['libro']  = $value->idLibro;
        $data['usuario']= 1;
        $this->load->view('prestar/Solicitar', $data); 
        ?>
    </div>   
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" >Cerrar</a>
    </div>
</div>