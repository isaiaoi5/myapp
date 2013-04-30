<div class="span6 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Solicitar Libro
        </h1>
    </div>
</div>
<div class="span6 well">    
        <?php $atributos = array('class' => 'form-horizontal'); ?>
        <?php echo form_open('prestar/solicitarPrestamo/'.$libro.'/'.$usuario, $atributos); ?>
        <div class="control-group">
        <?php
            $labelTipoPrestamo = array(
                'class' => 'control-label',
            );
            $options = array(
                'En Sala' => 'En Sala',
                'En Casa' => 'En Casa'
            );
            $enviar = array(
                    'name'  => 'submit',
                    'id'    => 'submit',
                    'value' => 'Ingresar',
                    'class' => 'btn btn-primary'
            );
        ?>
        <?php echo form_label('Tipo de Prestamo', 'nom', $labelTipoPrestamo); ?>
        <div class="controls">            
            <?php echo form_dropdown('tipo', $options, null, "id='tipo' name='tipo' class='span2'"); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('tipo'); ?>
        </div>        
        <div class="controls">
            <?php echo form_submit($enviar); ?>
        </div>
        </div>
        <?php echo form_close(); ?>
    
</div>