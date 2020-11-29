<?php
namespace Aranozelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Aranoz elementor best seller shop section widget.
 *
 * @since 1.0
 */
class Aranoz_Best_Seller_Shop extends Widget_Base {

	public function get_name() {
		return 'aranoz-best-seller-shop';
	}

	public function get_title() {
		return __( 'Best Seller Shop', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Best Seller Shop Section ------------------------------
        $this->start_controls_section(
            'best_seller_heading',
            [
                'label' => __( 'Best Seller Shops', 'aranoz' ),
            ]
        );
        $this->add_control(
            'best_seller_header',
            [
                'label'         => esc_html__( 'Heading', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block' => true,
                'default'       => 'Best Sellers <span>shop</span>',
            ]
        );
        
        $this->add_control(
            'postlimit', [
                'label' => __( 'Post Limit', 'aranoz' ),
                'type'  => Controls_Manager::NUMBER,
                'default'     => 8
            ]
        );
        
        $this->add_control(
            'product_cat', [
                'label' => __( 'Product Category', 'aranoz' ),
                'type'  => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'default'     => 'uncategorized',
                'options'     => [
                    'uncategorized'   => 'Uncategorized',
                    'Chair'           => 'Chair',
                    'tshirts'       => 'tshirts',
                ]
            ]
        );

        $this->end_controls_section(); // End section top content
        

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Heading', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sec_ttitle', [
                'label'     => __( 'Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .feature_part_text h2, .feature_part .single_feature_part h4, .feature_part .feature_part_text .feature_part_text_iner h4' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .feature_part_text p, .feature_part .single_feature_part p, .feature_part .feature_part_text .feature_part_text_iner p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();
        
        // Button Style ==============================
        $this->start_controls_section(
            'btn_styles', [
                'label' => __( 'Button Styles', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'anc_txt_color', [
                'label' => __( 'Anchor Text Hover Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .feature_part_text .btn_4' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'btn_hvr_separator',
            [
                'label'     => __( 'Hover Styles', 'aranoz' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btnn_hover_txt_color', [
                'label' => __( 'Anchor Text Hover Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .feature_part_text .btn_4:hover' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->end_controls_section();

        // Single Feature Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Feature Color Settings', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_border_color', [
                'label'     => __( 'Item Border Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .feature_part_text .feature_part_text_iner' => 'border-color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->add_control(
            'item_hvr_separator',
            [
                'label'     => __( 'Hover Styles', 'aranoz' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'item_hvr_border_color', [
                'label'     => __( 'Item Hover Border Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .feature_part_text .feature_part_text_iner:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );   

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    // call load widget script
    $this->load_widget_script();

    $best_seller_header = !empty( $settings['best_seller_header'] ) ? $settings['best_seller_header'] : '';
    $postlimit = !empty( $settings['postlimit'] ) ? $settings['postlimit'] : '';
    $product_cat = !empty( $settings['product_cat'] ) ? $settings['product_cat'] : '';

    ?>

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <?php
                            if( $best_seller_header ){
                                echo '<h2>'.wp_kses_post( nl2br( $best_seller_header ) ).'</h2>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <?php
                            aranoz_featured_products( $postlimit, $product_cat, 'style2' );
                        ?>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <?php
    }


    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {
                var best_product_slider = $('.best_product_slider');
                if (best_product_slider.length) {
                    best_product_slider.owlCarousel({
                    items: 4,
                    loop: true,
                    dots: false,
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    nav: true,
                    navText: ["next", "previous"],
                    responsive: {
                        0: {
                        margin: 15,
                        items: 1,
                        nav: false
                        },
                        576: {
                        margin: 15,
                        items: 2,
                        nav: false
                        },
                        768: {
                        margin: 30,
                        items: 3,
                        nav: true
                        },
                        991: {
                        margin: 30,
                        items: 4,
                        nav: true
                        }
                    }
                    });
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }

}
