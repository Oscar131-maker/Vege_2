<?php

$wp_customize->add_section('account_menu', array(
    'title' => 'Cuenta Menu',
    'priority' => 20,
));

$wp_customize->add_setting( 'account_link',
    array(
        'default' => '',
        'transport' => 'refresh',
    )
);
 
$wp_customize->add_control( 'account_link',
    array(
        'label' => 'Link Icono (cuenta)',
        'description' => esc_html__( 'Al cambiar el nombre de la pagina de cuenta, cambiar esta url' ),
        'section' => 'account_menu',
        'priority' => 10,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array( // Optional.
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid rebeccapurple',
        ),
    )
);


