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
class Aranoz_Featured_Product extends Widget_Base {

	public function get_name() {
		return 'aranoz-featured_product';
	}

	public function get_title() {
		return __( 'Featured Product', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Featured Product Section ------------------------------
        $this->start_controls_section(
            'featured_product_heading',
            [
                'label' => __( 'Featured Products', 'aranoz' ),
            ]
        );
        $this->add_control(
            'feature_header',
            [
                'label'         => esc_html__( 'Heading', 'aranoz' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __( 'Featured Category', 'aranoz' )
            ]
        );
        $this->add_control(
            'feature_items', [
                'label' => __( 'Create New Item', 'aranoz' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ sub_title }}}',
                'fields' => [
                    [
                        'name'  => 'sub_title',
                        'label' => __( 'Counter Value', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Premium Quality', 'aranoz' )
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Counter Label', 'aranoz' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'Latest foam Sofa', 'aranoz' )
                    ],
                    [
                        'name'  => 'anchor_link',
                        'label' => __( 'Anchor Link', 'aranoz' ),
                        'type'  => Controls_Manager::URL,
                        'label_block'   => true,
                        'default'       => [
                            'url'       => '#'
                        ]
                    ],
                    [
                        'name'  => 'anchor_text',
                        'label' => __( 'Anchor Text', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Explore Now', 'aranoz' )
                    ],
                    [
                        'name'  => 'feature_img',
                        'label' => __( 'Feature Image', 'aranoz' ),
                        'type'  => Controls_Manager::MEDIA
                    ],
                    [
                        'name'  => 'image_size',
                        'label' => __( 'Image Size', 'aranoz' ),
                        'type'  => Controls_Manager::SELECT,
                        'default'   => '344x371',
                        'options'   => [
                            '344x371'      => '344x371',
                            '245x388'      => '245x388',
                            '226x254'      => '226x254',
                            '554x239'      => '554x239',
                        ]
                    ],
                ],
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

    // Image size function
    function aranoz_fet_img_size( $img_size ){
        switch ( $img_size ) {
            case '344x371':
                $img_size = 'aranoz_feature_product_thumb_344x371';
                break;

            case '245x388':
                $img_size = 'aranoz_feature_product_thumb_245x388';
                break;

            case '226x254':
                $img_size = 'aranoz_feature_product_thumb_226x254';
                break;

            case '554x239':
                $img_size = 'aranoz_feature_product_thumb_554x239';
                break;
            
            default:
                $img_size = 'aranoz_feature_product_thumb_344x371';
                break;
        }
        
        return $img_size;
    }

    $feature_header = !empty( $settings['feature_header'] ) ? $settings['feature_header'] : '';
    $feature_items = !empty( $settings['feature_items'] ) ? $settings['feature_items'] : '';

    function single_fet_item( $sub_title, $title, $anchor_link, $anchor_text, $feature_img ){ ?>
        <?php
            echo '<p>' .esc_html( $sub_title ) . '</p>';
            echo '<h3>' .esc_html( $title ) . '</h3>';
            echo '<a href="'.esc_url( $anchor_link ).'" class="feature_btn">' .esc_html( $anchor_text ) . ' <i class="fa fa-play"></i></a>';
            if( $feature_img ){
                echo wp_kses_post( $feature_img );
            }
        ?>
    <?php
    }
    ?>

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2><?php echo esc_html( $feature_header )?></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
            <?php
                if( is_array( $feature_items ) && count( $feature_items ) > 0 ){
                    $count = 0;
                    foreach ( $feature_items as $feature ) {
                        $sub_title = !empty( $feature['sub_title'] ) ? $feature['sub_title'] : '';
                        $title = !empty( $feature['title'] ) ? $feature['title'] : '';
                        $anchor_link = !empty( $feature['anchor_link']['url'] ) ? $feature['anchor_link']['url'] : '';
                        $anchor_text = !empty( $feature['anchor_text'] ) ? $feature['anchor_text'] : '';
                        $image_size = !empty( $feature['image_size'] ) ? $feature['image_size'] : '';
                        $feature_img = !empty( $feature['feature_img']['id'] ) ? wp_get_attachment_image($feature['feature_img']['id'], aranoz_fet_img_size( $image_size ), false, ['alt' => 'featured image']) : '';
                        $count++;
                        if ( $count == 1 || $count == 4 ) {
                        ?>
                            <div class="col-lg-7 col-sm-6">
                                <div class="single_feature_post_text">
                                <?php
                                    single_fet_item( $sub_title, $title, $anchor_link, $anchor_text, $feature_img );
                                ?>
                                </div>
                            </div>
                            <?php
                        } elseif( $count == 2 || $count == 3 ) { ?>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_feature_post_text">
                                <?php
                                    single_fet_item( $sub_title, $title, $anchor_link, $anchor_text, $feature_img );
                                ?>
                                </div>
                            </div>
                            <?php
                        } else { ?>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_feature_post_text">
                                <?php
                                    single_fet_item( $sub_title, $title, $anchor_link, $anchor_text, $feature_img );
                                ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    }
}
