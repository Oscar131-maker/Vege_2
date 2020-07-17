<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage Vege_Marketplace
 * @since Vege Marketplace 1.0
 */?>

<!doctype html>
<html lang="<?php language_attributes(); ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
  </head> 
<body <?php body_class('principal_body_vege'); ?>>

<?php wp_body_open(); ?>

<!-- Navigation Menu -->
<?php get_template_part('template-parts/header/content', 'menu'); ?>


