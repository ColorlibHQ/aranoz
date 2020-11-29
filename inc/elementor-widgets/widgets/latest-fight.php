<?php
namespace Aranozelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Aranoz elementor Latest Fight section widget.
 *
 * @since 1.0
 */
class Aranoz_Latest_Fight extends Widget_Base {

	public function get_name() {
		return 'aranoz-latest-fight';
	}

	public function get_title() {
		return __( 'Latest Fight', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Latest Fight Section ------------------------------
        $this->start_controls_section(
            'latest_fight_sum_section',
            [
                'label' => __( 'Latest Fight Summary', 'aranoz' ),
            ]
        );
        $this->add_control(
            'latest_fight_header',
            [
                'label'         => esc_html__( 'Section Header', 'aranoz' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Latest War Fight', 'aranoz' )
            ]
        );
        $this->add_control(
            'top_logo',
            [
                'label'         => esc_html__( 'Top Logo', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'war_title',
            [
                'label'         => esc_html__( 'War Title', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Open War chalange', 'aranoz' )
            ]
        );
        $this->add_control(
            'war_date',
            [
                'label'         => esc_html__( 'War Date', 'aranoz' ),
                'type'  => Controls_Manager::DATE_TIME,
                'picker_options' => [
                    'dateFormat' => 'd M, Y'
                ],
                // 'label_block'   => true,
                // 'default'       => esc_html__( '27 june , 2020', 'aranoz' )
            ]
        );
        $this->add_control(
            'view_fight',
            [
                'label'         => esc_html__( 'View Fight', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'view fight', 'aranoz' )
            ]
        );
        $this->add_control(
            'warrior_logo1',
            [
                'label'         => esc_html__( 'Warrior Logo 1', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'warrior_logo2',
            [
                'label'         => esc_html__( 'Warrior Logo 2', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'warrior_1',
            [
                'label'         => esc_html__( 'Warrior 1', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( '190', 'aranoz' )
            ]
        );
        $this->add_control(
            'warrior_2',
            [
                'label'         => esc_html__( 'Warrior 2', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( '189', 'aranoz' )
            ]
        );
        $this->add_control(
            'hvr_btn_label',
            [
                'label'         => esc_html__( 'Hover Button Label', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Watch Tutorial', 'aranoz' )
            ]
        );
        $this->add_control(
            'hvr_btn_url',
            [
                'label'         => esc_html__( 'Hover Button Url', 'aranoz' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End section top content


        // ----------------------------------------  Latest War List Section ------------------------------
        $this->start_controls_section(
            'latest_war_section',
            [
                'label' => __( 'Latest War List', 'aranoz' ),
            ]
        );

        $repeater->add_control(
            'latest_war_logo1',
            [
                'label'     => __( 'Warrior Logo 1', 'aranoz' ),
                'type'      => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater->add_control(
            'latest_war_logo2',
            [
                'label'     => __( 'Warrior Logo 2', 'aranoz' ),
                'type'      => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $repeater->add_control(
            'latest_war_1',
            [
                'label' => __( 'Warrior 1', 'aranoz' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '190', 'aranoz' )
            ]
        );
        $repeater->add_control(
            'latest_war_2',
            [
                'label' => __( 'Warrior 2', 'aranoz' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '189', 'aranoz' )
            ]
        );
        $repeater->add_control(
            'latest_war_date',
            [
                'label' => __( 'War Date', 'aranoz' ),
                'type'  => Controls_Manager::DATE_TIME,
                'picker_options' => [
                    'dateFormat' => 'd M, Y'
                ],
                'label_block' => true,
                'default' => __( '27 June, 2020', 'aranoz' )
            ]
        );
        $repeater->add_control(
            'latest_war_title',
            [
                'label' => __( 'War Title', 'aranoz' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Open War chalange', 'aranoz' )
            ]
        );

        $this->add_control(
            'war_list_contents', [
                'label' => __( 'Create New', 'aranoz' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ latest_war_title }}}',
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'latest_war_logo1' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'latest_war_logo2' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'latest_war_1'     => __( '190', 'aranoz' ),
                        'latest_war_2'     => __( '189', 'aranoz' ),
                        'latest_war_date'  => __( '27 June, 2020', 'aranoz' ),
                        'latest_war_title' => __( 'Open War chalange', 'aranoz' ),
                    ],
                    [
                        'latest_war_logo1' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'latest_war_logo2' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'latest_war_1'     => __( '190', 'aranoz' ),
                        'latest_war_2'     => __( '189', 'aranoz' ),
                        'latest_war_date'  => __( '27 June, 2020', 'aranoz' ),
                        'latest_war_title' => __( 'Open War chalange', 'aranoz' ),
                    ],
                ]
            ]
        );

        $this->add_control(
            'right_cont_sep',
            [
                'label'         => esc_html__( 'Right Contents', 'aranoz' ),
                'type'          => Controls_Manager::HEADING,
                'separator'     => 'after'
            ]
        );

        $this->add_control(
            'right_top_logo',
            [
                'label'         => esc_html__( 'Top Logo', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'right_war_title',
            [
                'label'         => esc_html__( 'War Title', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Open War chalange', 'aranoz' )
            ]
        );
        $this->add_control(
            'right_war_date',
            [
                'label'         => esc_html__( 'War Date', 'aranoz' ),
                'type'  => Controls_Manager::DATE_TIME,
                'picker_options' => [
                    'dateFormat' => 'd M, Y'
                ],
                // 'label_block'   => true,
                // 'default'       => esc_html__( '27 june , 2020', 'aranoz' )
            ]
        );
        $this->add_control(
            'right_view_fight',
            [
                'label'         => esc_html__( 'View Fight', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'view fight', 'aranoz' )
            ]
        );
        $this->add_control(
            'right_warrior_logo1',
            [
                'label'         => esc_html__( 'Warrior Logo 1', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'right_warrior_logo2',
            [
                'label'         => esc_html__( 'Warrior Logo 2', 'aranoz' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'right_warrior_1',
            [
                'label'         => esc_html__( 'Warrior 1', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( '190', 'aranoz' )
            ]
        );
        $this->add_control(
            'right_warrior_2',
            [
                'label'         => esc_html__( 'Warrior 2', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( '189', 'aranoz' )
            ]
        );
        $this->add_control(
            'right_hvr_btn_label',
            [
                'label'         => esc_html__( 'Hover Button Label', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Watch Tutorial', 'aranoz' )
            ]
        );
        $this->add_control(
            'right_hvr_btn_url',
            [
                'label'         => esc_html__( 'Hover Button Url', 'aranoz' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
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
                'label'     => __( 'Big Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_fight .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_fight .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'latest_fight_sum_bg_sep', [
                'label'     => __( 'Latest Fight Summary BG Image', 'aranoz' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );    
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'latest_fight_sum_bg',
                'label' => __( 'Background', 'aranoz' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .Latest_War .Latest_War_text',
            ]
        );
        
        $this->end_controls_section();


        // Single Latest Fight Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Latest Fight Color Settings', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
  
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Item Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_fight .single_feature_part h4' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'item_text_color', [
                'label'     => __( 'Item Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_fight .single_feature_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'right_fight_sum_bg_sep', [
                'label'     => __( 'Right Fight Summary BG Image', 'aranoz' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );    
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'right_fight_sum_bg',
                'label' => __( 'Background', 'aranoz' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .Latest_War .Latest_War_bg_1',
            ]
        );
        

        $this->end_controls_section();

    }
    
    public function single_stream_item( $war1, $war2, $war_logo1, $war_logo2, $war_date, $war_title ){ ?>
        <div class="single_war_text">
            <div class="war_text_item d-flex justify-content-around align-items-center">
            <?php
                if( $war_logo1 ){
                    echo wp_kses_post( $war_logo1 );
                }

                echo '<h2>'.esc_html( $war1 ).'<span>vs</span>'.esc_html( $war2 ).'</h2>';

                if( $war_logo2 ){
                    echo wp_kses_post( $war_logo2 );
                }

                echo '<div class="war_date">';
                    echo '<a href="#">'.esc_html( $war_date ).'</a>';
                    echo '<p>'.esc_html( $war_title ).'</p>';
                echo '</div>';
            ?>
            </div>
        </div>
    <?php
    }

	protected function render() {

    $settings = $this->get_settings();
    $latest_fight_header = !empty( $settings['latest_fight_header'] ) ? $settings['latest_fight_header'] : '';
    $war_title = !empty( $settings['war_title'] ) ? $settings['war_title'] : '';
    $top_logo = !empty( $settings['top_logo']['id'] ) ? wp_get_attachment_image($settings['top_logo']['id'], 'aranoz_war_top_logo_70x38', false, ['alt' => $war_title]) : '';
    $war_date = !empty( $settings['war_date'] ) ? $settings['war_date'] : '';
    $view_fight = !empty( $settings['view_fight'] ) ? $settings['view_fight'] : '';
    $warrior_logo1 = !empty( $settings['warrior_logo1']['id'] ) ? wp_get_attachment_image($settings['warrior_logo1']['id'], 'aranoz_war_logo_img_122x99', false, ['alt' => $war_title]) : '';
    $warrior_logo2 = !empty( $settings['warrior_logo2']['id'] ) ? wp_get_attachment_image($settings['warrior_logo2']['id'], 'aranoz_war_logo_img_122x99', false, ['alt' => $war_title]) : '';
    $warrior_1 = !empty( $settings['warrior_1'] ) ? $settings['warrior_1'] : '';
    $warrior_2 = !empty( $settings['warrior_2'] ) ? $settings['warrior_2'] : '';
    $hvr_btn_label = !empty( $settings['hvr_btn_label'] ) ? $settings['hvr_btn_label'] : '';
    $hvr_btn_url = !empty( $settings['hvr_btn_url']['url'] ) ? $settings['hvr_btn_url']['url'] : '';
    $war_list_contents = !empty( $settings['war_list_contents'] ) ? $settings['war_list_contents'] : '';

    // Right item contents
    $right_war_title = !empty( $settings['right_war_title'] ) ? $settings['right_war_title'] : '';
    $right_top_logo = !empty( $settings['right_top_logo']['id'] ) ? wp_get_attachment_image($settings['right_top_logo']['id'], 'aranoz_war_logo_img_122x99', false, ['alt' => $right_war_title]) : '';
    $right_war_date = !empty( $settings['right_war_date'] ) ? $settings['right_war_date'] : '';
    $right_view_fight = !empty( $settings['right_view_fight'] ) ? $settings['right_view_fight'] : '';
    $right_warrior_1 = !empty( $settings['right_warrior_1'] ) ? $settings['right_warrior_1'] : '';
    $right_warrior_2 = !empty( $settings['right_warrior_2'] ) ? $settings['right_warrior_2'] : '';
    $right_war_logo1 = !empty( $settings['right_warrior_logo1']['id'] ) ? wp_get_attachment_image($settings['right_warrior_logo1']['id'], 'aranoz_war_logo_img_122x99', false, ['alt' => $right_warrior_1]) : '';
    $right_war_logo2 = !empty( $settings['right_warrior_logo2']['id'] ) ? wp_get_attachment_image($settings['right_warrior_logo2']['id'], 'aranoz_war_logo_img_122x99', false, ['alt' => $right_warrior_2]) : '';
    $right_hvr_btn_label = !empty( $settings['right_hvr_btn_label'] ) ? $settings['right_hvr_btn_label'] : '';
    $right_hvr_btn_url = !empty( $settings['right_hvr_btn_url']['url'] ) ? $settings['right_hvr_btn_url']['url'] : '';
    $dynamic_class = is_front_page() ? 'Latest_War' : 'Latest_War padding_top';
    ?>

    <!-- use sasu part end-->
    <section class="<?php echo esc_attr( $dynamic_class )?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section_tittle text-center">
                            <h2><?php echo esc_html( $latest_fight_header )?></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="Latest_War_text">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col-lg-6">
                                    <div class="single_war_text text-center">
                                        <?php
                                            if( $top_logo ){
                                                echo wp_kses_post( $top_logo );
                                            }
                                        ?>
                                        <h4><?php echo esc_html($war_title)?></h4>
                                        <p><?php echo esc_html($war_date)?></p>
                                        <a href="#"><?php echo esc_html($view_fight)?></a>
                                        <div class="war_text_item d-flex justify-content-around align-items-center">
                                            <?php
                                                if( $warrior_logo1 ){
                                                    echo wp_kses_post( $warrior_logo1 );
                                                }
                                            ?>
                                            <h2><?php echo esc_html($warrior_1)?><span>vs</span><?php echo esc_html($warrior_2)?></h2>
                                            <?php
                                                if( $warrior_logo2 ){
                                                    echo wp_kses_post( $warrior_logo2 );
                                                }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                                echo '<a href="'.esc_url( $hvr_btn_url ).'" class="btn_2">'.esc_html( $hvr_btn_label ).'</a>';
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="latest_war_list">
                            <?php
                            if( is_array( $war_list_contents ) && count( $war_list_contents ) > 0 ){
                                foreach ( $war_list_contents as $item ) {
                                    $war1 = !empty( $item['latest_war_1'] ) ? $item['latest_war_1'] : '';
                                    $war2 = !empty( $item['latest_war_2'] ) ? $item['latest_war_2'] : '';
                                    $war_logo1 = !empty( $item['latest_war_logo1']['id'] ) ? wp_get_attachment_image($item['latest_war_logo1']['id'], 'aranoz_war_logo_img_122x99', false, ['alt' => $war1]) : '';
                                    $war_logo2 = !empty( $item['latest_war_logo2']['id'] ) ? wp_get_attachment_image($item['latest_war_logo2']['id'], 'aranoz_war_logo_img_122x99', false, ['alt' => $war2]) : '';
                                    $war_date = !empty( $item['latest_war_date'] ) ? $item['latest_war_date'] : '';'';                                    
                                    $war_title = !empty( $item['latest_war_title'] ) ? $item['latest_war_title'] : '';'';                                    
                                    $this->single_stream_item( $war1, $war2, $war_logo1, $war_logo2, $war_date, $war_title );
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="Latest_War_text Latest_War_bg_1">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col-lg-6">
                                    <div class="single_war_text text-center">
                                        <?php
                                            if( $right_top_logo ){
                                                echo wp_kses_post( $right_top_logo );
                                            }
                                        ?>
                                        <h4><?php echo esc_html($right_war_title)?></h4>
                                        <p><?php echo esc_html($right_war_date)?></p>
                                        <a href="#"><?php echo esc_html($right_view_fight)?></a>
                                        <div class="war_text_item d-flex justify-content-around align-items-center">
                                            <?php
                                                if( $right_war_logo1 ){
                                                    echo wp_kses_post( $right_war_logo1 );
                                                }
                                            ?>
                                            <h2><?php echo esc_html($right_warrior_1)?><span>vs</span><?php echo esc_html($right_warrior_2)?></h2>
                                            <?php
                                                if( $right_war_logo2 ){
                                                    echo wp_kses_post( $right_war_logo2 );
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                echo '<a href="'.esc_url( $right_hvr_btn_url ).'" class="btn_2">'.esc_html( $right_hvr_btn_label ).'</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- use sasu part end-->
    <?php
    }
}
