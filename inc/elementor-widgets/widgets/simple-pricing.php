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
 * Aranoz elementor simple pricing section widget.
 *
 * @since 1.0
 */
class Aranoz_Simple_Pricing extends Widget_Base {

	public function get_name() {
		return 'aranoz-simple-pricing';
	}

	public function get_title() {
		return __( 'Pricing Plan', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Pricing Section ------------------------------
        $this->start_controls_section(
            'pricing_heading',
            [
                'label' => __( 'Pricing Heading', 'aranoz' ),
            ]
        );
        $this->add_control(
            'pricing_header',
            [
                'label'         => esc_html__( 'Pricing Header', 'aranoz' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Pricing plans', 'aranoz' )
            ]
        );
        $this->add_control(
            'pricing_contents', [
                'label' => __( 'Create New', 'aranoz' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => __( 'Package Name', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Silver Package', 'aranoz' )
                    ],
                    [
                        'name'  => 'currency_symbol',
                        'label' => __( 'Currency Symbol', 'aranoz' ),
                        'type'  => Controls_Manager::SELECT,
                        'label_block' => true,
                        'default' => 'usd',
                        'options'   => [
                            'usd'  => '$',
                            'eur'  => '€',
                            'yuan' => '¥',
                        ]
                    ],
                    [
                        'name'  => 'price',
                        'label' => __( 'Package Price', 'aranoz' ),
                        'type'  => Controls_Manager::NUMBER,
                        'label_block' => true,
                        'default' => 50
                    ],
                    [
                        'name'  => 'bandwidth',
                        'label' => __( 'Bandwidth', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '2GB Bandwidth', 'aranoz' )
                    ],
                    [
                        'name'  => 'account',
                        'label' => __( 'Account', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Two Accounts', 'aranoz' )
                    ],
                    [
                        'name'  => 'storage',
                        'label' => __( 'Storage', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( '15GB Storage', 'aranoz' )
                    ],
                    [
                        'name'  => 'btn_label',
                        'label' => __( 'Button Label', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Choose Plan', 'aranoz' )
                    ],
                    [
                        'name'  => 'btn_url',
                        'label' => __( 'Button URL', 'aranoz' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#'
                        ]
                    ],
                ],
                'default'   => [
                    [
                        'title'             => __( 'Silver Package', 'aranoz' ),
                        'currency_symbol'   => 'usd',
                        'price'             => 50,
                        'bandwidth'         => __( '2GB Bandwidth', 'aranoz' ),
                        'account'           => __( 'Two Accounts', 'aranoz' ),
                        'storage'           => __( '15GB Storage', 'aranoz' ),
                        'btn_label'         => __( 'Choose Plan', 'aranoz' ),
                        'btn_url'           => [
                            'url'           => '#'
                        ]
                    ],
                    [
                        'title'             => __( 'Silver Package', 'aranoz' ),
                        'currency_symbol'   => 'usd',
                        'price'             => 50,
                        'bandwidth'         => __( '2GB Bandwidth', 'aranoz' ),
                        'account'           => __( 'Two Accounts', 'aranoz' ),
                        'storage'           => __( '15GB Storage', 'aranoz' ),
                        'btn_label'         => __( 'Choose Plan', 'aranoz' ),
                        'btn_url'           => [
                            'url'           => '#'
                        ]
                    ],
                    [
                        'title'             => __( 'Silver Package', 'aranoz' ),
                        'currency_symbol'   => 'usd',
                        'price'             => 50,
                        'bandwidth'         => __( '2GB Bandwidth', 'aranoz' ),
                        'account'           => __( 'Two Accounts', 'aranoz' ),
                        'storage'           => __( '15GB Storage', 'aranoz' ),
                        'btn_label'         => __( 'Choose Plan', 'aranoz' ),
                        'btn_url'           => [
                            'url'           => '#'
                        ]
                    ],
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
                'label'     => __( 'Big Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();
        

        // Single Simple Pricing Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Pricing Color Settings', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
   
        $this->add_control(
            'plan_title_color', [
                'label'     => __( 'Plan Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_price_color', [
                'label'     => __( 'Plan Price Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part h3' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_period_color', [
                'label'     => __( 'Plan Period Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_sep_color', [
                'label'     => __( 'Separator Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part ul' => 'border-color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'plan_list_color', [
                'label'     => __( 'Pricing List Item Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part ul li' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->add_control(
            'button_styles_separator',
            [
                'label'     => __( 'Button Styles', 'aranoz' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btn_txt_color', [
                'label'     => __( 'Button Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .btn_1' => 'color: {{VALUE}}!important;',
                ],
            ]
        );  
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .btn_1' => 'background: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'button_hvr_styles_separator',
            [
                'label'     => __( 'Button Hover Styles', 'aranoz' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'btn_hvr_txt_color', [
                'label'     => __( 'Button Hover Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .btn_1:hover' => 'color: {{VALUE}}!important;',
                ],
            ]
        );  
        $this->add_control(
            'btn_hvr_bg_color', [
                'label'     => __( 'Button Hover BG Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing_part .single_pricing_part .btn_1:hover' => 'background: {{VALUE}};',
                ],
            ]
        );  

        $this->end_controls_section();

    }
    
    public function single_pricing_table( $title, $currency_symbol, $price, $bandwidth, $account, $storage, $btn_label, $btn_url ){ ?>
        <div class="col-lg-3 col-sm-6">
            <div class="single_pricing_part">
                <?php
                    if ($currency_symbol == 'usd') {
                        $currency_symbol = '$';
                    }
                    elseif ($currency_symbol == 'eur') {
                        $currency_symbol = '€';
                    }
                    elseif ($currency_symbol == 'yuan') {
                        $currency_symbol = '¥';
                    }
                    
                    echo '<p>' .esc_html( $title ) . '</p>';
                    echo '<h3>' .esc_html( $currency_symbol ) . esc_html( $price ) . '</h3>';
                    echo '<ul>';
                        echo '<li>' .esc_html( $bandwidth ) . '</li>';
                        echo '<li>' .esc_html( $account ) . '</li>';
                        echo '<li>' .esc_html( $storage ) . '</li>';
                    echo '</ul>';

                    // Button =============
                    if( $btn_label ){
                        echo "<a href='". esc_url($btn_url) . "' class='btn_2'>".esc_html( $btn_label )."</a>";
                    }
                ?>
            </div>
        </div>
    <?php
    }

	protected function render() {

    $settings = $this->get_settings();
    $pricing_header = !empty( $settings['pricing_header'] ) ? $settings['pricing_header'] : '';
    $pricing_contents = !empty( $settings['pricing_contents'] ) ? $settings['pricing_contents'] : '';
    $dynamic_class = is_front_page() ? 'pricing_part padding_top' : 'pricing_part padding_top';

    ?>

    <!-- pricing part start-->
    <section class="<?php echo esc_attr($dynamic_class)?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_tittle text-center">
                        <h2><?php echo esc_html( $pricing_header )?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if( is_array( $pricing_contents ) && count( $pricing_contents ) > 0 ){
                    foreach ( $pricing_contents as $item ) {
                        $title = !empty( $item['title'] ) ? $item['title'] : '';
                        $currency_symbol = !empty( $item['currency_symbol'] ) ? $item['currency_symbol'] : '';
                        $price = !empty( $item['price'] ) ? $item['price'] : '';
                        $bandwidth = !empty( $item['bandwidth'] ) ? $item['bandwidth'] : '';
                        $account = !empty( $item['account'] ) ? $item['account'] : '';
                        $storage = !empty( $item['storage'] ) ? $item['storage'] : '';
                        $btn_label = !empty( $item['btn_label'] ) ? $item['btn_label'] : '';
                        $btn_url = !empty( $item['btn_url']['url'] ) ? $item['btn_url']['url'] : '';
                        
                        $this->single_pricing_table( $title, $currency_symbol, $price, $bandwidth, $account, $storage, $btn_label, $btn_url );
                    }
                }
                ?>                
            </div>
        </div>
    </section>
    <!-- pricing part end-->
    <?php
    }
}
