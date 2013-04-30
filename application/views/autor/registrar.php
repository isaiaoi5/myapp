<div class="span6 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Autor
    </div>
</div>
<div class="span6 well">    
        <?php $atributos = array('class' => 'form-horizontal'); ?>
        <?php echo form_open('autor/registrarAutor', $atributos); ?>
        <div class="control-group">
        <?php
            $labelNombre = array(
                'class' => 'control-label',
            );
            $labelApellido = array(
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
            $textoApellido = array(
                'id'            => 'apellido',
                'name'          => 'apellido',
                'required'      => 'required',
                'type'          => 'text',                
                'placeholder'   => 'Apellido del Autor',
                'value'         => set_value('apellido')
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
        <?php echo form_label('Apellido del Autor', 'apel', $labelApellido); ?>
        <div class="controls">            
            <?php echo form_input($textoApellido); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('apellido'); ?>
        </div>
        <div class="controls">
            <?php echo form_submit($enviar); ?>
        </div>
        </div>
        <?php echo form_close(); ?>
    
</div>