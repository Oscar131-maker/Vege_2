<?php

/**************** Footer Color *****************/
$wp_customize->add_section('footer_color', array(
    'title' => 'Footer Color',
    'panel' => 'footer_panel',
    'priority' => 20, 
));

// Background Footer
$wp_customize->add_setting( 'footer_background_color' , array(
    'default'     => '#0e0f0f',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_background_color', array(
	'label'        => 'Color de Fondo',
	'section'    => 'footer_color',
    'settings'   => 'footer_background_color',
    'priority' => 10,
) ) );

// Footer Text Copy
$wp_customize->add_setting( 'footer_copy_color' , array(
    'default'     => '#fff',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_copy_color', array(
	'label'        => 'Color de texto (copy)',
	'section'    => 'footer_color',
    'settings'   => 'footer_copy_color',
    'priority' => 20,
) ) );

// Footer Icons
$wp_customize->add_setting( 'footer_icon_color' , array(
    'default'     => '#fff',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_icon_color', array(
	'label'        => 'Color de iconos',
	'section'    => 'footer_color',
    'settings'   => 'footer_icon_color',
    'priority' => 30,
) ) );

// Footer Icons Hover
$wp_customize->add_setting( 'footer_icon_hover_color' , array(
    'default'     => '#00a8cc',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_icon_hover_color', array(
	'label'        => 'Color de iconos (al pasar cursor)',
	'section'    => 'footer_color',
    'settings'   => 'footer_icon_hover_color',
    'priority' => 40,
) ) );


/**************************** Footer Widget **************************/
$wp_customize->add_section('footer_widget_color', array(
    'title' => 'Footer Widget Color',
    'panel' => 'footer_panel',
    'priority' => 30,
));

// Background Footer Widget
$wp_customize->add_setting( 'footer_widget_bg' , array(
    'default'     => '#fff',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_widget_bg', array(
	'label'        => 'Fondo Widget Color',
	'section'    => 'footer_widget_color',
    'settings'   => 'footer_widget_bg',
    'priority' => 10,
) ) );

// Text Footer Widget
$wp_customize->add_setting( 'footer_widget_text' , array(
    'default'     => '#0e0f0f',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_widget_text', array(
	'label'        => 'Texto Widget',
	'section'    => 'footer_widget_color',
    'settings'   => 'footer_widget_text',
    'priority' => 20,
) ) );

// Enlaces Footer Widget
$wp_customize->add_setting( 'footer_widget_link' , array(
    'default'     => '#00a8cc',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_widget_link', array(
	'label'        => 'Enlaces Widget',
	'section'    => 'footer_widget_color',
    'settings'   => 'footer_widget_link',
    'priority' => 30,
) ) );

// Enlaces Footer Widget
$wp_customize->add_setting( 'footer_widget_link_hover' , array(
    'default'     => '#29c6e9',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_widget_link_hover', array(
	'label'        => 'Enlaces Widget (pasar cursor)',
	'section'    => 'footer_widget_color',
    'settings'   => 'footer_widget_link_hover',
    'priority' => 40,
) ) );

// Botones Footer Widget
$wp_customize->add_setting( 'footer_widget_btn' , array(
    'default'     => '#0e0f0f',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_widget_btn', array(
	'label'        => 'Boton Widget',
	'section'    => 'footer_widget_color',
    'settings'   => 'footer_widget_btn',
    'priority' => 50,
) ) );

// Texto Btn Footer
$wp_customize->add_setting( 'footer_widget_btn_text' , array(
    'default'     => '#ffff',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
'footer_widget_btn_text', array(
	'label'        => 'Texto Botón',
	'section'    => 'footer_widget_color',
    'settings'   => 'footer_widget_btn_text',
    'priority' => 60,
) ) );

