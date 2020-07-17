<?php

function vege_customize ($wp_customize) {

    // Footer
    require_once trailingslashit( dirname(__FILE__) ) . 'footer/custom-footer.php';
    require_once trailingslashit( dirname(__FILE__) ) . 'footer/custom-footer-color.php';

    // Woocommerce
    require_once trailingslashit( dirname(__FILE__) ) . 'header/custom-breadcrums.php';

    // Account Icons
    require_once trailingslashit( dirname(__FILE__) ) . 'header/custom-account.php';
}
add_action('customize_register', 'vege_customize');

require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';
