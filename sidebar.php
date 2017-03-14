<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Cardioserel
 */
if (!is_active_sidebar('sidebar-1')) {
    // return;
}
?>

<div class="novedades-sidebar col-md-3">

    <div id="secondary" class="widget-area" role="complementary">

        <div class="widget-productos">
            <h2>Nuestros productos</h2>
            <p>Poseemos más de 1000 productos y estamos certificados por Philips y Neumovent</p>
            <a href="<?php echo get_permalink( get_page_by_path( 'productos' ) ); ?>">Productos</a>
        </div>

        <div class="widget-novedades-relacionadas">
            <div class="novedad-relacionada">
                <div class="novedad-relacionada-img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/relacionada1.jpg"/> 
                </div>
                <h3>revoluciona el control de
                    sus pacientes</h3>
                <p>Los signos vitales de los pacientes pueden ser monitoreados y seguidos en casa a través de dispositivos conectados. Los datos se envían a la plataforma y accede a través de una aplicación móvil</p>
                <a href="">» Seguir leyendo</a>

            </div>
            <div class="novedad-relacionada">
                <div class="novedad-relacionada-img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/relacionada2.jpg"/> 
                </div>
                <h3>revoluciona el control de
                    sus pacientes</h3>
                <p>Los signos vitales de los pacientes pueden ser monitoreados y seguidos en casa a través de dispositivos conectados. Los datos se envían a la plataforma y accede a través de una aplicación móvil</p>
                <a href="">» Seguir leyendo</a>

            </div>
        </div>

        <?php dynamic_sidebar('sidebar-1'); ?>
    </div><!-- #secondary -->

</div>