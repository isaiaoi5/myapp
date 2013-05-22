<?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    $id_usuario   = $this->session->userdata('id');
    $tipoUsuario  = $this->session->userdata('tipoUsuario');
    if ($is_logged_in != TRUE or $id_usuario == '') {
        redirect('login/index');
    }
?>

<body>
    <div class="container-fluid">
        <div class="span12 well">
        <script type="text/javascript">
            $('.carousel').carousel({
            interval: 2000
            })
        </script>
            <div id="myCarousel" class="carousel">
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item"><img src="<?php echo base_url(); ?>images/upds2.jpg" alt="" width="923px" height="200px"/></div>
                    <div class="item"><img src="<?php echo base_url(); ?>images/upds5.jpg" alt="" width="923px" height="200px"/></div>
                    <div class="item"><img src="<?php echo base_url(); ?>images/upds3.jpg" alt="" width="923px" height="200px"/></div>
                    <div class="item"><img src="<?php echo base_url(); ?>images/upds4.jpg" alt="" width="923px" height="200px"/></div>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
        </div>
    </div>

<?php
    if ($tipoUsuario == 'Administrador' ){
?>
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
                        <li class="nav-header"><h3>Biblioteca</h3></li>
                            <li id="registrar" class="active"><?php echo anchor('libro/registrar', 'Registrar'); ?></li>
                            <li><?php echo anchor('prestar/buscarSolicitud', 'Prestar Libro'); ?></li>
                            <li id="mostrar"><?php echo anchor('libro/mostrar', 'Mostrar'); ?></li>
                        <li class="nav-header"><h3>Biblioteca Virtual</h3></li>                        
                            <li id="subirLibroDigital"><?php echo anchor('subirLibro/digital', 'Subir Libro'); ?></li>
                            <li id="mostrarLibroDigital"><?php echo anchor('subirLibro/mostrarDigital', 'Mostar Material Digital'); ?></li>
                        <li class="nav-header"><h3>Autor</h3></li>
                            <li><?php echo anchor('autor/registrar', 'Registrar Nuevo Autor'); ?></li>
                        <li class="nav-header"><h3>Editorial</h3></li>
                            <li><?php echo anchor('editorial/registrar', 'Registrar Nueva Editorial'); ?></li>
                        <li class="nav-header"><h3>Usuarios</h3></li>
                            <li><?php echo anchor('usuario/registrar', 'Registrar Nuevo Usuario'); ?></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span9">
<?php } ?>

<?php
    if ($tipoUsuario == 'Alumno' ){
?>

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