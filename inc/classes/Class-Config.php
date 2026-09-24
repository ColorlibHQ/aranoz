<?php 
/**
 * @Packge 	   : Aranoz
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Aranoz{

		
		// Theme Version
		private $aranoz_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new aranoz_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->aranoz_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'aranoz_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'aranoz', ARANOZ_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 23,
				'width'       => 116,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 625,
				'default-image' => get_template_directory_uri() . '/assets/img/banner.png'
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
			add_theme_support( 'post-formats', array( 'video','audio' ) );
			
			// woocommerce support
			add_theme_support( 'woocommerce' );

			// woo product gallery zoom, lightbox, slider support
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
	        
	        // support post-thumbnails
			add_theme_support( 'post-thumbnails', array( 'post' ) );
			
			// Removing default image sizes
			remove_image_size('large');
			remove_image_size('medium');
			remove_image_size('thumbnail');
			
			// Site logo size
			add_image_size( 'aranoz_logo_116x23', 116, 23, true );
			
			// Banner img size
			add_image_size( 'aranoz_banner_thumb_706x353', 706, 353, true );
			
			// Feature product img size
			add_image_size( 'aranoz_feature_product_thumb_344x371', 344, 371, true );
			add_image_size( 'aranoz_feature_product_thumb_245x388', 245, 388, true );
			add_image_size( 'aranoz_feature_product_thumb_226x254', 226, 254, true );
			add_image_size( 'aranoz_feature_product_thumb_554x239', 554, 239, true );
			
			// Awesome & Best seller product img size
			add_image_size( 'aranoz_awesome_product_thumb_263x280', 263, 280, true );
			
			// Single product img size
			add_image_size( 'aranoz_single_product_thumb_446x425', 446, 425, true );
			add_image_size( 'aranoz_single_product_nav_thumb_100x96', 100, 96, true );
					
			// Offer image size
			add_image_size( 'aranoz_offer_img_444x470', 444, 470, true );
					
			// Partner image size
			add_image_size( 'aranoz_partner_img_120x70', 120, 70, true );
					
			// Single blog post image size
			add_image_size( 'aranoz_single_blog_750x375', 750, 375, true );
			add_image_size( 'aranoz_np_thumb', 60, 60, true );

			// Latest post thumbnail Widget thumbnail size
			add_image_size( 'aranoz_widget_post_thumb', 80, 80, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'  => esc_html__( 'Primary Menu', 'aranoz' ),
				'top-products' 	=> esc_html__( 'Top Products', 'aranoz' ),
				'quick-links' 	=> esc_html__( 'Quick Links', 'aranoz' ),
				'features' 		=> esc_html__( 'Features', 'aranoz' ),
				'resources' 	=> esc_html__( 'Resources', 'aranoz' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = ARANOZ_DIR_CSS_URI;
			$jsPath  = ARANOZ_DIR_JS_URI;

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'aranoz-google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'aranoz-bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-5',
					),
					array(
						'handler'		=> 'aranoz-animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'aranoz-owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'aranoz-font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '7.3.1-1',
					),
					array(
						'handler'		=> 'aranoz-themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'aranoz-flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0-s3',
					),
					array(
						'handler'		=> 'aranoz-magnific-popup-css',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'aranoz-slick-css',
						'file' 			=> $cssPath.'slick.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'aranoz-nice-select-css',
						'file' 			=> $cssPath.'nice-select.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'aranoz-default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'aranoz-style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0-s3',
					),
					
					array(
						'handler'		=> 'aranoz-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'aranoz-bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-4',
						'in_footer' 	=> true
					),
					
					array(
						'handler'		=> 'aranoz-ui-js',
						'file' 			=> $jsPath . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'colorlib-ui.js' : 'colorlib-ui.min.js' ),
						'dependency' 	=> array(),
						'version' 		=> '3.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'aranoz-custom',
						'file' 			=> $jsPath.'custom.js',
						'dependency' 	=> array( 'masonry', 'aranoz-ui-js' ),
						'version' 		=> $this->aranoz_version . '-s2',
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){
			$font_url = '';

			/*
			 * The families this theme uses are bundled under
			 * assets/fonts/google, so nothing is fetched from Google and
			 * no request leaves the visitor's browser for a third party.
			 *
			 * Translators can still turn the fonts off for scripts these
			 * families do not cover.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'aranoz' ) ) {
				$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
			}

			return esc_url_raw( $font_url );
		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate aranoz theme customizer
			$aranoz_theme_customizer = new aranoz_theme_customizer();
		}
	} // End Aranoz Class

?>