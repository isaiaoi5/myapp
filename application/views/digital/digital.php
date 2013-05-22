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
        Subir de Libro
    </h1>
</div>
<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        Formulario de Registro del Libro en formato Digital
    </div>
    <?php $atributos = array('class' => 'form-horizontal'); ?>
    <?php echo form_open_multipart('subirLibro/registrarLibroDigital', $atributos); ?> 
    <div class="control-group">
        <?php
            $labelTitulo = array(
                'class' => 'control-label',
                'data-icon' => 'u',
            );           
            $texto_file = array(
                'id'            => 'file',
                'name'          => 'file',
                'type'          => 'file',
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
            $enviar = array(
                    'name'  => 'submit',
                    'id'    => 'submit',
                    'value' => 'Ingresar',
                    'class' => 'btn btn-primary'
            );
        ?>
        <?php echo form_label('Libro a Subir al servidor', 'titulo', $labelTitulo); ?>
        <div class="controls">            
            <?php echo form_input($texto_file); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('libro'); ?>
        </div>
        <?php echo form_label('Dewey Nivel 1', 'materia', $labelTitulo); ?>
        <div class="controls">
            <?php echo form_dropdown('nivel1', $dptos, 1, "id='nivel1' value='set_value('nivel1')'"); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nivel1'); ?>
        </div>
        <?php echo form_label('Dewey Nivel 2', 'materia2', $labelTitulo); ?>
        <div class="controls">
            <?php echo form_dropdown('nivel2', array(), null, "id='nivel2'"); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nivel2'); ?>
        </div>
        <?php echo form_label('Dewey Nivel 3', 'materia3', $labelTitulo); ?>
        <div class="controls">            
            <?php echo form_dropdown('nivel3', array(), null, "id='nivel3' "); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('nivel3'); ?>
        </div>
        <?php echo form_label('Area Del Libro', 'area', $labelTitulo); ?>
        <div class="controls">
            <?php echo form_input($texto_area); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('area'); ?>
        </div>
        <?php echo form_label('Descripción Del Libro', 'desc', $labelTitulo); ?>
        <div class="controls">
            <?php echo form_textarea($textoDescripcion); ?>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('descripcion'); ?>
        </div>
        <?php echo form_label('Autor', 'aut', $labelTitulo); ?>
        <div class="controls">
            <?php echo form_dropdown('autor', $autores, null, "id='autor'"); ?>
            <a class="btn" data-toggle="modal" href="#autorR" >Nuevo Autor</a>
        </div>
        <div class="alert alert-info">
            <?php echo form_error('autor'); ?>
        </div>
        <?php echo form_label('Editorial', 'edit', $labelTitulo); ?>
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

<?php if($this->session->flashdata('message_upload')): ?>
<div class="span8">
<div class="alert <?php echo $this->session->flashdata('message_type'); ?>" style="width:700px">
	<?php 
		echo $this->session->flashdata('message_upload').'<br/>';
		if($this->session->flashdata('file_data')) {
			$data_info = $this->session->flashdata('file_data');
			//var_dump($data_info); //nos muestra el array completo
			echo '<ul>';
			foreach ($data_info as $key => $value) {
				echo '<li>'.$key. '='. $value. '</li>';				
			}
			echo '</ul>';
		}
	?>
</div>
<?php endif; ?>
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