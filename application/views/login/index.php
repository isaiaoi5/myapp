<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Logueo de Usuarios</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/ima.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css2/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css2/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css2/animate-custom.css" />
    </head>
    <body>
        <div class="container">            
            <header>
                <h1>Login<span> USUARIO</span></h1>
                <nav class="codrops-demos">
                    <span>Tambien puedes Visitar</span>
                    <a href="http://localhost/biblio/" class="current-demo">Bliblioteca</a>
                    <a href="http://cisco.updspotosi.edu.bo">Cisco</a>
                    <a href="Http://www.updspotosi.edu.bo">UPDS</a>
                </nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <?php $atributos = array('autocomplete' => 'on'); ?>
                            <?php echo form_open('login/verificar_login', $atributos); ?>
                            <h1>Ingresar a la Biblioteca UPDS</h1>
                            <p>
                                <?php
                                $label_usuario = array(
                                    'class' => 'uname',
                                    'data-icon' => 'u',
                                );
                                echo form_label('Nombre de Usuario', 'username', $label_usuario);
                                $texto_usuario = array(
                                    'id' => 'username',
                                    'name' => 'username',
                                    'required' => 'required',
                                    'type' => 'text',
                                    'placeholder' => 'Usuario',
                                );
                                echo form_input($texto_usuario);
                                echo form_error('username');
                                ?>
                            </p>
                            <p>
                                <?php
                                $label_password = array(
                                    'class' => 'youpasswd',
                                    'data-icon' => 'p',
                                );
                                echo form_label('Password', 'password', $label_password);
                                $texto_password = array(
                                    'id' => 'password',
                                    'name' => 'password',
                                    'required' => 'required',
                                    'type' => 'password',
                                    'placeholder' => 'Password mas de 7 caracteres',
                                );
                                echo form_input($texto_password);
                                echo form_error('password');
                                ?>
                            </p>
                            <p class="keeplogin">

                            </p>
                            <p class="login button">
                                <?php
                                $enviar = array(
                                    'name' => 'submit',
                                    'id' => 'submit',
                                    'value' => 'Ingresar',
                                );
                                echo form_submit($enviar);
                                ?>
                            </p>
                            <p class="change_link">
                                Todavia no eres un Mienbro
                                <a href="http://www.updspotosi.edu.bo" class="to_register">Unetenos</a>
                            </p>
                            <?php echo form_close(); ?>
                        </div>                
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
