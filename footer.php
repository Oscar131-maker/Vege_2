
<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Vege_Marketplace
 * @since Vege Marketplace 1.0
 */?>

<!-- Get Widget Footer -->
<?php get_template_part('template-parts/footer/content', 'widgetfooter'); ?>  

  <!-- Footer -->
   <footer class="footer">
     <!-- Menu Footer -->
     <div class="footer-menu">
      <nav class="footer-nav">
        <?php wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => 'div',
          'container_class' => 'f-list-container',
          'menu_class' => 'f-lists',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(),
        )); ?>
      </nav>
     </div>
     <!-- Menu Footer -->

    <div class="footer-content">
      <div>

      <?php if(!get_theme_mod('footer_logo')) : ?>
         <h1 class="sitle-title"><a href="<?php echo esc_url(home_url('/'));?>">
         <?php bloginfo('name'); ?></a></h1>
      <?php else: ?>
        <a href="custom-logo-link"><img src="<?php echo get_theme_mod('footer_logo'); ?>" class="custom-logo"></a> 
      <?php endif;?>
      
      </div>
      <div class="text-copy"><p><?php echo get_theme_mod('footer_text', '© Todos los derechos reservados'); ?></p></div>
      <div class="social-footer">
        <a href="<?php echo get_theme_mod('facebook_url'); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="<?php echo get_theme_mod('instagram_url'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="<?php echo get_theme_mod('whatsapp_url'); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>