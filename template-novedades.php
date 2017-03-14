<?php
/*
  Template Name: Template Novedades
 */
get_header();

$novedades_args = array(
    'category_name' => 'novedades'
);

$novedades = new WP_Query($novedades_args);
?>

<section class="novedades">

    <div class="novedades-intro">
        <h1>Novedades</h1>
    </div>

    <div class="container">
        <div class="novedades-contenido col-md-9">


            <?php
            if ($novedades->have_posts()) {
                while ($novedades->have_posts()) {
                    $novedades->the_post();

                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'novedades-listado-img');
                    ?>

                    <div class="novedad">
                        <div class="novedad-contenido">
                            <a href="<?php the_permalink() ?>"><h3 class="novedad-titulo"><?php the_title() ?></h3></a>
                            <div class="novedad-texto">
                                <?php the_excerpt(); ?>

                            </div>
                            <a href="<?php the_permalink() ?>" class="novedad-link">Seguir leyendo</a>
                        </div>
                        <a href="<?php the_permalink() ?>" class="novedad-imagen" style="background-image: url(<?php echo $img[0]; ?>);"></a>
                    </div>

                    <?php
                }
            };
            ?>



            <!--
            <div class="novedad">
                <div class="novedad-contenido">

                    <h3 class="novedad-titulo">philips marca la vanguardia</h3>
                    <p class="novedad-texto">
                        Los signos vitales de los pacientes pueden ser monitorea- dos y seguidos en casa a través de dispositivos conectados. Los datos se envían a la plataforma y accede a través de una aplicación móvil.
                    </p>
                    <a href="#" class="novedad-link">Seguir leyendo</a>
                </div>
                <div class="novedad-imagen" style="background-image: url(img/novedad2.jpg);"></div>
            </div>
            <div class="novedad">
                <div class="novedad-contenido">

                    <h3 class="novedad-titulo">nuevas capacitaciones en cardioserel</h3>
                    <p class="novedad-texto">
                        Los signos vitales de los pacientes pueden ser monitorea- dos y seguidos en casa a través de dispositivos conectados. Los datos se envían a la plataforma y accede a través de una aplicación móvil.
                    </p>
                    <a href="#" class="novedad-link">Seguir leyendo</a>
                </div>
                <div class="novedad-imagen" style="background-image: url(img/novedad3.jpg);"></div>
            </div>
            -->

        </div>
        
        <?php get_sidebar(); ?>

    </div>





</section>
<?php get_footer(); ?>