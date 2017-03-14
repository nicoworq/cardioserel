<?php

/**
 * Cardioserel functions and definitions
 *
 * @package Cardioserel
 */
if (!function_exists('cardioserel_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cardioserel_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Cardioserel, use a find and replace
         * to change 'cardioserel' to the name of your theme in all the template files
         */
        load_theme_textdomain('cardioserel', get_template_directory() . '/languages');


        add_theme_support('post-thumbnails');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        //add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'cardioserel'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('cardioserel_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif; // cardioserel_setup
add_action('after_setup_theme', 'cardioserel_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cardioserel_content_width() {
    $GLOBALS['content_width'] = apply_filters('cardioserel_content_width', 640);
}

add_action('after_setup_theme', 'cardioserel_content_width', 0);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function cardioserel_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'cardioserel'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'cardioserel_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cardioserel_scripts() {
    wp_enqueue_style('cardioserel-style', get_stylesheet_uri());

    wp_enqueue_script('cardioserel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);
    wp_enqueue_script('cardioserel-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '20120206', true);
    wp_enqueue_script('cardioserel-script', get_template_directory_uri() . '/js/main.js', array('jquery','cardioserel-plugins'), '20120206', true);
    

    wp_enqueue_script('cardioserel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    
    wp_localize_script('cardioserel-script', 'CS', array('ajaxUrl' => admin_url('admin-ajax.php'), 'themeUrl' => get_stylesheet_directory_uri()));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'cardioserel_scripts');



register_sidebar(array(
    'name' => 'Home Sidebar',
    'id' => 'home_sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));



add_image_size('novedades-listado-img', 405, 390, true);
/*
  // Register Custom Post Type
  function productos_custom_post_type() {

  $labels = array(
  'name' => _x('Productos', 'Post Type General Name', 'text_domain'),
  'singular_name' => _x('Producto', 'Post Type Singular Name', 'text_domain'),
  'menu_name' => __('Productos', 'text_domain'),
  'name_admin_bar' => __('Productos', 'text_domain'),
  'parent_item_colon' => __('Producto Padre', 'text_domain'),
  'all_items' => __('Todos los Productos', 'text_domain'),
  'add_new_item' => __('Agregar Producto', 'text_domain'),
  'add_new' => __('Agregar Nuevo', 'text_domain'),
  'new_item' => __('Nuevo Producto', 'text_domain'),
  'edit_item' => __('Editar Producto', 'text_domain'),
  'update_item' => __('Actualizar Producto', 'text_domain'),
  'view_item' => __('Ver Producto', 'text_domain'),
  'search_items' => __('Buscar Producto', 'text_domain'),
  'not_found' => __('Producto no encontrado', 'text_domain'),
  'not_found_in_trash' => __('Producto no encontrado en Papelera', 'text_domain'),
  );
  $args = array(
  'label' => __('productos', 'text_domain'),
  'description' => __('Productos post type', 'text_domain'),
  'labels' => $labels,
  'supports' => array('title', 'editor', 'excerpt', 'comments', 'thumbnail', 'post-formats',),
  'taxonomies' => array('category', 'post_tag'),
  'hierarchical' => false,
  'public' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-cart',
  'show_in_admin_bar' => true,
  'show_in_nav_menus' => true,
  'can_export' => true,
  'has_archive' => false,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'capability_type' => 'page',
  );
  register_post_type('productos', $args);
  }

  // Hook into the 'init' action
  add_action('init', 'productos_custom_post_type', 0);

 */

// Register Custom Post Type
function productos_custom_post_type() {

    $labels = array(
        'name' => _x('Productos', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Producto', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Productos', 'text_domain'),
        'name_admin_bar' => __('Productos', 'text_domain'),
        'parent_item_colon' => __('Producto Padre', 'text_domain'),
        'all_items' => __('Todos los Productos', 'text_domain'),
        'add_new_item' => __('Agregar Producto', 'text_domain'),
        'add_new' => __('Agregar Nuevo', 'text_domain'),
        'new_item' => __('Nuevo Producto', 'text_domain'),
        'edit_item' => __('Editar Producto', 'text_domain'),
        'update_item' => __('Actualizar Producto', 'text_domain'),
        'view_item' => __('Ver Producto', 'text_domain'),
        'search_items' => __('Buscar Producto', 'text_domain'),
        'not_found' => __('Producto no encontrado', 'text_domain'),
        'not_found_in_trash' => __('Producto no encontrado en Papelera', 'text_domain'),
    );
    $rewrite = array(
        'slug' => 'producto',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $args = array(
        'label' => __('productos', 'text_domain'),
        'description' => __('Productos post type', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'post-formats',),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => TRUE,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        //'rewrite'             => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type('productos', $args);

    $rewrite_tax = array(
        'slug' => 'productos_categories',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );

    //register_taxonomy("productos_categories", "productos", array("hierarchical" => false, "label" => "Categorias Producto", "singular_label" => "Categoria Producto", "rewrite" => $rewrite_tax));
}

// Hook into the 'init' action
add_action('init', 'productos_custom_post_type', 0);

function filter_search($query) {
    if ($query->is_category) {
        $query->set('post_type', array('post', 'productos'));
    };
    return $query;
}

;
add_filter('pre_get_posts', 'filter_search');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


require get_template_directory() . '/inc/upload-widget-worq.php';


/*
 * CONTACTO PRODUCTO
 */

require get_template_directory() . '/inc/worq-ajax-contacto-producto.php';