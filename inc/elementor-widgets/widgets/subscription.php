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
 * Aranoz elementor subscription section widget.
 *
 * @since 1.0
 */
class Aranoz_Subscription extends Widget_Base {

	public function get_name() {
		return 'aranoz-subscription';
	}

	public function get_title() {
		return __( 'Subscription', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-mailchimp';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

        // Subscription Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'aranoz' ),
			]
        );
        $this->add_control(
			'sec_sub_title',
			[
				'label'         => esc_html__( 'Section Sub Title', 'aranoz' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'Join Our Newsletter', 'aranoz' )
			]
        );
        $this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Section Title', 'aranoz' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'Subscribe to get Updated with new offers', 'aranoz' )
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
				'default'       => esc_html__( 'SUBSCRIBE NOW', 'aranoz' )
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
    
	$sec_sub_title      = !empty( $settings['sec_sub_title'] ) ? $settings['sec_sub_title'] : '';
	$sec_title      	= !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
	$subscription_url   = !empty( $settings['subscription_url']['url'] ) ? $settings['subscription_url']['url'] : '';
	$btn_label          = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    ?>

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5><?php echo esc_html($sec_sub_title)?></h5>
                        <h2><?php echo esc_html($sec_title)?></h2>

						<form target="_blank" action="<?php echo esc_url( $subscription_url )?>" method="post" class="subscribe_form relative mail_part" id="mc_embed_signup_new_offer">
							<div class="input-group">
								<input type="email" name="EMAIL" class="form-control" placeholder="enter email address">
								<div class="input-group-append">
									<button class="btn input-group-text btn_2" type="submit"><?php echo esc_html( $btn_label )?></button>
								</div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <?php

    }
	
}
