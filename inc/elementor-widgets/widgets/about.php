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
class Aranoz_About_Us extends Widget_Base {

	public function get_name() {
		return 'aranoz-about-us';
	}

	public function get_title() {
		return __( 'About Us', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'about_section',
            [
                'label' => __( 'About Us Section Content', 'aranoz' ),
            ]
        );
        $this->add_control(
			'left_img',
			[
				'label'         => esc_html__( 'Left Image', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
        );
        $this->add_control(
            'about_content',
            [
                'label'         => esc_html__( 'About Us Content', 'aranoz' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>Find out about us in history</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>', 'aranoz' )
            ]
        );
        $this->add_control(
            'about_btnlabel1',
            [
                'label'         => esc_html__( 'Button1 Label', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Install Now', 'aranoz' )
            ]
        );
        $this->add_control(
            'about_btnurl1',
            [
                'label'         => esc_html__( 'Button1 Url', 'aranoz' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'about_btnlabel2',
            [
                'label'         => esc_html__( 'Button2 Label', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Watch Tutorial', 'aranoz' )
            ]
        );
        $this->add_control(
            'about_btnurl2',
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
                    '{{WRAPPER}} .about_us .about_us_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .about_us .about_us_text .btn_1' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn1_bg_color', [
                'label' => __( 'Button1 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_1' => 'background: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_txt_color', [
                'label' => __( 'Button2 Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_bg_color', [
                'label' => __( 'Button2 BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .about_us .about_us_text .btn_1:hover' => 'color: {{VALUE}}!important',
                ],
            ]
        ); 
        $this->add_control(
            'btnn1_hvr_bg_color', [
                'label' => __( 'Button1 Hover BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_1:hover' => 'background: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_hvr_txt_color', [
                'label' => __( 'Button2 Hover Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2:hover' => 'color: {{VALUE}}!important; border-color: {{VALUE}};',
                ],
            ]
        ); 
        $this->add_control(
            'btnn2_hvr_bg_color', [
                'label' => __( 'Button2 Hover BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_us .about_us_text .btn_2:hover' => 'background: {{VALUE}};',
                ],
            ]
        ); 
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['about_content'] ) ? $settings['about_content'] : '';
        $button_label1 = !empty( $settings['about_btnlabel1'] ) ? $settings['about_btnlabel1'] : '';
        $button_url1 = !empty( $settings['about_btnurl1']['url'] ) ? $settings['about_btnurl1']['url'] : '';
        $button_label2 = !empty( $settings['about_btnlabel2'] ) ? $settings['about_btnlabel2'] : '';
        $button_url2 = !empty( $settings['about_btnurl2']['url'] ) ? $settings['about_btnurl2']['url'] : '';
        $left_img   = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'aranoz_about_img_802x767', false, array( 'alt' => 'about left image' ) ) : '';
    ?>

    <!-- about_us part start-->
    <section class="about_us section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-5 col-lg-6 col-xl-6">
                    <div class="learning_img">
                        <?php
                            if( $left_img ){
                                echo wp_kses_post( $left_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="about_us_text">
                        <?php
                            //Content ==============
                            if( $ban_content ){
                                echo wp_kses_post( wpautop( $ban_content ) );
                            }
                            // Buttons =============
                            if( $button_label1 ){
                                echo '<a class="btn_1" href="'. esc_url( $button_url1 ) .'">'. esc_html( $button_label1 ) .'</a>';
                            }
                            if( $button_label2 ){
                                echo '<a class="btn_1" href="'. esc_url( $button_url2 ) .'">'. esc_html( $button_label2 ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about_us part end-->
    <?php

    }
	
}
