<?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    $id_usuario = $this->session->userdata('id');
    if ($is_logged_in != TRUE or $id_usuario == '') {
        redirect('usuario/login');
    }
?>
<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            BIENVENIDO
        </h1>
        <p>
            <?php echo anchor('libro/registrar', 'Registrar Nuevo Libro'); ?>
        </p>
    </div>
    <blockquote>
        Biblioteca de la Universida Privada Domingo Savio Potosí
        <small>UPDS</small>
        <small>Potosí</small>        
    </blockquote>    
</div>