<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cardioserel
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="listado-productos-header">
            <h1>Productos de alta gama</h1>
            <h3>En Cardioserel vas a encontrar la calidad, y seriedad de las marcas lideres junto con el mejor servicio tecnico y postventa de la region.<br/>
                Somos representantes certificados por Philips y Neumovent en Santa Fé, Entre Rios y alrededores</h3>
        </div>

        <?php if (have_posts()) : ?>

            <!--
            <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="taxonomy-description">', '</div>');
            ?>
            </header><!-- .page-header -->



            <div class="listado-productos-contenido">
                <div class="container">
                    <div class="col-md-12">
                        <?php get_template_part('template-parts/productos', 'action-bar'); ?>

                        <h3>Productos / Monitores / Phillips</h3>
                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/producto', 'listado');
                            ?>

                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php // the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
