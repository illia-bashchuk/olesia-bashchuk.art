<?php
add_action('wp_enqueue_scripts', 'enqueue_zPainting_style');
add_action('after_setup_theme', 'add_menus');
add_theme_support( 'post-thumbnails' );
define('D', get_template_directory_uri().'/');
function enqueue_zPainting_style()
{
    /**
     *   CSS
     *   ================================================== 
     */
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_style('unitegallery', get_stylesheet_directory_uri() . '/unitegallery/css/unite-gallery.css');
    wp_enqueue_style('unitegallery_css', get_stylesheet_directory_uri() . '/unitegallery/css/unite-gallery.css');


    /**
     *   Custom Fonts
     *   ================================================== 
     */
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css');
    /**
     *   JS scripts
     *   ================================================== 
     */
    // wp_enqueue_script('jquery1111', get_template_directory_uri() . '/js/jquery1111.min.js', array(), '1.0.0', true);
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
    wp_enqueue_script('unitegallery_js', get_template_directory_uri() . '/unitegallery/js/unitegallery.min.js', array(), '1.0.0', true);

    wp_enqueue_script('unitegallery_theme_js', get_template_directory_uri() . '/unitegallery/themes/tiles/ug-theme-tiles.js', array(), '1.0.0', true);

    /**   
     *   <!-- Custom Fonts -->get_stylesheet_directory_uri()
     *   <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     *   
     *   
     *   
     *   <script src="js/jquery1111.min.js" type="text/javascript"></script>
     *   <script src="js/script.js"></script>
     *   
     *   <!-- Owl Carousel Assets -->
     *   <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
     * 
     */
}

function add_menus()
{
    
    register_nav_menu( 'main_menu', 'Main Menu' );   
 
}

// параметры по умолчанию
$myposts = get_posts( array(
	'numberposts' => 5,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'post',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

function my_category_posts($my_category) {
    $my_category_posts = get_posts( array(
        'numberposts' => 5,
        'category_name'    => $my_category,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );
    return $my_category_posts;
}



add_filter( 'comment_form_default_fields', 'comment_form_default_add_my_fields' );

/**
 * Удаляет поле "Сайт" из формы комментирования для незарегистрированных пользователей.
 *
 * @param array $fields Дефолтные поля
 *
 * @return array
 */
function comment_form_default_add_my_fields( $fields ) {
    unset( $fields['url'] );
    unset( $fields['email'] );

	return $fields;
}


