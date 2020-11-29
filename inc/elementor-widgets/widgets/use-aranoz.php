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
 * Aranoz elementor Who Can Use Aranoz section widget.
 *
 * @since 1.0
 */
class Aranoz_Use_Aranoz extends Widget_Base {

	public function get_name() {
		return 'aranoz-use-aranoz';
	}

	public function get_title() {
		return __( 'Use Aranoz', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Use Aranoz Section ------------------------------
        $this->start_controls_section(
            'use_aranozs_heading',
            [
                'label' => __( 'Use Aranoz Heading', 'aranoz' ),
            ]
        );
        $this->add_control(
            'use_aranoz_header',
            [
                'label'         => esc_html__( 'Use Aranoz Header', 'aranoz' ),
                'description'   => esc_html__('Use <br> tag for line break', 'aranoz'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Who can use Aranoz?</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices </p>', 'aranoz' )
            ]
        );
        $this->add_control(
            'aranoz_contents', [
                'label' => __( 'Create New', 'aranoz' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'use_aranoz_img',
                        'label'     => __( 'Use Aranoz Image', 'aranoz' ),
                        'type'      => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Use Aranoz Title', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'A Volunteer', 'aranoz' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Use Aranoz Text', 'aranoz' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor', 'aranoz' )
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
                'label'     => __( 'Big Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .use_aranoz .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .use_aranoz .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();


        // Single Use Aranoz Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Use Aranoz Color Settings', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
  
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Item Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .use_aranoz .single_feature_part h4' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'item_text_color', [
                'label'     => __( 'Item Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .use_aranoz .single_feature_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $use_aranoz_header = !empty( $settings['use_aranoz_header'] ) ? $settings['use_aranoz_header'] : '';
    $aranoz_contents = !empty( $settings['aranoz_contents'] ) ? $settings['aranoz_contents'] : '';
    $dynamic_class = is_front_page() ? 'use_aranoz' : 'use_aranoz padding_top';

    $shape_14 = ARANOZ_DIR_ANIMATE_ICON_IMG_URI . 'shape-14.png';
    $shape_10 = ARANOZ_DIR_ANIMATE_ICON_IMG_URI . 'shape-10.png';
    $shape    = ARANOZ_DIR_ANIMATE_ICON_IMG_URI . 'shape.png';
    $shape_13 = ARANOZ_DIR_ANIMATE_ICON_IMG_URI . 'shape-13.png';

    function single_aranoz_item( $use_aranoz_img, $title, $desc ){ ?>
        <div class="col-lg-3 col-sm-6">
            <div class="single_feature">
                <div class="single_feature_part">
                    <?php
                        if( $use_aranoz_img ){
                            echo wp_kses_post( $use_aranoz_img );
                        }

                        echo '<h4>' .esc_html( $title ) . '</h4>';
                        echo '<p>' .esc_html( $desc ) . '</p>';
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- use aranoz part end-->
    <section class="<?php echo esc_attr($dynamic_class)?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <?php
                            // Use Aranoz Header =============
                            if( $use_aranoz_header ){
                                echo wp_kses_post( wpautop( $use_aranoz_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if( is_array( $aranoz_contents ) && count( $aranoz_contents ) > 0 ){
                    foreach ( $aranoz_contents as $aranoz_content ) {
                        $use_aranoz_img = !empty( $aranoz_content['use_aranoz_img']['id'] ) ? wp_get_attachment_image($aranoz_content['use_aranoz_img']['id'], 'aranoz_feature_img3_75x65', false, ['alt' => 'aranoz icon']) : '';
                        $title = !empty( $aranoz_content['title'] ) ? $aranoz_content['title'] : '';
                        $desc = !empty( $aranoz_content['desc'] ) ? $aranoz_content['desc'] : '';
                        
                        single_aranoz_item( $use_aranoz_img, $title, $desc );
                    }
                }
                ?>
                
                
            </div>
        </div>
        <img src="<?php echo $shape_14?>" alt="feature icon 1" class="feature_icon_1">
        <img src="<?php echo $shape_10?>" alt="feature icon 2" class="feature_icon_2">
        <img src="<?php echo $shape?>" alt="feature icon 3" class="feature_icon_3">
        <img src="<?php echo $shape_13?>" alt="feature icon 4" class="feature_icon_4">
    </section>
    <!-- use aranoz part end-->
    <?php
    }
}
