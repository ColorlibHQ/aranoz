<?php
/**
 * @Packge     : Aranoz
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

	// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 *
 */

add_action( 'aranoz_header', 'aranoz_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'aranoz_footer', 'aranoz_footer_area', 10 );
add_action( 'aranoz_footer', 'aranoz_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'aranoz_wrp_start', 'aranoz_wrp_start_cb', 10 );
add_action( 'aranoz_wrp_end', 'aranoz_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'aranoz_blog_col_start', 'aranoz_blog_col_start_cb', 10 );
add_action( 'aranoz_blog_col_end', 'aranoz_blog_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'aranoz_blog_posts_thumb', 'aranoz_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'aranoz_blog_posts_title', 'aranoz_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'aranoz_blog_posts_meta', 'aranoz_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'aranoz_blog_posts_excerpt', 'aranoz_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'aranoz_blog_posts_content', 'aranoz_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'aranoz_blog_sidebar', 'aranoz_blog_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'aranoz_blog_posts_share', 'aranoz_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'aranoz_blog_single_meta', 'aranoz_blog_single_meta_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'aranoz_page_content', 'aranoz_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'aranoz_fof', 'aranoz_fof_cb', 10 );




