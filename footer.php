<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cardioserel
 */
?>

<?php if (!is_page('institucional') && !is_page('clientes')) { ?>

    <section class="home-clientes <?php echo is_front_page() ? '' : 'no-home'; ?>">
        <div class="container">
            <h3>Conf&iacute;an en nosotros m&aacute;s de 50 instituciones m&eacute;dicas</h3>
            <div class="imagen-clientes">
                <img src="<?php echo get_template_directory_uri() ?>/img/logos.jpg"/>

            </div>

            <a class="bt-site" href="<?php echo get_permalink(get_page_by_title('Clientes')); ?>">Ver todos los clientes</a>
        </div>
    </section>


<?php } ?>

<?php if (!is_page('clientes')) { ?>
    <section class="home-representantes">
        <div class="container">
            <h3>Representamos marcas líderes</h3>
            <div class="slider-representantes">
                <div class="imagen-representantes">
                    <img src="<?php echo get_template_directory_uri() ?>/img/representantes.jpg"/>
                </div>
                <div class="imagen-representantes">
                    <img src="<?php echo get_template_directory_uri() ?>/img/representantes2.jpg"/>
                </div>
            </div>

            <h4>
                Somos representantes de venta y brindamos servicio técnico oficial<br/>
                en las provincias de Santa Fé y Entre Rios
            </h4>

        </div>
    </section>

    <section class="novedades-footer">

        <div class="container">
            <h3>Novedades</h3>

            <div class="row">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {

                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $feat_image = get_the_post_thumbnail_url(get_the_ID(), 'thumb-blog-home');
                        ?>

                        <div class="col-md-4">
                            <div class="novedad-footer">
                                <div class="novedad-footer-extracto">
                                    <?php the_title(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>">» Continuar</a>
                            </div>
                        </div>

                        <?php
                    }
                }

                wp_reset_postdata();
                ?>
            </div>


        </div>

    </section>
<?php } ?>
</div><!-- #content -->



<footer>

    <div class='botonera-foot'>
        <div class='container'>
            <div class='row'>
                <div class="col-md-6">
                    <div class='footer-datos-contacto'>
                        <p><span><strong>Tel:</strong> +54 0341- 4827001</span><br/>
                            <span><strong>Dir:</strong> Uruguay 2018, Rosario, Santa Fe, Argentina </span><br/>
                            <span><strong>Mail:</strong> contacto@cardioserel.com</span></p>
                        <img id="logo-foot" class=" wow fadeIn" src='<?php echo get_template_directory_uri() ?>/img/logo-cardioserel-footer.png' alt='Cardioserel'/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='navegacion-footer'>
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'footer-menu')); ?>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class='suscribir-foot'>

        <div class='contenido'>

            <div class='container'>

                <div class='row'>
                    <div class='col-lg-12'>
                        <div class="form-suscribir-footer">
                            <h3>Newsletter</h3>
                            <p>Conoce nuestras novedades y actualizaciones</p>
                            <form id='form-suscribir' action="php/ajax-form-suscribir.php" method="post">

                                <div id="suscribir-progress"></div>
                                <input type='text' name='email' placeholder="Ingrese su email"/>
                                <input type='submit' value='Suscribirse' />
                            </form>
                        </div>

                        <div class="logo-footer">
                            <img src="<?php echo get_template_directory_uri() ?>/img/logo-cardioserel.png" alt="Cardioserel" />
                        </div>

                        <p class="worq">&copy; <?php echo date('Y'); ?> Cardioserel SRL <a target="_blank" href='http://www.worq.com.ar'>DESARROLLA WORQ | SOLUCIONES WEB</a></p>
                    </div>

                </div>

            </div>
        </div>
    </div>



</footer>



<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-9465769-7', 'auto');
    ga('send', 'pageview');

</script>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
