<script type="text/javascript">
<?php echo $prov_js; ?> 
        $(document).on('ready', function(){
        cargarNivel1();
        
        $('#nivel1').change(cargarNivel1);                    
        $('#nivel2').change(cargarDistritos);                                       
        $('#nivel3').change(imprimirDetalle); 
        
    });    
</script>
<div class="span8 well">
    <h1>
        Registro de Libro
    </h1>
</div>
<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        Formulario de Registro
    </div>
    <?php $atributos = array('class' => 'form-horizontal'); ?>
    <?php echo form_open('libro/registrarLibro', $atributos); ?> 
    <div class="control-group">
        <?php
            $labelPrecio = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelEstado = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $label_libro = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelAutor = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelArea = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelEditorial = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelApellido = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelCantidad = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelMateria = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelNivel2 = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelNivel3 = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );
            $labelDescripcion = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );            
            $texto_libro = array(
                'id'            => 'libro',
                'name'          => 'libro',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Titulo Del Libro',
                'class'         => 'input-xlarge',                               
                'value'         => set_value('libro'),
            );
            $texto_area = array(
                'id'            => 'area',
                'name'          => 'area',
                'required'      => 'required',
                'type'          => 'text',
                'class'         => 'input-xlarge',
                'value'         => set_value('area')
            );
            $textoDescripcion = array(
                'id'            => 'descripcion',
                'name'          => 'descripcion',
                'required'      => 'required',               
                'placeholder'   => 'Descripción del Libro',
                'class'         => 'input-xlarge',                
                'value'         => set_value('descripcion')
            );
            $textoApellido = array(
                'id'            => 'apel',
                'name'          => 'apel',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Apellido del Libro',                
                'class'         => 'input-xlarge',                
                'value'         => set_value('apel')
            );
            $textoPrecio = array(
                'id'            => 'precio',
                'name'          => 'precio',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Precio Unitario Del Libro',
                'class'         => 'input-xlarge',
                'value'         => set_value('precio'),
            );
            $textoEstado = array(
                'id'            => 'estado',
                'name'          => 'estado',
                'required'      => 'required',
                'type'          => 'text',
                'placeholder'   => 'Estado Del Libro',
                'class'         => 'input-xlarge',
                'value'         => set_value('estado')
            );
            $options = array(
                  '1'     => '1',
                  '2'     => '2',
                  '3'     => '3',
                  '4'     => '4',
                  '5'     => '5',
                  '6'     => '6',
                  '7'     => '7',
                  '8'     => '8',                
                  '9'     => '9',
                  '10'    => '10',
                  '11'    => '11',
            );
            $enviar = array(
                    'name'  => 'submit',
                    'id'    => 'submit',
                    'value' => 'Ingresar',
                    'class' => 'btn btn-primary'
            );
        ?>
        <?php echo form_label('Titulo del Libro', 'titulo', $label_libro); ?>
        <div class="controls">            
            <?php echo form_input($texto_libro); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('libro'); ?>
        </div>
        <?php echo form_label('Dewey Nivel 1', 'materia', $labelMateria); ?>
        <div class="controls">
            <?php echo form_dropdown('nivel1', $dptos, 1, "id='nivel1' value='set_value('nivel1')'"); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nivel1'); ?>
        </div>
        <?php echo form_label('Dewey Nivel 2', 'materia2', $labelNivel2); ?>
        <div class="controls">
            <?php echo form_dropdown('nivel2', array(), null, "id='nivel2'"); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nivel2'); ?>
        </div>
        <?php echo form_label('Dewey Nivel 3', 'materia3', $labelNivel3); ?>
        <div class="controls">            
            <?php echo form_dropdown('nivel3', array(), null, "id='nivel3' "); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nivel3'); ?>
        </div>
        <?php echo form_label('Area Del Libro', 'area', $labelArea); ?>
        <div class="controls">
            <?php echo form_input($texto_area); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('area'); ?>
        </div>
        <?php echo form_label('Apellido Del Libro', 'apellido', $labelApellido); ?>
        <div class="controls">
            <?php echo form_input($textoApellido); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('apel'); ?>
        </div>
        <?php echo form_label('Descripción Del Libro', 'desc', $labelApellido); ?>
        <div class="controls">
            <?php echo form_textarea($textoDescripcion); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('descripcion'); ?>
        </div>
        <?php echo form_label('Cantidad de Ejemplares', 'cantidad', $labelCantidad); ?>
        <div class="controls">
            <?php echo form_dropdown('cant', $options, null, "id='cant' class='span1'"); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('cant'); ?>
        </div>
        <?php echo form_label('Precio Libro', 'titulo', $labelPrecio); ?>
        <div class="controls">            
            <?php echo form_input($textoPrecio); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('precio'); ?>
        </div>
        <?php echo form_label('Estado del Libro', 'titulo', $labelEstado); ?>
        <div class="controls">            
            <?php echo form_input($textoEstado); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('estado'); ?>
        </div>
        <?php echo form_label('Autor', 'aut', $labelAutor); ?>
        <div class="controls">
            <?php echo form_dropdown('autor', $autores, null, "id='autor'"); ?>
            <a class="btn" data-toggle="modal" href="#autorR" >Nuevo Autor</a>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('autor'); ?>
        </div>
        <?php echo form_label('Editorial', 'edit', $labelEditorial); ?>
        <div class="controls">
            <?php echo form_dropdown('editorial', $editoriales, null, "id='editorial'"); ?>
            <a class="btn" data-toggle="modal" href="#editorialR" >Nueva Editorial</a>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('editorial'); ?>
        </div>
        <div class="controls">
            <?php echo form_submit($enviar); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="span8 modal hide fade" id="autorR">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Registrar Autor</h3>
    </div>
    <div class="modal-body">
        <?php $this->load->view('autor/registrar'); ?>
    </div>   
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" >Cerrar</a>
    </div>
</div>
<div class="span8 modal hide fade" id="editorialR">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Registrar Editorial</h3>
    </div>
    <div class="modal-body">
        <?php $this->load->view('editorial/registrar'); ?>
    </div>   
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" >Cerrar</a>
    </div>
</div>
    