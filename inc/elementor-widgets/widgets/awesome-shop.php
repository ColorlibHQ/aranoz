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
 * Aranoz elementor featured product section widget.
 *
 * @since 1.0
 */
class Aranoz_Awesome_Shop extends Widget_Base {

	public function get_name() {
		return 'aranoz-awesome-shop';
	}

	public function get_title() {
		return __( 'Awesome Shop', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Awesome Shop Section ------------------------------
        $this->start_controls_section(
            'awesome_shop_heading',
            [
                'label' => __( 'Awesome Shops', 'aranoz' ),
            ]
        );
        $this->add_control(
            'awesome_shop_header',
            [
                'label'         => esc_html__( 'Heading', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 'awesome <span>shop</span>'
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

    $awesome_shop_header = !empty( $settings['awesome_shop_header'] ) ? $settings['awesome_shop_header'] : '';
    $postlimit = !empty( $settings['postlimit'] ) ? $settings['postlimit'] : '';
    $product_cat = !empty( $settings['product_cat'] ) ? $settings['product_cat'] : '';
    ?>

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <?php
                            if( $awesome_shop_header ){
                                echo '<h2>'.wp_kses_post( nl2br( $awesome_shop_header ) ).'</h2>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <?php
                                    aranoz_featured_products( $postlimit, $product_cat );
                                ?>
                            </div>
                        </div>

                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <?php
                                    aranoz_featured_products( $postlimit, $product_cat );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <?php
    }


    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {
                //product list slider
                var product_list_slider = $('.product_list_slider');
                if (product_list_slider.length) {
                    product_list_slider.owlCarousel({
                    items: 1,
                    loop: true,
                    dots: false,
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    nav: true,
                    navText: ["next", "previous"],
                    smartSpeed: 1000,
                    responsive: {
                        0: {
                        margin: 15,
                        nav: false,
                        items: 1
                        },
                        600: {
                        margin: 15,
                        items: 1,
                        nav: false
                        },
                        768: {
                        margin: 30,
                        nav: true,
                        items: 1
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
