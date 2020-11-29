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
 * Aranoz elementor section widget.
 *
 * @since 1.0
 */
class Aranoz_Partners extends Widget_Base {

	public function get_name() {
		return 'aranoz-partners';
	}

	public function get_title() {
		return __( 'Partners', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Partners content ------------------------------
		$this->start_controls_section(
			'partners_content',
			[
				'label' => __( 'Our Partners', 'aranoz' ),
			]
		);

		$this->add_control(
            'partner_slider', [
                'label' => __( 'Create New', 'aranoz' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name'  => 'client_logo',
                        'label' => __( 'Client Logo', 'aranoz' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'client_name',
                        'label' => __( 'Client Name', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'default'   => __('Creative', 'aranoz')
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

	}

	protected function render() {

    $settings = $this->get_settings();
    $partners = !empty( $settings['partner_slider'] ) ? $settings['partner_slider'] : '';
    ?>

    <!--::client logo part end::-->
    <section class="client_logo padding_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <?php
                        if( is_array( $partners ) && count( $partners ) > 0 ){
                            foreach ($partners as $partner ) {
                                $image = !empty( $partner['client_logo']['id'] ) ? wp_get_attachment_image( $partner['client_logo']['id'], 'aranoz_partner_img_120x70', '', array('alt' => $partner['client_name'] ) ) : '';
                                ?>
                                <div class="single_client_logo">
                                    <?php
                                        if( $image ){
                                            echo wp_kses_post( $image );
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--::client logo part end::-->
    <?php

    }

}
