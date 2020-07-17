<?php

$wp_customize->add_section('breadcrums_section', array(
    'title' => 'Migas de pan (Woocommerce)',
    'priority' => 50,
));

$wp_customize->add_setting( 'breadcrums_settings',
   array(
       'default' => '',
       'transport' => 'refresh',
       'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
'breadcrums_settings',
  array(
      'label' => __( 'Imagen de Fondo Migas de pan' ),
      'section' => 'breadcrums_section',
      'priority' => 10,
      'button_labels' => array( // Optional.
          'select' => __( 'Seleccionar imagen' ),
          'change' => __( 'Cambiar imagen' ),
          'remove' => __( 'Remover' ),
          'default' => __( 'Defecto' ),
          'placeholder' => __( 'No hay imagen seleccionada' ),
          'frame_title' => __( 'Seleccionar imagen' ),
          'frame_button' => __( 'Choose Image' ),
      )
  )
) );


