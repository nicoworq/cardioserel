<section class="productos-recomendados">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Conoce nuestros productos recomendados</h2>

                <div class="contenedor-productos-recomendados">


                    <?php
                    $args = array(
                        'post_type' => 'productos',
                        'meta_key' => 'recomendado',
                        'meta_value' => TRUE,
                        'posts_per_page' => 6,
                    );
                    $the_query = new WP_Query($args);



                    if ($the_query->have_posts()) {

                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
                            ?>
                            <a href="<?php echo get_permalink(); ?>" class="producto-recomendado">
                                <div class="producto-recomendado-img">
                                    <img src="<?php echo $feat_image[0] ?>">
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <h5><?php get_field('marca') ?></h5>
                            </a>
                            <?php
                        }
                    } else {
                        ?>
                        <h3 style="text-align: center;color: white;">No se encontraron productos recomendados </h3>
                        <?php
                    }

                    wp_reset_postdata();
                    ?>


                </div>


            </div>
        </div>
    </div>
</section>