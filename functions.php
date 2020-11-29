<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'ARANOZ_DIR_URI' ) )
		define( 'ARANOZ_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'ARANOZ_DIR_ASSETS_URI' ) )
		define( 'ARANOZ_DIR_ASSETS_URI', ARANOZ_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'ARANOZ_DIR_CSS_URI' ) )
		define( 'ARANOZ_DIR_CSS_URI', ARANOZ_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'ARANOZ_DIR_JS_URI' ) )
		define( 'ARANOZ_DIR_JS_URI', ARANOZ_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('ARANOZ_DIR_ICON_IMG_URI') )
		define( 'ARANOZ_DIR_ICON_IMG_URI', ARANOZ_DIR_ASSETS_URI.'img/icon/' );
	
	// Animate Icon Images
	if( !defined('ARANOZ_DIR_ANIMATE_ICON_IMG_URI') )
		define( 'ARANOZ_DIR_ANIMATE_ICON_IMG_URI', ARANOZ_DIR_ASSETS_URI.'img/animate_icon/' );
	
	//DIR inc
	if( !defined( 'ARANOZ_DIR_INC' ) )
		define( 'ARANOZ_DIR_INC', ARANOZ_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'ARANOZ_DIR_ELEMENTOR' ) )
		define( 'ARANOZ_DIR_ELEMENTOR', ARANOZ_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'ARANOZ_DIR_PATH' ) )
		define( 'ARANOZ_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'ARANOZ_DIR_PATH_INC' ) )
		define( 'ARANOZ_DIR_PATH_INC', ARANOZ_DIR_PATH.'inc/' );

	//Hooks Folder Directory
	if( !defined( 'ARANOZ_DIR_PATH_HOOKS' ) )
		define( 'ARANOZ_DIR_PATH_HOOKS', ARANOZ_DIR_PATH_INC.'hooks/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'ARANOZ_DIR_PATH_LIB' ) )
		define( 'ARANOZ_DIR_PATH_LIB', ARANOZ_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'ARANOZ_DIR_PATH_CLASSES' ) )
		define( 'ARANOZ_DIR_PATH_CLASSES', ARANOZ_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'ARANOZ_DIR_PATH_WIDGET' ) )
		define( 'ARANOZ_DIR_PATH_WIDGET', ARANOZ_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'ARANOZ_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'ARANOZ_DIR_PATH_ELEMENTOR_WIDGETS', ARANOZ_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( ARANOZ_DIR_PATH_INC . 'aranoz-breadcrumbs.php' );
	// Sidebar register file include
	require_once( ARANOZ_DIR_PATH_INC . 'widgets/aranoz-widgets-reg.php' );
	// Post widget file include
	require_once( ARANOZ_DIR_PATH_INC . 'widgets/aranoz-recent-post-thumb.php' );
	// News letter widget file include
	require_once( ARANOZ_DIR_PATH_INC . 'widgets/aranoz-newsletter-widget.php' );
	//Social Links
	require_once( ARANOZ_DIR_PATH_INC . 'widgets/aranoz-social-links.php' );
	// Instagram Widget
	require_once( ARANOZ_DIR_PATH_INC . 'widgets/aranoz-instagram.php' );
	// Nav walker file include
	require_once( ARANOZ_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( ARANOZ_DIR_PATH_INC . 'aranoz-functions.php' );
	// Woocommerce function file include
	require_once( ARANOZ_DIR_PATH_INC . 'aranoz-woo-functions.php' );

	// Theme Demo file include
	require_once( ARANOZ_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( ARANOZ_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( ARANOZ_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( ARANOZ_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( ARANOZ_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( ARANOZ_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( ARANOZ_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( ARANOZ_DIR_PATH_CLASSES . 'Class-Config.php' );

	// Hooks
	// require_once( ARANOZ_DIR_PATH_HOOKS . 'hooks.php' );
	// require_once( ARANOZ_DIR_PATH_HOOKS . 'hooks-functions.php' );

	// Customizer
	require_once( ARANOZ_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( ARANOZ_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class aranoz dashboard
	require_once( ARANOZ_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Common css
	require_once( ARANOZ_DIR_PATH_INC . 'aranoz-commoncss.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( ARANOZ_DIR_PATH_INC . 'aranoz-metabox.php' );
	}
	

	// Admin Enqueue Script
	function aranoz_admin_script(){
		wp_enqueue_style( 'aranoz-admin', get_template_directory_uri().'/assets/css/aranoz_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'aranoz_admin', get_template_directory_uri().'/assets/js/aranoz_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'aranoz_admin_script' );

	 
	// WooCommerce style disable
	// add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Aranoz object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Aranoz Dashboard .
	 *
	 */
	
	$Aranoz = new Aranoz();
	
