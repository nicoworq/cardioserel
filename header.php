<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Cardioserel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/main.css">        
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/swal.css">        
           
          
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">

            <div class="navbar" id="contenedor-nav">
                <div class="contenedorBg">
                    <div class="bg1"></div>
                    <div class="bg2"></div>
                </div>
                <header role="banner">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="navbar-header">

                                    <a class="navbar-brand" id="logo-cardioserel" href="<?php echo site_url(); ?>">
                                        <img src="<?php echo get_template_directory_uri() ?>/img/logo-cardioserel.png" alt="Cardioserel" />
                                    </a>                       
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="menu-mobile-bt">
                                    <button type="button" class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                </div>


                                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>


                                <!--
                                <nav class="navbar-collapse" role="navigation">
                                    <ul class="nav navbar-nav" id="navegacion">
                                        <li><a class="<?php echo ($menu == 'inicio') ? "activo" : ""; ?>" href="index.php">Inicio</a></li>
                                        <li><a class="<?php echo ($menu == 'institucional') ? "activo" : ""; ?>" href="institucional.php">Institucional</a></li>
                                        <li><a class="<?php echo ($menu == 'productos') ? "activo" : ""; ?>" href="productos.php">Productos</a></li>
                                        <li><a class="<?php echo ($menu == 'servicios') ? "activo" : ""; ?>" href="servicios.php">Servicios</a></li>
                                        <li><a class="<?php echo ($menu == 'clientes') ? "activo" : ""; ?>" href="clientes.php">Clientes</a></li>
                                        <li><a class="<?php echo ($menu == 'novedades') ? "activo" : ""; ?>" href="novedades.php">Novedades</a></li>
                                        <li><a class="<?php echo ($menu == 'contacto') ? "activo" : ""; ?>" href="contacto.php">Contacto</a></li>
                                    </ul>

                                </nav><!--/.navbar-collapse -->


                            </div>
                        </div>


                    </div>
                </header>

            </div>

            <div id="content" class="site-content">
