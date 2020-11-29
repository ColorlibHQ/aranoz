<?php 
/**
 * @Packge     : Aranoz
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'aranoz_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'aranoz' ),
        'description' => esc_html__( 'Select the theme color.', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_general_section',
        'default'     => '#0ab6ff',
    )
);

 
// Header background color field
Epsilon_Customizer::add_field(
    'aranoz_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'aranoz' ),
        'description' => esc_html__( 'Select the header background color.', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_header_section',
        'default'     => '#0ab6ff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'aranoz_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_header_section',
        'default'     => '#ffffff',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'aranoz_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_header_section',
        'default'     => '#000000',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'aranoz_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_header_section',
        'default'     => '#ffffff',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'aranoz_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_header_section',
        'default'     => '#ffffff',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'aranoz_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'aranoz' ),
        'description' => esc_html__( 'Set post excerpt length.', 'aranoz' ),
        'section'     => 'aranoz_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'aranoz_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'aranoz' ),
        'section'     => 'aranoz_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'aranoz_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'aranoz' ),
        'section'     => 'aranoz_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'aranoz_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'aranoz' ),
        'section'     => 'aranoz_blog_section',
        'default'     => true
    )
);


/***********************************
 * Woocommerce Section Fields
 ***********************************/

// Shop page product count
Epsilon_Customizer::add_field(
    'aranoz_woo_product_perpage',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Product Per Page', 'aranoz' ),
        'description'       => esc_html__( 'How many products show on shop page?', 'aranoz' ),
        'section'           => 'aranoz_woocommerce_setting_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( '6', 'aranoz' ),
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'aranoz_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'aranoz' ),
        'section'           => 'aranoz_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'aranoz_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'aranoz' ),
        'section'           => 'aranoz_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'aranoz_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'aranoz_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_fof_section',
        'default'     => '#656565',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'aranoz' ),
        'section'     => 'aranoz_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'aranoz_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'aranoz' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'aranoz' ),
        'section'     => 'aranoz_footer_section',
        'default'     => true,
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'aranoz_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'aranoz' ),
        'section'     => 'aranoz_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'aranoz' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'aranoz_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'aranoz' ),
        'section'     => 'aranoz_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Social Profile section
Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile Section', 'aranoz' ),
        'section'     => 'aranoz_footer_section',
        'default'     => true,

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'aranoz_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'aranoz' ),
        'section'     => 'aranoz_footer_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'aranoz_header_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'aranoz_footer_section',
		'label'        => esc_html__( 'Social Profile Links', 'aranoz' ),
        'button_label' => esc_html__( 'Add new social link', 'aranoz' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
        ),
        'default'      => [
            [
                'social_link_title' => esc_html__( 'Facebook', 'aranoz' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-facebook',
            ],
            [
                'social_link_title' => esc_html__( 'Twitter', 'aranoz' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-twitter',
            ],
            [
                'social_link_title' => esc_html__( 'Instagram', 'aranoz' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-instagram',
            ],
            [
                'social_link_title' => esc_html__( 'Behance', 'aranoz' ),
                'social_url'  => '#',
                'social_icon'  => 'fa fa-behance',
            ],
        ],
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'aranoz' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'aranoz' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '#',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'aranoz' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'aranoz_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_footer_section',
        'default'     => '#7f7f7f',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'aranoz_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_footer_section',
        'default'     => '#1a1a1a',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'aranoz_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_footer_section',
        'default'     => '#7f7f7f',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'aranoz_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'aranoz' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'aranoz_footer_section',
        'default'     => '#0ab6ff',
    )
);

