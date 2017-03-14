<?php
/*
  Template Name: Template Home
 */
get_header();
?>



<section class="webcom-home">


    <div class="contenido">

        <div class="container">

            <div class="col-lg-12">
                <h2 class="wow fadeInUp">
                    Equipamiento de electromedicina<br/>
                    y un  servicio técnico en el que<br/>
                    puede confiar
                </h2>
            </div>

        </div>

    </div>


</section>
<section>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Sidebar')) : ?>

    <?php endif; ?>
</section>

<section class="home-accesos">    

    <div class="container">
        <div class="row">
            <div class="home-acceso col-md-6">
                <h3>Equipos & insumos</h3>
                <div class="acceso-imagen">
                    <img src="<?php echo get_template_directory_uri() ?>/img/ventiladores_medicos.jpg"/>
                </div>

                <a href="<?php echo get_permalink(get_page_by_title('Nuestros Productos')); ?>">Ver productos</a>
            </div>
            <div class="home-acceso col-md-6">
                <h3>Servicio t&eacute;cnico</h3>
                <div class="acceso-imagen">
                    <img src="<?php echo get_template_directory_uri() ?>/img/servicio_tecnico.jpg"/>
                </div>
                <a href="<?php echo get_permalink(get_page_by_title('Servicios')); ?>">Ver servicios</a>
            </div>
        </div>

    </div>

</section>

<section class="home-postventa">

    <div class="container home-postventa-bg">
        <div class="row">
            <div class="col-md-12">
                <div class="home-postventa-contenido">
                    <h3><span>El mejor servicio</span><br/>postventa</h3>
                    <p>La relación con nuestros clientes no termina<br/>
                        con la venta de un equipo, comienza con ella.</p>
                    <a href="<?php echo get_permalink(get_page_by_title('Servicios')); ?>">Conozca nuestra postventa</a>
                </div>
            </div>
        </div>

    </div>
</section>




<?php get_footer(); ?>