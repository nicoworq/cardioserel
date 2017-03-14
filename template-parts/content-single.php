<?php
/**
 * @package Cardioserel
 */
if (function_exists('wp_get_attachment_image_src')) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size');

    //echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID));
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="contenido-header" style="background: url(<?php echo $img[0]; ?>);">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="contenido-meta">
        <div class="contenido-fecha">
            <?php the_date(); ?>
        </div>
        <ul class="contenido-compartir">
            <li><a href="" class="sprite-compartir sprite-compartir-facebook"></a></li>
            <li><a href="" class="sprite-compartir sprite-compartir-twitter"></a></li>
            <li><a href="" class="sprite-compartir sprite-compartir-google"></a></li>
        </ul>
    </div>
    <div class="contenido-entrada">
        <?php the_content(); ?>
    </div>


    <div class="entry-content">

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'cardioserel'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->


</article><!-- #post-## -->
