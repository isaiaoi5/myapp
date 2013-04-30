<div class="span6 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Editorial
    </div>
</div>
<div class="span6 well">    
        <?php $atributos = array('class' => 'form-horizontal'); ?>
        <?php echo form_open('editorial/registrarEditorial', $atributos); ?>
        <div class="control-group">
        <?php
            $labelNombre = array(
                'class' => 'control-label',
            );
            $textoNombre = array(
                'id'            => 'nombre',
                'name'          => 'nombre',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Nombre del Autor',                             
                'value'         => set_value('nombre'),
            );
            $labelAnio = array(
                'class' => 'control-label',
            );
            $textoAnio = array(
                'id'            => 'anio',
                'name'          => 'anio',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Año de la Edicion',                             
                'value'         => set_value('anio'),
            );
            $enviar = array(
                    'name'  => 'submit',
                    'id'    => 'submit',
                    'value' => 'Ingresar',
                    'class' => 'btn btn-primary'
            );
        ?>
        <?php echo form_label('Nombre del Autor', 'nom', $labelNombre); ?>
        <div class="controls">            
            <?php echo form_input($textoNombre); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nombre'); ?>
        </div>
        <?php echo form_label('Año', 'an', $labelAnio); ?>
        <div class="controls">            
            <?php echo form_input($textoAnio); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('anio'); ?>
        </div>
        <div class="controls">
            <?php echo form_submit($enviar); ?>
        </div>
        </div>
        <?php echo form_close(); ?>
    
</div>