<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Aranoz
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

 
function aranoz_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'aranoz'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'aranoz'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget_title">',
        'after_title'   => '</h4>'
	));
	
	// Woo page sidebar widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Woo Page Sidebar', 'aranoz' ),
			'id'            => 'aranoz-woo-sidebar',
			'before_widget' => '<aside id="%1$s" class="left_widgets p_filter_widgets %2$s">',
			'after_widget'  => '</div></aside>',
			'before_title'  => '<div class="l_w_title"><h3>',
			'after_title'   => '</h3></div><div class="widgets_inner">',
		)
	);

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'aranoz' ),
			'id'            => 'footer-1',
			'before_widget' => '<div class="col-sm-6 col-lg-2"><div id="%1$s" class="single_footer_part footer_1 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'aranoz' ),
			'id'            => 'footer-2',
			'before_widget' => '<div class="col-sm-6 col-lg-2"><div id="%1$s" class="single_footer_part footer_2 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'aranoz' ),
			'id'            => 'footer-3',
			'before_widget' => '<div class="col-sm-6 col-lg-2"><div id="%1$s" class="single_footer_part footer_3 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'aranoz' ),
			'id'            => 'footer-4',
			'before_widget' => '<div class="col-sm-6 col-lg-2"><div id="%1$s" class="single_footer_part footer_4 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Five', 'aranoz' ),
			'id'            => 'footer-5',
			'before_widget' => '<div class="col-sm-6 col-lg-4"><div id="%1$s" class="single_footer_part footer_5 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	

}
add_action( 'widgets_init', 'aranoz_widgets_init' );
