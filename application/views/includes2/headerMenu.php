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
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><?php echo anchor('login/logout', 'Salir'); ?></li>
                    </ul>
                    <p class="navbar-text pull-right">Logged in as <a href="#"><?php echo $this->session->userdata('nombre'); ?></a></p>
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
                        <li><p><i class="icon-book"></i><?php echo anchor('prestar/solicitar', 'Solicitar Libro'); ?></p></li>
                        <li><?php echo anchor('prestar/mostrarSolicitud', 'Ver libros Solicidatos'); ?></li>
                        <li><a href="#">Link4</a></li>
                        <li><a href="#">Link4</a></li>
                        <li><a href="#">Link4</a></li>
                        <li class="nav-header">Autor</li>
                        <li><?php echo anchor('autor/registrar', 'Registrar Nuevo Autor'); ?></li>
                        <li><?php echo anchor('autor/registrarModal', 'Registrar Nuevo Autor'); ?></li>
                        <li><a href="#">Link</a></li>
                        <li class="nav-header">Editorial</li>
                        <li><?php echo anchor('editorial/registrar', 'Registrar Nuevo Editorial'); ?></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="nav-header">Usuario</li>
                        <li><?php echo anchor('usuario/buscarSolicitud', 'Ver Solicitudes Por Usuario'); ?></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span9">