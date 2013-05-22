<?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    $id_usuario = $this->session->userdata('id');
    if ($is_logged_in != TRUE or $id_usuario == '') {
        redirect('usuario/login');
    }
?>
<div class="span8 well">
    <div class="alert alert-info">        
        <?php echo anchor('login/logout', '&times;','class = "close" data-dismiss="alert"'); ?>
        <h1>
            BIENVENIDO <?php echo strtoupper($this->session->userdata('nombre')); ?> USTED A INGRESADO COMO <?php echo strtoupper($this->session->userdata('tipoUsuario')); ?>
        </h1>
    </div>
    <blockquote>
        Biblioteca de la Universida Privada Domingo Savio Potosí
        <small>UPDS</small>
        <small>Potosí</small>        
    </blockquote>    
</div>