<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'aranoz' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( aranoz_opt( 'aranoz_footer_copyright_text' ) ) ? aranoz_opt( 'aranoz_footer_copyright_text' ) : $copyText;
    $footer_class = aranoz_opt( 'aranoz_footer_widget_toggle' ) == 1 ? ' footer-area' : ' no_widget';
    ?>

    <!-- footer part start-->
    
    <footer class="footer_part<?php echo esc_attr($footer_class);?>">
        <div class="container">
            <?php
                if( aranoz_opt( 'aranoz_footer_widget_toggle' ) == 1 ) {
            ?>
            <div class="row justify-content-around">
                <?php
                    // Footer Widget 1
                    // if ( is_active_sidebar( 'footer-1' ) ) {
                    //     echo '<div class="col-sm-6 col-lg-3">';
                    //         if( !empty( $footer_logo ) ) {
                    //             echo '<a href="'. esc_url( home_url('/') ) .'" class="footer_logo_iner"> <img src="'. $footer_logo_src[0] .'" alt="footer logo"> </a>';    
                    //         }
                    //         dynamic_sidebar( 'footer-1' );
                    //     echo '</div>';
                    // }

                    // Footer Widget 1
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    }

                    // Footer Widget 2
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    }

                    // Footer Widget 3
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    }

                    // Footer Widget 4
                    if ( is_active_sidebar( 'footer-4' ) ) {
                        dynamic_sidebar( 'footer-4' );
                    }

                    // Footer Widget 5
                    if ( is_active_sidebar( 'footer-5' ) ) {
                        dynamic_sidebar( 'footer-5' );
                    }
                ?>
                </div>
                <?php
                }
            ?>
        </div>
        
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <p class="footer-text m-0"><?php echo wp_kses_post( $copyRight ); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <?php
                                $social_opt = aranoz_opt('aranoz_social_profile_toggle');
                                if ( $social_opt == true ) {
                                    $social_items = aranoz_opt('aranoz_header_social');
                                    if( is_array( $social_items ) && count( $social_items ) > 0 ){
                                        foreach ($social_items as $value) {
                                            echo '<li><a href="'. $value['social_url'] .'" class="single_social_icon"><i class="'. $value['social_icon'] .'"></i></a></li>';
                                        }
                                    }          
                                }   
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>