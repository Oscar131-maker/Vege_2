<?php
/**
 * Vege Marketplace functions and definitions
 *
 * @package WordPress
 * @subpackage Vege_Marketplace
 * @since Vege Marketplace 1.0
 */

/****************** Setup theme *********************/
function Vege_Setup_Theme(){

    // Title Tag
    add_theme_support('title-tag');

      // Post Thumbnails
  if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('thumbnail', 150,150);
    add_image_size('medium', 300,300);
    add_image_size('medium_large', 768);
    add_image_size('large', 1024, 1024);
    add_image_size('full', 1920, 1080);
  }

    // Require Navwalker
    require_once get_template_directory(). '/template-parts/header/content-navbarwalker.php';

  // Custom Logos
  $defaults = array(
    'width'       => 200,
    'height' => 50,
    'flex-height' => true,
    );
    add_theme_support( 'custom-logo', $defaults );

}
add_action('after_setup_theme', 'Vege_Setup_Theme');

/********** Styles & Scripts **********/
function Vege_Style_Scripts(){

    // Styles CSS
    wp_enqueue_style('style', get_stylesheet_directory_uri());
    wp_enqueue_style('bootstrapCss', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
    wp_enqueue_style('dokan', get_template_directory_uri(). '/css/dokan.css', array('bootstrapCss'), time(), 'all');
    wp_enqueue_style('footer', get_template_directory_uri(). '/css/footer.css', array('dokan'), time(), 'all');
    wp_enqueue_style('general', get_template_directory_uri(). '/css/general.css', array('footer'), time(), 'all');
    wp_enqueue_style('home', get_template_directory_uri(). '/css/home.css', array('general'), time(), 'all');
    wp_enqueue_style('stackmenuCss', get_template_directory_uri(). '/css/jquery-stack-menu.min.css', array('home'), time(), 'all');
    wp_enqueue_style('menu', get_template_directory_uri(). '/css/menu.css', array('stackmenuCss'), time(), 'all');
    wp_enqueue_style('normalize', get_template_directory_uri(). '/css/normalize.css', array('menu'), time(), 'all');
    wp_enqueue_style('page', get_template_directory_uri(). '/css/page.css', array('normalize'), time(), 'all');
    wp_enqueue_style('sidebar', get_template_directory_uri(). '/css/sidebar.css', array('page'), time(), 'all');
    wp_enqueue_style('single', get_template_directory_uri(). '/css/single.css', array('sidebar'), time(), 'all');
    wp_enqueue_style('woocommerce', get_template_directory_uri(). '/css/woocommerce.css', array('single'), time(), 'all');

    // Scripts JavaScripts
    wp_enqueue_script('font', 'https://kit.fontawesome.com/35db202371.js');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js');
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
    wp_enqueue_script('bootstrapJs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js');
    wp_enqueue_script('stackmenuJs', get_template_directory_uri(). '/js/jquery-stack-menu.min.js', 
    array('bootstrapJs'), '1.0', true);
    wp_enqueue_script('scriptsJQ', get_template_directory_uri(). '/js/jqscript.js', 
    array('stackmenuJs'), '1.0', true);
    wp_enqueue_script('app', get_template_directory_uri(). '/js/app.js', 
    array('scriptsJQ'), '2.0', true);
}
add_action('wp_enqueue_scripts', 'Vege_Style_Scripts');

/******** Navbar ********/
register_nav_menus(array(
    'primary' => __('Principal Menu', 'vege'),
    'footer' => __('Footer Menu', 'vege')
));

/******************** Widgets *********************/
function vege_register_sidebar(){
    register_sidebar(array(
      'id' => 'primary',
      'name'          => __( 'Principal Sidebar' ),
      'description'   => __( 'Sidebar en articulos, categorias, etiquetas y resultados de busqueda.' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s m-4">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3><hr>',
    ));
  
    register_sidebar(array(
      'id' => 'first_footer',
      'name'          => __( 'Primer Sidebar | Footer' ),
      'description'   => __( 'Primera columna de sidebar footer' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ));
  
    register_sidebar(array(
      'id' => 'second_footer',
      'name'          => __( 'Segundo Sidebar | Footer' ),
      'description'   => __( 'Segunda columna de sidebar footer' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ));
  
    register_sidebar(array(
      'id' => 'third_footer',
      'name'          => __( 'Tercer Sidebar | Footer' ),
      'description'   => __( 'Tercera columna de sidebar footer' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ));
  
}
add_action('widgets_init', 'vege_register_sidebar');

/********** Woocommmerce *********/
include('template-parts/content/content-woocommerce.php');

/******************* Custom Css **********************/
include('inc/custom-css.php');

/******************* Customizer **********************/
include('inc/customizer.php');


