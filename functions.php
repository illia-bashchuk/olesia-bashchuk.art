<?php
add_filter('show_admin_bar', '__return_false'); // отключить админ бар
add_action('wp_enqueue_scripts', 'enqueue_zPainting_style');
add_action('after_setup_theme', 'add_menus');
add_action('after_setup_theme', function(){
	load_theme_textdomain( 'zpainting', get_template_directory() . '/languages' );
});
add_theme_support( 'post-thumbnails' );
remove_action('wp_head','qtranxf_wp_head_meta_generator');
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
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    /**
     *   JS scripts
     *   ================================================== 
     */
	
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
    wp_enqueue_script('unitegallery_js', get_template_directory_uri() . '/unitegallery/js/unitegallery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('unitegallery_theme_js', get_template_directory_uri() . '/unitegallery/themes/tiles/ug-theme-tiles.js', array(), '1.0.0', true);
}

// Main menu Walker class.
require get_template_directory() . '/classes/class-zpainting-mein-menu-wolker.php';


function add_menus()
{
    register_nav_menu( 'main_menu', 'Main Menu' ); 
}


// параметры по умолчанию
$myposts = get_posts( array(
	'numberposts' => -1,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'post',
	'nopaging'    => true,
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

function my_category_posts($my_category) {
    $my_category_posts = get_posts( array(
        'numberposts' => -1,
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

// Удаляем лишнее с head части сайта
// 2.0
remove_action( 'wp_head', 'feed_links_extra', 3 ); // ссылки доп. фидов (на рубрики)
remove_action( 'wp_head', 'feed_links',       2 ); // ссылки фидов (основные фиды)
// <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://example.com/xmlrpc.php?rsd" /> для публикации статей через сторонние сервисы
remove_action( 'wp_head', 'rsd_link'            ); 
// <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://example.com/wp-includes/wlwmanifest.xml" /> . Используется клиентом Windows Live Writer. 
remove_action( 'wp_head', 'wlwmanifest_link'    ); 
// remove_action( 'wp_head', 'index_rel_link'      ); // не поддерживается с версии 3.3

add_filter('the_generator', '__return_empty_string'); // Убираем версию WordPress

// 3.0
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); // Ссылки на соседние статьи (<link rel='next'... <link rel='prev'...)
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );// Короткая ссылка - без ЧПУ <link rel='shortlink'

// 4.6
remove_action( 'wp_head', 'wp_resource_hints', 2); // Prints resource hints to browsers for pre-fetching, pre-rendering and pre-connecting to web sites.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

function disable_emoji_feature() {
	
	// Prevent Emoji from loading on the front-end
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove from admin area also
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	// Remove from RSS feeds also
	remove_filter( 'the_content_feed', 'wp_staticize_emoji');
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji');

	// Remove from Embeds
	remove_filter( 'embed_head', 'print_emoji_detection_script' );

	// Remove from emails
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Disable from TinyMCE editor. Currently disabled in block editor by default
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );

	/** Finally, prevent character conversion too
         ** without this, emojis still work 
         ** if it is available on the user's device
	 */

	// add_filter( 'option_use_smilies', '__return_false' );

}

function disable_emojis_tinymce( $plugins ) {
	if( is_array($plugins) ) {
		$plugins = array_diff( $plugins, array( 'wpemoji' ) );
	}
	return $plugins;
}

add_action('init', 'disable_emoji_feature');


// отключение ненужных теме стилей и скриптов begin
function my_deregister_styles_and_scripts() {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_print_styles', 'my_deregister_styles_and_scripts', 100 );
// отключение ненужных теме стилей и скриптов end

// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Stop loading the JavaScript and CSS stylesheet on all pages
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );