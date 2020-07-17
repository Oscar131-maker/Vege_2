<!-- Navegation Menu -->
<div class="row">
  <nav class="navbar-lists col-lg-3 col-md-5 col-sm-6">
    <div class="close-menu-content">
      <span class="close-menu"><i class="fas fa-times"></i></span>
    </div>

    <?php wp_nav_menu(array(
      'theme_location' => 'primary',
      'container' => 'div',
      'container_class' => 'list-container',
      'menu_class' => 'lists',
      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      'walker'          => new WP_Bootstrap_Navwalker(),
    )); ?>

  </nav>
</div>

<header id="header">
    <section class="menu">
         <!-- Logo -->
         <div class="logo-box">
          <a href="<?php echo esc_html(home_url()); ?>">
            <?php if (!has_custom_logo()) {
               echo '<h1 class="sitle-title"><a>';  bloginfo('name'); echo '</a></h1>';
            }else{
              the_custom_logo();
            } ?>
         </a>
        </div>

        <!-- Menu Icon -->
        <div class="btn-menu">
            <span class="menu-icon"><i class="fas fa-bars"></i></span>
        </div>
        <!-- Search Categories Form -->
        <div id="form-group">
        <form name="myform" method="GET" action="<?php echo esc_url(home_url('/')); ?>" class="d-flex" id="form-menu-search">

            <?php if (class_exists('WooCommerce')) : ?>
            <?php 
            if(isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat']))
            {
            $optsetlect=$_REQUEST['product_cat'];
            }
            else{
            $optsetlect=0;  
            }
                $args = array(
                            'show_option_all' => esc_html__( 'All Categories', 'woocommerce' ),
                            'hierarchical' => 1,
                            'class' => 'cat',
                            'echo' => 1,
                            'value_field' => 'slug',
                            'selected' => $optsetlect
                        );
                  $args['taxonomy'] = 'product_cat';
                  $args['name'] = 'product_cat';              
                  $args['class'] = 'cate-dropdown hidden-xs';
                  wp_dropdown_categories($args);

            ?>
            <input type="hidden" value="product" name="post_type" class="form-control">
            <?php endif; ?>
                      <input type="text"  name="s" class="form-control" maxlength="128" value="<?php echo get_search_query(); ?>">

            <button type="submit" title="<?php esc_attr_e('Search', 'woocommerce'); ?>" class="btn"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <!-- Menu Card Login -->
        <div class="end-menu">
          <ul>
          <li data-toggle="tooltip" data-placement="top" title="Tu cuenta" ><a href="<?php echo get_theme_mod('account_link'); ?>"><i class="far fa-user"></i></a></li>
          <li data-toggle="tooltip" data-placement="top" title="Tu carrito"><i class="fas fa-shopping-cart"><?php et_show_cart_total(); ?></i></li>
          </ul>
        </div>

    </section>
</header>