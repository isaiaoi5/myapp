<div class="span8 well">
    <h1>
        Registro de Usuario
    </h1>
</div>
<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        Formulario de Registro
    </div>
    <?php $atributos = array('class' => 'form-horizontal'); ?>
    <?php echo form_open('usuario/registrarUsuario', $atributos); ?> 
    <div class="control-group">
        <?php
            $labelNombre = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelApellido = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelCi = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelTipoUsuario = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelLogin = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelPassword = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );                       
            $texto_nombre = array(
                'id'            => 'nombre',
                'name'          => 'nombre',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Nombre',
                'class'         => 'input-xlarge',                               
                'value'         => set_value('nombre'),
            );
            $texto_apellido = array(
                'id'            => 'apellido',
                'name'          => 'apellido',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Apellidos',
                'class'         => 'input-xlarge',
                'value'         => set_value('apellido')
            );
            $texto_ci = array(
                'id'            => 'ci',
                'name'          => 'ci',
                'required'      => 'required',               
                'placeholder'   => 'Cedula de Identidad',
                'class'         => 'input-xlarge',                
                'value'         => set_value('ci')
            );
            $texto_login = array(
                'id'            => 'login',
                'name'          => 'login',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Nombre de usuario',                
                'class'         => 'input-xlarge',                
                'value'         => set_value('login')
            );
            $texto_password = array(
                'id'            => 'password',
                'name'          => 'password',
                'required'      => 'required',
                'type'          => 'password',
                'placeholder'   => 'Contraseña',
                'class'         => 'input-xlarge',
            );
            $options = array(
                  'Administrador'     => 'ADMINISTRADOR',
                  'Bibliotecario'     => 'BIBLIOTECARIO',
            );
            $enviar = array(
                    'name'  => 'submit',
                    'id'    => 'submit',
                    'value' => 'Registrar Datos',
                    'class' => 'btn btn-primary'
            );
        ?>
        
        <?php echo form_label('Nombre', 'nombres', $labelNombre); ?>
        <div class="controls">            
            <?php echo form_input($texto_nombre); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nombre'); ?>
        </div>
        <?php echo form_label('Apellido', 'apellidos', $labelApellido); ?>
        <div class="controls">            
            <?php echo form_input($texto_apellido); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('apellido'); ?>
        </div>
        <?php echo form_label('C.I.', 'cedula', $labelCi); ?>
        <div class="controls">            
            <?php echo form_input($texto_ci); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('ci'); ?>
        </div>
        <?php echo form_label('Tipo de Usuario', 'tipUsuario', $labelTipoUsuario); ?>
        <div class="controls">            
            <?php echo form_dropdown('tipoUsuario', $options, null, "id='tipoUsuario' class='span4'"); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('tipoUsuario'); ?>
        </div>
        <?php echo form_label('Nombre de Usuario', 'login', $labelLogin); ?>
        <div class="controls">            
            <?php echo form_input($texto_login); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('login'); ?>
        </div>
        <?php echo form_label('Password', 'password', $labelPassword); ?>
        <div class="controls">            
            <?php echo form_input($texto_password); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('password'); ?>
        </div>
        <div class="controls">
            <?php echo form_submit($enviar); ?>
        </div>
    </div>
    <?php form_close(); ?>
</div>
