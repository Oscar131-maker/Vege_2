<?php

/*********** Footer Panel ***********/
$wp_customize->add_panel('footer_panel', array(
    'title' => 'Footer',
    'priority' => 60,
));

/********** Principal Settings **********/
$wp_customize->add_section('principal_section', array(
    'title' => 'Ajustes Principales',
    'panel' => 'footer_panel',
    'priority' => 10,
));

// Custom Logo Footer (IMG)
$wp_customize->add_setting( 'footer_logo',
   array(
       'default' => '',
       'transport' => 'refresh',
       'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
'footer_logo',
  array(
      'label' => __( 'Logotipo Version Footer' ),
      'description' => esc_html__( 'Asegurese que el color de logotipo combine con el color del footer.' ),
      'section' => 'principal_section',
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

// Text Copy Footer
$wp_customize->add_setting( 'footer_text',
    array(
        'default' => '© Todos los derechos reservados',
        'transport' => 'refresh',
        'sanitize_callback' => 'skyrocket_text_sanitization'
    )
    );
 
    $wp_customize->add_control( 'footer_text',
    array(
        'label' => 'Texto del Footer',
        'section' => 'principal_section',
        'priority' => 20,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array( // Optional.
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid rebeccapurple',
        ),
    )
    );

// URL Facebook Page
$wp_customize->add_setting( 'facebook_url',
array(
    'default' => '',
    'transport' => 'refresh',
)
);

$wp_customize->add_control( 'facebook_url',
array(
    'label' => 'Facebook URL',
    'description' => 'Enlace hacia Pagina Facebook',
    'section' => 'principal_section',
    'priority' => 30,
    'type' => 'text',
    'capability' => 'edit_theme_options',
    'input_attrs' => array( // Optional.
        'class' => 'my-custom-class',
        'style' => 'border: 1px solid rebeccapurple',
    ),
)
);

// URL Instagram Page
$wp_customize->add_setting( 'instagram_url',
array(
    'default' => '',
    'transport' => 'refresh',
)
);

$wp_customize->add_control( 'instagram_url',
array(
    'label' => 'Instagram URL',
    'description' => 'Enlace hacia Pagina de Instagram',
    'section' => 'principal_section',
    'priority' => 40,
    'type' => 'text',
    'capability' => 'edit_theme_options',
    'input_attrs' => array( // Optional.
        'class' => 'my-custom-class',
        'style' => 'border: 1px solid rebeccapurple',
    ),
)
);

// URL Whatsapp Page
$wp_customize->add_setting( 'whatsapp_url',
array(
    'default' => '',
    'transport' => 'refresh',
)
);

$wp_customize->add_control( 'whatsapp_url',
array(
    'label' => 'Whatsapp URL',
    'description' => 'Enlace hacia aplicacion WhatsApp',
    'section' => 'principal_section',
    'priority' => 50,
    'type' => 'text',
    'capability' => 'edit_theme_options',
    'input_attrs' => array( // Optional.
        'class' => 'my-custom-class',
        'style' => 'border: 1px solid rebeccapurple',
    ),
)
);
