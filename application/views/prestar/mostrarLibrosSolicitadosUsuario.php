<script>
function confirmar()
{
	if(confirm('¿Estas seguro de Realizar el Prestamo?'))
		return true;
	else
		return false;
}
</script>


<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Libros <?php echo 'Solicitados por '.$usuario;?>
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
                    <label class="label label-info">
                            Prestar
                    </label>
                    <div class="alert alert-info">                            
                            <?php
                                $auxi = $value->contador - $value->prestados1;
                                if ($auxi <= 0) {
                            ?>                           
                                <a class="btn btn-danger btn-mini disabled" data-toggle="modal" href="#solicitar" >Realizar Prestamo de Libro</a>
                            <?php
                                } else {
                                    $data = array(
                                        'class'     => 'btn btn-success btn-mini',
                                        'onclick'   => 'return confirmar()'
                                    );
                                    echo anchor('prestar/prestarOk/' . $value->idPrestar.'/'.$idUsuario, 'Realizar Prestamo de Libro', $data);
                                }
                            ?>
                        </div>
                </div>            
            </div>
        <?php } ?>
    </div>
</div>

<div class="span8 modal hide fade" id="solicitar">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Solicitar libro</h3>
    </div>
    <div class="modal-body">
        <p>
            Por ahora el libro no puede ser Prestado
        </p>
    </div>   
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" >Cerrar</a>
    </div>
</div>