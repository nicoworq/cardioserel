<?php

/*
 * REMOVER versionado CSS
 */

// Remove WP Version From Styles	
add_filter('style_loader_src', 'sdt_remove_ver_css_js', 9999);
// Remove WP Version From Scripts
add_filter('script_loader_src', 'sdt_remove_ver_css_js', 9999);

// Function to remove version numbers
function sdt_remove_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

// Register Custom Post Type
function categoria_villber() {

    $labels = array(
        'name' => _x('Categorias Productos', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Categoría Producto', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Categorias Productos', 'text_domain'),
        'name_admin_bar' => __('Categorias Productos', 'text_domain'),
        'archives' => __('Categorias Productos', 'text_domain'),
        'parent_item_colon' => __('Categoría padre', 'text_domain'),
        'all_items' => __('Todas las Categoría', 'text_domain'),
        'add_new_item' => __('Agregar Categoría', 'text_domain'),
        'add_new' => __('Agregar nueva', 'text_domain'),
        'new_item' => __('Agregar Categoría', 'text_domain'),
        'edit_item' => __('Editar Categoría', 'text_domain'),
        'update_item' => __('Actualizar Categoría', 'text_domain'),
        'view_item' => __('Ver Categoría', 'text_domain'),
        'search_items' => __('Buscar Categoría', 'text_domain'),
        'not_found' => __('No encontrado', 'text_domain'),
        'not_found_in_trash' => __('No encontrado', 'text_domain'),
        'featured_image' => __('Imagen destacada', 'text_domain'),
        'set_featured_image' => __('Setear Imagen destacada', 'text_domain'),
        'remove_featured_image' => __('Eliminar Imagen destacada', 'text_domain'),
        'use_featured_image' => __('Usar como Imagen destacada', 'text_domain'),
        'insert_into_item' => __('Insertar en Categoría', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Categoría Producto', 'text_domain'),
        'description' => __('Categorias Productos de Wood', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'author', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-clipboard',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('categoria-producto', $args);
}

add_action('init', 'categoria_villber', 0);




/*
 * IMAGE SIZES
 */

add_image_size('thumb-novedad', 800, 533, true);

add_image_size('thumb-producto', 270, 200, true);


/**
 *  OPEN GRAPH
 * 
 */
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype($output) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
    global $post;
    if (!is_singular()) //if it is not a post or a page
        return;

    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="Wood"/>';
    if (!has_post_thumbnail($post->ID)) { //the post does not have featured image, use a default image
        $default_image = get_template_directory_uri() . '/img/worq/default-facebook.png'; //replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    } else {
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
        echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
    }
}

add_action('wp_head', 'insert_fb_in_head', 5);



/* EXTRACTO LIMITE */

function new_excerpt_length($length) {
    return 20;
}

add_filter('excerpt_length', 'new_excerpt_length');


/*
 * PAGINACION NUMERICA
 */

function wpbeginner_numeric_posts_nav() {

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** 	Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** 	Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (( $paged + 2 ) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination-container"><hr><ul class="pagination">' . "\n";

    /** 	Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link('&laquo;'));

    /** 	Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** 	Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** 	Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** 	Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link('&raquo;'));

    echo '</ul></div>' . "\n";
}