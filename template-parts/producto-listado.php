<?php
/**
 * @package Cardioserel
 */
if (function_exists('wp_get_attachment_image_src')) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size');

    //echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID));
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('producto-listado'); ?> >

    <a href="<?php the_permalink() ?>">
        <div class="producto-listado-imagen">
            <img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>"/>
        </div>
        <h4><?php the_title(); ?></h4>
        <h5>PHILLIPS</h5>
    </a>






</article><!-- #post-## -->
