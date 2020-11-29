<?php 
/**
 * @Packge     : Aranoz
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'aranoz_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'aranoz' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(

    /**
     * General Section
     */
    array(
        'id'   => 'aranoz_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'aranoz' ),
            'panel'    => 'aranoz_theme_options_panel',
            'priority' => 1,
        ),
    ),
    
    /**
     * Header Section
     */
    array(
        'id'   => 'aranoz_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'aranoz' ),
            'panel'    => 'aranoz_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'aranoz_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'aranoz' ),
            'panel'    => 'aranoz_theme_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * Woocommerce Section
     */
    array(
        'id'   => 'aranoz_woocommerce_setting_section',
        'args' => array(
            'title'    => esc_html__( 'Woocommerce', 'aranoz' ),
            'panel'    => 'aranoz_theme_options_panel',
            'priority' => 4,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'aranoz_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'aranoz' ),
            'panel'    => 'aranoz_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'aranoz_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'aranoz' ),
            'panel'    => 'aranoz_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>