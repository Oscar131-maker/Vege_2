<?php
/******************** Customizer CSS *********************/
function vege_customizer_css()
{
    ?>
         <style type="text/css">

           /************* Footer *********/
           footer.footer{
               background-color:<?php echo get_theme_mod('footer_background_color'); ?>;
            }
            footer.footer .footer-menu .footer-nav{
                background-color:<?php echo get_theme_mod('footer_background_color'); ?>;
            }
           .footer-content h1 a{
               color:<?php echo get_theme_mod('footer_copy_color'); ?>;
           }
           .footer-content .text-copy p{
               color:<?php echo get_theme_mod('footer_copy_color'); ?> !important;
           }
           .footer-content .social-footer a i{
               color:<?php echo get_theme_mod('footer_icon_color'); ?>;
           }
           footer.footer .footer-menu .footer-nav .f-list-container .f-lists li a{
                color:<?php echo get_theme_mod('footer_icon_color'); ?>;
           }
           .footer-content .social-footer a i:hover{
               color:<?php echo get_theme_mod('footer_icon_hover_color'); ?>;
           }
           footer.footer .footer-menu .footer-nav .f-list-container .f-lists li a:hover{
               color:<?php echo get_theme_mod('footer_icon_hover_color'); ?>;
           }

           /********************** Footer Widget *******************/
           .footer-widget-content{
               background-color:<?php echo get_theme_mod('footer_widget_bg'); ?>;
           }
           .footer-widget-content .widget-title, .woocommerce-Price-amount, dt, p, span.quantity, th, label{
               color:<?php echo get_theme_mod('footer_widget_text'); ?> !important;
           }
           .footer-widget-content a{
               color:<?php echo get_theme_mod('footer_widget_link'); ?>;
           }
           .footer-widget-content a:hover{
              color:<?php echo get_theme_mod('footer_widget_link_hover'); ?>;
           }
           .footer-widget-content button[type=submit]{
              background:<?php echo get_theme_mod('footer_widget_btn'); ?>;
              color:<?php echo get_theme_mod('footer_widget_btn_text'); ?>;
           }

           /****************** Breadcrums *****************/
           .breadcrums-container{
             background-image: url(<?php echo get_theme_mod('breadcrums_settings') ?>);
           }

         </style>
    <?php
}
add_action( 'wp_head', 'vege_customizer_css');