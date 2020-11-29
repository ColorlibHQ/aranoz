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


// Header menu hook function
if ( ! function_exists( 'aranoz_header_cb' ) ) {
	function aranoz_header_cb() {
		if ( ! is_404() ) {

			$current_page_id = get_the_ID();

			// Page layout from
			$layoutfrom = get_post_meta( absint( $current_page_id ), '_aranoz_page_layout_from', true );

			// Global header style
			$home_style = aranoz_global_header_opt();

			// Page style
			if ( $layoutfrom && $layoutfrom == 'pagemeta' ) {
				$home_style = get_post_meta( absint( $current_page_id ), '_aranoz_page_style', true );
			}

			// Page header show/hide
			$pageheader = get_post_meta( absint( $current_page_id ), '_aranoz_page_header', true );

			get_template_part( 'templates/header', 'top' . esc_html( $home_style ) );

			if ( $home_style == '3' ) {
				echo '<div class="container1-page">';
			}

			if ( $pageheader != 'hide' ) {
				get_template_part( 'templates/header', 'bottom' );
			}
		}

	}
}

// Footer area hook function
if ( ! function_exists( 'aranoz_footer_area' ) ) {
	function aranoz_footer_area() {
		$home_style_three = aranoz_opt( 'aranoz_select_headerthree_id' );
		$globalheader     = aranoz_opt( 'aranoz_select_globalheader_id' );
		$current_page_id  = get_the_ID();
		if ( ! is_404() ) {
			echo '<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">';
			// Footer widget
			if ( aranoz_opt( 'aranoz-widget-toggle-settings', true ) ) {
				get_template_part( 'templates/footer', 'widgets' );
			}

			// Footer bottom
			get_template_part( 'templates/footer', 'bottom' );
			echo '</footer>';
			if ( $current_page_id == $home_style_three || $globalheader == '3' ) {
				echo '</div>';
			}
		}
	}
}

// Footer back to top hook function
if ( ! function_exists( 'aranoz_back_to_top' ) ) {
	function aranoz_back_to_top() {
		$opt = get_theme_mod( 'aranoz-gototop-toggle-settings', true );

		if ( $opt ) :
			?>
				<div class="btn-back-to-top bg0-hov" id="myBtn">
					<span class="symbol-btn-back-to-top">
						<i class="fa fa-angle-double-up" aria-hidden="true"></i>
					</span>
				</div>
			<?php
			endif;
	}
}

// Blog, single, page, search, archive pages wrapper start hook function.
if ( ! function_exists( 'aranoz_wrp_start_cb' ) ) {
	function aranoz_wrp_start_cb() {
		$padding = '';
		if ( ! is_single() ) {
			if ( is_page() ) {
				$padding = ' p-t-66 p-b-60';
			} else {
				$padding = ' p-b-25';
			}
		}
		echo '<section class="p-t-60' . esc_attr( $padding ) . '"><div class="container"><div class="row">';
	}
}

// Blog, single, page, search, archive pages wrapper end hook function.
if ( ! function_exists( 'aranoz_wrp_end_cb' ) ) {
	function aranoz_wrp_end_cb() {
		echo '</div></div></section>';
	}
}

// Blog, single, search, archive pages column start hook function.
if ( ! function_exists( 'aranoz_blog_col_start_cb' ) ) {
	function aranoz_blog_col_start_cb() {

		$sidebar_opt = aranoz_sidebar_opt();

		if ( ! is_page() ) {
			$pull_right = aranoz_pull_right( $sidebar_opt, '3' );

			if ( $sidebar_opt != '1' ) {
				$col = '9' . $pull_right;
			} else {
				$col = '10 offset-lg-1';
			}
		} else {

			if ( ! aranoz_is_cca_page() ) {
				$col = '9';
			} else {
				$col = '12';
			}
		}

		// single page should be p-b-80
		echo '<div class="col-md-' . esc_attr( $col ) . ' col-lg-' . esc_attr( $col ) . ' p-b-75"><div class="p-r-50 p-r-0-lg">';
	}
}

// Blog, single, search, archive pages column end hook function.
if ( ! function_exists( 'aranoz_blog_col_end_cb' ) ) {
	function aranoz_blog_col_end_cb() {
		echo '</div></div>';
	}
}

// Blog post thumbnail hook function.
if ( ! function_exists( 'aranoz_blog_posts_thumb_cb' ) ) {
	function aranoz_blog_posts_thumb_cb() {
		// Thumbnail Show
		if ( has_post_thumbnail() ) {

			if ( ! is_single() ) {

				$date_format = get_option( 'date_format' );

				$html = '';

				$html .= '<a href="' . esc_url( get_the_permalink() ) . '" class="item-blog-img pos-relative dis-block hov-img-zoom">';
				$html .= aranoz_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() ),
					)
				);
				$html .= '<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">' . esc_html( get_the_date( $date_format ) ) . '</span>';
				$html .= '</a>';

			} else {

				$html  = '';
				$html .= '<div class="blog-detail-img wrap-pic-w">';
				$html .= aranoz_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() ),
					)
				);
				$html .= '</div>';

			}
			echo wp_kses_post( $html );

		}
		// Thumbnail check and video and audio thumb show
		if ( ! is_single() && ! has_post_thumbnail() ) {
			$html = '';
			if ( has_post_format( array( 'video' ) ) ) {

				$html .= '<div class="post--img blog-post-video">';
				$html .= aranoz_embedded_media( array( 'video', 'iframe' ) );
				$html .= '</div>';

			} else {

				if ( has_post_format( array( 'audio' ) ) ) {

					$html .= '<div class="post--img blog-post-audio">';
					$html .= aranoz_embedded_media( array( 'audio', 'iframe' ) );
					$html .= '</div>';
				}
			}

			echo apply_filters( 'aranoz_audio_embedded_media', $html );

		}
	}
}

// Blog post title hook function.
if ( ! function_exists( 'aranoz_blog_posts_title_cb' ) ) {
	function aranoz_blog_posts_title_cb() {
		if ( get_the_title() ) {

			$html = '';

			$html .= '<h4 class="p-b-11"><a href="' . esc_url( get_the_permalink() ) . '" class="m-text24">' . esc_html( get_the_title() ) . '</a></h4>';

			echo wp_kses_post( $html );

		}
	}
}

// Blog posts meta hook function.
if ( ! function_exists( 'aranoz_blog_posts_meta_cb' ) ) {
	function aranoz_blog_posts_meta_cb() {
		$dividar = '<span class="m-l-3 m-r-6">|</span>';

		if ( is_single() && get_the_title() ) {
			echo aranoz_heading_tag(
				array(
					'tag'   => 'h4',
					'text'  => esc_html( get_the_title() ),
					'class' => 'p-b-11 m-text24',
				)
			);

		}

		echo '<div class="s-text8 flex-w flex-m p-b-21">';
			// Post Date
		if ( get_the_author() ) {
			echo '<span>';
				echo esc_html__( 'By ', 'aranoz' ) . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';
				echo wp_kses_post( $dividar );
			echo '</span>';
		}
			// Post date
		if ( is_single() ) {
			echo '<span>';
				the_date();
			echo wp_kses_post( $dividar );
			echo '</span>';
		}

		// Post category
		$cats = get_the_category();

		$categories = '';

		$categories .= '<span class="post-cat">';

		if ( is_array( $cats ) && count( $cats ) > 0 ) {

			foreach ( $cats as $cat ) {
				$categories .= '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="category-link">' . esc_html( $cat->name ) . '</a>';
			}
		}

		$categories .= $dividar;
		$categories .= '</span>';

		echo wp_kses_post( $categories );

		// Post Comment Count
		echo '<span>';
		comments_popup_link( esc_html__( '0 Comment', 'aranoz' ), esc_html__( '1 Comment', 'aranoz' ), esc_html__( '% Comments', 'aranoz' ) );
		echo '</span>';

		echo '</div>';
	}
}

// Blog posts excerpt hook function.
if ( ! function_exists( 'aranoz_blog_posts_excerpt_cb' ) ) {
	function aranoz_blog_posts_excerpt_cb() {
		?>
			<div class="p-b-12">
			<?php
			// Post excerpt
			echo aranoz_excerpt_length( absint( aranoz_opt( 'aranoz_post_excerpt' ) ) );

			// Link Pages
			aranoz_link_pages();
			?>
			</div>
			<a href="<?php the_permalink(); ?>" class="s-text20">
				<?php esc_html_e( 'Continue Reading', 'aranoz' ); ?>
				<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
			</a>
			<?php

	}
}

// Blog posts content hook function.
if ( ! function_exists( 'aranoz_blog_posts_content_cb' ) ) {
	function aranoz_blog_posts_content_cb() {

		the_content();
		// Link Pages
		aranoz_link_pages();

	}
}

// Page content hook function.
if ( ! function_exists( 'aranoz_page_content_cb' ) ) {
	function aranoz_page_content_cb() {
		?>
			<div class="page--content">
			<?php
			the_content();

			// Link Pages
			aranoz_link_pages();
			?>

			</div>
			<?php
			// comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
	}
}

// Blog page sidebar hook function.
if ( ! function_exists( 'aranoz_blog_sidebar_cb' ) ) {
	function aranoz_blog_sidebar_cb() {

		$sidebar_opt = aranoz_sidebar_opt();

		if ( ! aranoz_is_cca_page() ) {
			if ( $sidebar_opt != '1' || is_page() ) {
				get_sidebar();
			}
		}

	}
}


// Blog single post  social share hook function.
if ( ! function_exists( 'aranoz_blog_posts_share_cb' ) ) {
	function aranoz_blog_posts_share_cb() {

		if ( function_exists( 'aranoz_social_sharing_buttons' ) ) {
			aranoz_social_sharing_buttons();
		}
	}
}

/**
 * Blog single post meta category, tag, next-previous link, comments form and biography hook function.
 */
if ( ! function_exists( 'aranoz_blog_single_meta_cb' ) ) {
	function aranoz_blog_single_meta_cb() {

		$tags = aranoz_post_tags();

		if ( $tags ) {
			echo '<div class="flex-m flex-w p-t-20">';
				echo '<span class="s-text20 p-r-20">' . esc_html__( 'Post Tags', 'aranoz' ) . '</span>';
				echo '<div class="wrap-tags flex-w">';
				// single post tag
				echo wp_kses_post( $tags );

				echo '</div>';
			echo '</div>';
		}

		// Author biography
		if ( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'templates/biography' );
		}

	}
}

	// Blog 404 page hook function.
if ( ! function_exists( 'aranoz_fof_cb' ) ) {
	function aranoz_fof_cb() {
		get_template_part( 'templates/404' );
	}
}



?>
