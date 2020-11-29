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
 * Aranoz elementor cta part section widget.
 *
 * @since 1.0
 */
class Aranoz_Cta_Part extends Widget_Base {

	public function get_name() {
		return 'aranoz-cta-part';
	}

	public function get_title() {
		return __( 'Cta Part', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'cta_part_section',
            [
                'label' => __( 'Cta Part Content', 'aranoz' ),
            ]
        );
        $this->add_control(
            'cta_part_content',
            [
                'label'         => esc_html__( 'Cta Part Header', 'aranoz' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>Very useful Friendly</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo</p>', 'aranoz' )
            ]
        );
        $this->add_control(
            'cta_part_btnlabel1',
            [
                'label'         => esc_html__( 'Button1 Label', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Get Started', 'aranoz' )
            ]
        );
        $this->add_control(
            'cta_part_btnurl1',
            [
                'label'         => esc_html__( 'Button1 Url', 'aranoz' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'cta_part_btnlabel2',
            [
                'label'         => esc_html__( 'Button2 Label', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Sign up free', 'aranoz' )
            ]
        );
        $this->add_control(
            'cta_part_btnurl2',
            [
                'label'         => esc_html__( 'Button2 Url', 'aranoz' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
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
                'label' => __( 'About Us Heading Style', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big  Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .cta_part .banner_btn_1' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn1_bg_color', [
                'label' => __( 'Button1 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .banner_btn_1' => 'background: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_txt_color', [
                'label' => __( 'Button2 Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .banner_btn_2' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_bg_color', [
                'label' => __( 'Button2 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .banner_btn_2' => 'background: {{VALUE}};',
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
                'label' => __( 'Button1 Hover Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .banner_btn_1:hover' => 'color: {{VALUE}}!important',
                ],
            ]
        ); 
        $this->add_control(
            'btnn1_hvr_bg_color', [
                'label' => __( 'Button1 Hover BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .banner_btn_1:hover' => 'background: {{VALUE}}!important;',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_hvr_txt_color', [
                'label' => __( 'Button2 Hover Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .banner_btn_2:hover' => 'color: {{VALUE}}!important;',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_hvr_bg_color', [
                'label' => __( 'Button2 Hover BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta_part .banner_btn_2:hover' => 'background: {{VALUE}}!important;border-color: transparent',
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
                'selector' => '{{WRAPPER}} .cta_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $cta_part_header = !empty( $settings['cta_part_content'] ) ? $settings['cta_part_content'] : '';
        $button_label1 = !empty( $settings['cta_part_btnlabel1'] ) ? $settings['cta_part_btnlabel1'] : '';
        $button_url1 = !empty( $settings['cta_part_btnurl1']['url'] ) ? $settings['cta_part_btnurl1']['url'] : '';
        $button_label2 = !empty( $settings['cta_part_btnlabel2'] ) ? $settings['cta_part_btnlabel2'] : '';
        $button_url2 = !empty( $settings['cta_part_btnurl2']['url'] ) ? $settings['cta_part_btnurl2']['url'] : '';
    ?>

    <!-- cta part start-->
    <section class="cta_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="cta_text text-center">
                        <?php
                            //Content ==============
                            if( $cta_part_header ){
                                echo wp_kses_post( wpautop( $cta_part_header ) );
                            }
                            // Buttons =============
                            if( $button_label1 ){
                                echo '<a class="btn_2 banner_btn_1" href="'. esc_url( $button_url1 ) .'">'. esc_html( $button_label1 ) .'</a>';
                            }
                            if( $button_label2 ){
                                echo '<a class="btn_2 banner_btn_2" href="'. esc_url( $button_url2 ) .'">'. esc_html( $button_label2 ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta part end-->
    <?php

    }
	
}
