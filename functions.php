<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `config/Custom/Custom.php` to write your custom functions
 *
 * @package awps
 */
//
// if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
// 	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
// endif;
//
// if ( class_exists( 'Awps\\Init' ) ) :
// 	Awps\Init::register_services();
// endif;

/**
 * Reinform child theme functions and definitions
 */

/*—————————————————————————————————————————*/
/* Include the parent theme style.css
/*—————————————————————————————————————————*/

add_action( 'wp_enqueue_scripts', 'nina_enqueue_styles' );
function nina_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
