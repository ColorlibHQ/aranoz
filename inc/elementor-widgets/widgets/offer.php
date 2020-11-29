<?php
namespace Aranozelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Aranoz elementor offer section widget.
 *
 * @since 1.0
 */
class Aranoz_Offer extends Widget_Base {

	public function get_name() {
		return 'aranoz-offer';
	}

	public function get_title() {
		return __( 'Offer', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-gallery-justified';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

        // Offer Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Offer Section', 'aranoz' ),
			]
        );
        $this->add_control(
            'offer_img',
            [
                'label'         => esc_html__( 'Left Image', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Section Title', 'aranoz' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'Weekly Sale on 60% Off All Products', 'aranoz' )
			]
        );
        $this->add_control(
			'offer_date',
			[
				'label'         => esc_html__( 'Offer Date', 'aranoz' ),
				'type'  => Controls_Manager::DATE_TIME,
                'label_block' => true,
                'default' => __( '24 sep 2022 9:56:00', 'aranoz' )
			]
        );
        
        $this->add_control(
			'subscription_url',
			[
				'label'         => esc_html__( 'Subscription URL', 'aranoz' ),
				'type'          => Controls_Manager::URL,
				'label_block'   => true,
				'default'       => [
                    'url'       => 'https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01'
                ]
			]
        );
        $this->add_control(
			'btn_label',
			[
				'label'         => esc_html__( 'Button Label', 'aranoz' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'BOOK NOW', 'aranoz' )
			]
        );
		$this->end_controls_section();  

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Section Heading', 'aranoz' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_ttitle', [
				'label'     => __( 'Title Color', 'aranoz' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upcomming_war_part .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'shade_ttitle', [
				'label'     => __( 'Title Shade Color', 'aranoz' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upcomming_war_part .section_tittle h2:after' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();
        

        // Single Offer Item style
		$this->start_controls_section(
			'sing_gal_item_style', [
				'label' => __( 'Single Offer Item Style', 'aranoz' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_hvr_txt_color', [
				'label'     => __( 'Item Hover Text Color', 'aranoz' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upcomming_war_part .single_upcomming_war_item .single_upcomming_war_item_iner .upcomming_war_item_text p, .upcomming_war_part .single_upcomming_war_item .single_upcomming_war_item_iner .upcomming_war_item_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_hvr_shd_bg_color', [
				'label'     => __( 'Item Hover Shade BG Color', 'aranoz' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upcomming_war_part .single_upcomming_war_item .single_upcomming_war_item_iner:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_txt_shd_sep',
            [
                'label'     => __( 'Background Shade Text', 'aranoz' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bg_txt_shd',
                'label' => __( 'Section Background', 'aranoz' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .upcomming_war',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    // call load widget script
    $this->load_widget_script();
    
	$offer_img          = !empty( $settings['offer_img']['id'] ) ? wp_get_attachment_image($settings['offer_img']['id'], 'aranoz_offer_img_444x470', false, ['alt' => 'offer image']) : '';
	$sec_title          = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
	$offer_date         = !empty( $settings['offer_date'] ) ? $settings['offer_date'] : '';
	$subscription_url   = !empty( $settings['subscription_url']['url'] ) ? $settings['subscription_url']['url'] : '';
	$btn_label          = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    ?>

    <!-- awesome_shop start-->
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_img">
                        <?php
                            if( $offer_img ){
                                echo wp_kses_post( $offer_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2><?php echo esc_html($sec_title)?></h2>
                        <div class="date_countdown" data-offer-date="<?php echo esc_html($offer_date)?>">
                            <div id="timer">
                                <div id="days" class="date"></div>
                                <div id="hours" class="date"></div>
                                <div id="minutes" class="date"></div>
                                <div id="seconds" class="date"></div>
                            </div>
                        </div>

                        <form target="_blank" action="<?php echo esc_url( $subscription_url )?>" method="post" class="subscribe_form relative mail_part" id="mc_embed_signup_60_percent_products">
                            <div class="input-group">
                                <div class="input-group">
                                    <input type="email" name="EMAIL" id="newsletter-form-email" placeholder="Enter Email Address" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn input-group-text" type="submit"><?php echo esc_html( $btn_label )?></button>
                        
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="info"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awesome_shop part start-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            //------- makeTimer js --------//  
            function makeTimer() {

                var offerDate = $('.date_countdown').data('offer-date');	
                var endTime = new Date( offerDate );
                endTime = (Date.parse(endTime) / 1000);

                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") {
                hours = "0" + hours;
                }
                if (minutes < "10") {
                minutes = "0" + minutes;
                }
                if (seconds < "10") {
                seconds = "0" + seconds;
                }

                $("#days").html("<span>Days</span>" + days);
                $("#hours").html("<span>Hours</span>" + hours);
                $("#minutes").html("<span>Minutes</span>" + minutes);
                $("#seconds").html("<span>Seconds</span>" + seconds);

            }

            setInterval(function () {
                makeTimer();
            }, 1000);

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
