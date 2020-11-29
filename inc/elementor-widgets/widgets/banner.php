<?php
namespace Aranozelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Aranoz elementor about us section widget.
 *
 * @since 1.0
 */
class Aranoz_Banner extends Widget_Base {

	public function get_name() {
		return 'aranoz-banner';
	}

	public function get_title() {
		return __( 'Banner', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'aranoz' ),
            ]
        );
        $this->add_control(
            'aranozslider', [
                'label' => __( 'Create Slider', 'aranoz' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'aranoz' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Wood & Cloth Sofa'
                    ],
                    [
                        'name' => 'titletwo',
                        'label' => __( 'Sub Title', 'aranoz' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => 'Incididunt ut labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida. Risus commodo viverra'
                    ],
                    [
                        'name' => 'btnlabel',
                        'label' => __( 'Button Text', 'aranoz' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'buy now'
                    ],
                    [
                        'name' => 'btnurl',
                        'label' => __( 'Button Url', 'aranoz' ),
                        'show_external' => false,
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'slider_img',
                        'label' => __( 'Slider Background Image', 'aranoz' ),
                        'type' => Controls_Manager::MEDIA,
                    ],


                ],
            ]
		);

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Banner Heading Style', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big  Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h1' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text p' => 'color: {{VALUE}};',
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
            'btnn1_txt_color', [
                'label' => __( 'Button1 Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_1' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn1_bg_color', [
                'label' => __( 'Button1 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_1' => 'background: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_txt_color', [
                'label' => __( 'Button2 Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_2' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_bg_color', [
                'label' => __( 'Button2 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_2' => 'background: {{VALUE}};',
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
            'btnn1_hvr_txt_color', [
                'label' => __( 'Button1 Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_1:hover' => 'color: {{VALUE}}!important;',
                ],
            ]
        ); 
        $this->add_control(
            'btnn1_hvr_bg_color', [
                'label' => __( 'Button1 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_1:hover' => 'background: {{VALUE}}!important;',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_hvr_txt_color', [
                'label' => __( 'Button2 Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_2:hover' => 'color: {{VALUE}}!important;',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_hvr_bg_color', [
                'label' => __( 'Button2 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_btn_2:hover' => 'background: {{VALUE}}!important; border-color: transparent!important;',
                ],
            ]
        ); 
        $this->end_controls_section();


        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'aranoz' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();

        // call load widget script
        $this->load_widget_script();

        $slider_content = !empty( $settings['aranozslider'] ) ? $settings['aranozslider'] : '';  
    ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                    <?php 
                        if( is_array( $slider_content ) && count( $slider_content ) > 0 ) {
                            $counter = 1;
                            foreach( $slider_content as  $slider ) {
                                $slide_title = !empty( $slider['label'] ) ? $slider['label'] : '';
                                $sub_title   = !empty( $slider['titletwo'] ) ? $slider['titletwo'] : '';
                                $btnlabel    = !empty( $slider['btnlabel'] ) ? $slider['btnlabel'] : '';
                                $btnurl      = !empty( $slider['btnurl']['url'] ) ? $slider['btnurl']['url'] : '';
                                $slide_img   = !empty( $slider['slider_img']['id'] ) ? wp_get_attachment_image( $slider['slider_img']['id'], 'aranoz_banner_thumb_706x353', false, array( 'alt' => 'slider image ' . $counter++ ) ) : '';
                            ?>
                            <div class="single_banner_slider">
                                <div class="row">
                                    <div class="col-lg-5 col-md-8">
                                        <div class="banner_text">
                                            <div class="banner_text_iner">
                                                <h1><?php echo esc_html( $slide_title )?></h1>
                                                <p><?php echo esc_html( $sub_title )?></p>
                                                <a href="<?php echo esc_url( $btnurl )?>" class="btn_2"><?php echo esc_html( $btnlabel )?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner_img d-none d-lg-block">
                                        <?php
                                            if( $slide_img ){
                                                echo wp_kses_post( $slide_img );
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->
    <?php

    }


    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {
                //single banner slider
                $('.banner_slider').on('initialized.owl.carousel changed.owl.carousel', function (e) {
                    function pad2(number) {
                    return (number < 10 ? '0' : '') + number
                    }
                    var carousel = e.relatedTarget;
                    $('.slider-counter').text(pad2(carousel.current()));

                }).owlCarousel({
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
                        nav: false
                    },
                    600: {
                        nav: false
                    },
                    768: {
                        nav: true
                    }
                    }
                });
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
