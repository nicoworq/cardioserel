<?php
/**
 * The template for displaying all single posts.
 *
 * @package Cardioserel
 */
get_header();
?>


<section class="producto-detalle">

   <div class="ajaxing"><span></span></div>
    <div class="container">
        <div class="producto-detalle-contenido col-md-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts/content', 'single-producto'); ?>

                        <?php the_post_navigation(); ?>



                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        //if ( comments_open() || get_comments_number() ) :
                        //	comments_template();
                        //endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->
            </div><!-- #primary -->

        </div>
        
        <?php //get_sidebar(); ?>

    </div>


</section>

<?php get_template_part('template-parts/productos', 'recomendados'); ?>

<?php get_footer(); ?>
