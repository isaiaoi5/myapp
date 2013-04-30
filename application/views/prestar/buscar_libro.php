<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Solicitar Libro
        </h1>
    </div>
</div>
<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        Formulario de Busqueda
    </div>
    <?php $atributos = array('class' => 'form-horizontal'); ?>
    <?php echo form_open('prestar/buscarLibro/1', $atributos); ?>
    <?php
        $labelBusqueda = array(
            'class'     => 'control-label',
            'data-icon' => 'u',
        );
        $textoBusqueda = array(
            'id'            => 'bucar',
            'name'          => 'buscar',
            'required'      => 'required',
            'type'          => 'text',
            'placeholder'   => 'Titulo Del Libro',
            'class'         => 'input-xlarge search-query',
            'value'         => set_value('libro'),
        );
        $enviar = array(
            'name' => 'submit',
            'id' => 'submit',
            'value' => 'Buscar',
            'class' => 'btn btn-info'
        );
    ?>
    <?php //echo form_label('Titulo del Libro', 'titulo', $labelBusqueda);  ?>   
    <?php echo form_input($textoBusqueda); ?>    
    <?php echo form_submit($enviar); ?>  
    <span class="alert alert-info">
        <?php echo form_error('libro'); ?>
    </span>
    <?php echo form_close(); ?>
    
     <?php //Buscar libro por autor ?> 
    <?php $atributos = array('class' => 'form-horizontal'); ?>
    <?php echo form_open('prestar/buscarLibro/2', $atributos); ?>
    <?php
        $labelBusqueda = array(
            'class'     => 'control-label',
            'data-icon' => 'u',
        );        
        $enviar = array(
            'name' => 'submit',
            'id' => 'submit',
            'value' => 'Buscar',
            'class' => 'btn btn-info'
        );
    ?>
    <?php //echo form_label('Titulo del Libro', 'titulo', $labelBusqueda);  ?>   
    <?php echo form_dropdown('autor', $autores, null, "id='autor' class='input-xlarge search-query'"); ?>    
    <?php echo form_submit($enviar); ?>  
    <span class="alert alert-info">
        <?php echo form_error('libro'); ?>
    </span>
    <?php echo form_close(); ?>
    
</div>
