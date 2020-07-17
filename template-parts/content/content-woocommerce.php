<?php

// Default Grid
function vege_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
  
        'product_grid'          => array(
            'default_rows'    => 10,
            'min_rows'        => 10,
            'max_rows'        => 10,
            'default_columns' => 5,
            'min_columns'     => 1,
            'max_columns'     => 5,
        ),
    ) );
  
    // Add theme Support
    add_theme_support ('wc-product-gallery-zoom');
    add_theme_support ('wc-product-gallery-lightbox');
    add_theme_support ('wc-product-gallery-slider');
  
  }
  add_action( 'after_setup_theme', 'vege_add_woocommerce_support' );
  
  // Wrapper Woocommerce
  add_action ('woocommerce_before_main_content', 'vege_wrapper_start', 10);
  add_action ('woocommerce_after_main_content', 'vege_wrapper_end', 10);
  
  function vege_wrapper_start () {
    echo '<section id = "main-woocommerce">';
  }
  
  function vege_wrapper_end () {
    echo '</section>';
  }


/*********************** Cart Woocommerce ***************************/
if ( ! function_exists( 'et_show_cart_total' ) ) {
	function et_show_cart_total( $args = array() ) {
		if ( ! class_exists( 'woocommerce' ) || ! WC()->cart ) {
			return;
		}
		$defaults = array(
			'no_text' => false,  // Whether to include Item/Items suffix.
			'cart_total' => false,  // Whether to include total cost.
			'hide_on_empty' => false,  // Whether to hide cart count.
		);
		$args = wp_parse_args( $args, $defaults );

		$items_number = WC()->cart->get_cart_contents_count();

		$cart_count = '';
		$cart_total = '';
		if ( 0 != $items_number || !$args[ 'hide_on_empty' ] ) {
			// Append Item/Items text.
			if ( $args[ 'no_text' ] ) {
				$cart_count = $items_number;
			}
			else {
				$cart_count = esc_html( sprintf(
								_nx( '%1$s Item', '%1$s Items', $items_number, 'WooCommerce items number', 'Divi' ),
								number_format_i18n( $items_number ) ) );
			}

			// List cart total.
			if ( $args['cart_total'] ) {
				$cart_total = get_woocommerce_currency_symbol() . WC()->cart->get_cart_contents_total();
			}
		}
		
		
		$url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
		printf(	'<a href="%1$s" class="et-cart-info"><span class="count">%2$s %3$s</span></a>',	esc_url( $url ), $cart_count, $cart_total );
	}
}

add_action( 'woocommerce_register_form', function () {
  
	woocommerce_form_field( 'politica_privacidad_registro', array(
	 'type'          => 'checkbox',
	 'class'         => array('form-row rgpd'),
	 'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
	 'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
	 'required'      => true,
	 'label'         => 'He leído y acepto la política de privacidad',
	 )); 
  }, 10);
  
  add_filter( 'woocommerce_registration_errors', function ( $errores, $usuario, $email ) {
	  if ( ! (int) isset( $_POST['politica_privacidad_registro'] ) ) {
		  $errores->add( 'politica_privacidad_registro_error', 'Tienes que aceptar nuestra política de privacidad' );
	  }
  return $errores;
  }, 10, 3);

