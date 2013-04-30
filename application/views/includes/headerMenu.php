<?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    $id_usuario = $this->session->userdata('id');
    $tipoUsuario  = $this->session->userdata('tipoUsuario');
    if ($is_logged_in != TRUE or $id_usuario == '') {
        redirect('login/index');
    }
?>
<?php
    if ($tipoUsuario == 'Administrador' ){
?>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner navbar-fixed-top">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <?php echo anchor('libro', 'Biblioteca UPDS','class="brand"'); ?>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li><?php echo anchor('principal/index', 'Home'); ?></li>
                        <li><?php echo anchor('libro/mostrar', 'Libros'); ?></li>
                        <li><?php echo anchor('login/logout', 'Salir'); ?></li>
                    </ul>
                    <p class="navbar-text pull-right">Logged in as <a href="#"><?php echo $this->session->userdata('tipoUsuario'); ?> <?php echo $this->session->userdata('nombre'); ?></a></p>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <li class="nav-header">Libro</li>
                        <li id="registrar" class="active"><?php echo anchor('libro/registrar', 'Registrar'); ?></li>
                        <li id="mostrar"><?php echo anchor('libro/mostrar', 'Mostrar'); ?></li>
                        <li class="nav-header">Autor</li>
                        <li><?php echo anchor('autor/registrar', 'Registrar Nuevo Autor'); ?></li>
                        <li class="nav-header">Editorial</li>
                        <li><?php echo anchor('editorial/registrar', 'Registrar Nuevo Editorial'); ?></li>
                        <li class="nav-header">Usuarios</li>
                        <li><?php echo anchor('prestar/buscarSolicitud', 'Ver Solicitudes Por Usuario'); ?></li>
                        <li><?php echo anchor('subir/subir', 'Ver Solicitudes Por Usuario'); ?></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span9">
<?php } ?>

<?php
    if ($tipoUsuario == 'Alumno' ){
?>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner navbar-fixed-top">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <?php echo anchor('libro', 'Biblioteca UPDS','class="brand"'); ?>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li><?php echo anchor('principal/index', 'Home'); ?></li>
                        <li><?php echo anchor('prestar/mostrarPrestarUsuario/'.$this->session->userdata('id'), 'Libros'); ?></li>
                        <li><?php echo anchor('login/logout', 'Salir'); ?></li>
                    </ul>
                    <p class="navbar-text pull-right">Logged in as <a href="#"><?php echo $this->session->userdata('tipoUsuario'); ?> <?php echo $this->session->userdata('nombre'); ?></a></p>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <li class="nav-header">Libro</li>
                        <li><?php echo anchor('prestar/solicitar', 'Solicitar Libro'); ?></li>
                        <li><?php echo anchor('prestar/mostrarPrestarUsuario/'.$this->session->userdata('id'), 'Libros Prestados'); ?></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span9">
<?php } ?>