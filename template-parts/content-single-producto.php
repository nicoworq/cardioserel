<?php
/**
 * @package Cardioserel
 */
if (function_exists('wp_get_attachment_image_src')) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-size');

    //echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID));
}

$archivoTecnico = get_field('ficha_tecnica');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
    <div class="col-md-6">
        <div class="producto-imagenes">
            <div class="producto-imagen-destacada">
                <img src="<?php echo $img[0]; ?>" alt="Imagen destacada" />
            </div>        
        </div>
    </div>
    <div class="col-md-6">

        <div class="producto-contenido">


            <div class="producto-categoria">
                Productos / Monitores
            </div>

            <h1><?php the_title(); ?></h1>

            <div class="producto-texto">
                <?php the_content(); ?>
            </div>

            <div class="producto-ficha-tecnica">

                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAbCAYAAAB4Kn/lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjZFRDExQzAxOUZBMTFFNThGQUM4MkMxMDY3OUMxRDgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjZFRDExQzExOUZBMTFFNThGQUM4MkMxMDY3OUMxRDgiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyNkVEMTFCRTE5RkExMUU1OEZBQzgyQzEwNjc5QzFEOCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoyNkVEMTFCRjE5RkExMUU1OEZBQzgyQzEwNjc5QzFEOCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pvy89okAAANJSURBVHjatJXbSxRRHMe/Z2Z2Z2dvXjI0g9JuVC8WFF0hyQov3Z7roSCit3qLqH8iegjrKS+UFCYUpgX6UNBbNyJBKqj1guslXfc6O3Pm9DuzIrRqmtqB5Swzu5/5ne/v+/sOGzzVMATOQ2AM/7pURyBuW9zetftaeOOGZnNyEoI70AwDGkHLBedYDlhRVTgZE197epu2njguCtevb0mNj+fuETDuQpfxEQTwBANwqMr+7pfNiejIWaO4GEIIAq9wCceBHgrCIVn6u191ELzWKCpaGViKJ6tOWzaY349kJoNPnS+6JgYH67WVgG06sock2RL053QNBZCZ/AXx4UPn4mBqkEgm4aRSUNesmTm/cDdOu0bgckOn6qXmdJ1+I3QvX1QKQV1XCwth7NuXA0oH5UmRoeal6bq72zYsxlKLgvloFIHaOgQaGujsNoRlLc2KS2g7lIICZD9/Bo9NgXk8qwRWVFg/fsK3Zy+UQACCql4VsITZI8NgVDWZFUzTVgcsrCwccoW+YyfUsnWwx8boX8oKwQRwkino23cg29+PoqvXILImNXQUTiIBJxaDMM15c2ZhMP2YT0zAX10NT0UFIocPwPz0EWWN9+GtrIRWWgq9qgpaeXkOnre0haDSs3xiHIGa4+7jg6fPwB4YgHfbdhTfvOU6Jf32rVt9+s1rcIpM5vP9BSwnjY7Jo1EEG07Cs3kTEs+fuZVZQ0MYu3EdakkJ/EdrwLzenBzU1HzdtTmaTk2RE/wI1NUjfOEi4o/bEGt6AI1gUDXKgxD42CimGu+SRJVQKHzk0DBdnx31OWCRTkOlI4bOnYdv/36ke3ow3doC/5FqhOmaNRAhbcuQ/f6NHhCmSeSYftgKJRj8AzqnefJNolAuaCVrke7txXTbIyjhAtKTsuLgIdL7GOzoCDyVm1B4+QqY4SOXZOd1hTZ3GEbw685tN9EEjbNKoc0UhmR3F+Lt7Si4dMl1S6L9Ccz37whuLA6Wx5ENERTYoF2RU0ZwKxKB+eWeG52Jjqfg9F6TjmG64RYz35rXbhI+m7uMGiofRI2VeWz29eXue7y53Jyx5tJ8nH8KsqC0ofwuXZF/f3nptswlwaH/wA1JKYb/Azz+W4ABAInTZtaxw5opAAAAAElFTkSuQmCC"/>

                <span>Ficha técnica</span><a href="<?php echo $archivoTecnico['url']; ?>" target="blank">Ver/ descargar</a>
            </div>

            <form id="form-consulta-producto">
                <h3>Haz una consulta sobre este producto</h3>

                <input type="hidden" name="contacto" value="<?php echo wp_create_nonce('contacto-nonce') ?>"/>
                <input type="hidden" name="producto" value="<?php echo get_the_title(); ?>"/>
                 <input type="hidden" name="action" value="contacto_producto"/>
                
                <input type="text" name="sex" value="" placeholder="Sex *"/>
                <input type="text" name="nombre" placeholder="Tu nombre"/>
                <input type="text" name="email" placeholder="Tu email"/>
                <textarea placeholder="Tu consulta" name="consulta"></textarea>
                <input type="submit" value="Quiero m&aacute;s informaci&oacute;n"/>
            </form>
        </div>

    </div>


</article><!-- #post-## -->
