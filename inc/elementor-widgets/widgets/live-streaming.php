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
 * Aranoz elementor Who Can Live Streaming section widget.
 *
 * @since 1.0
 */
class Aranoz_Live_Streaming extends Widget_Base {

	public function get_name() {
		return 'aranoz-live-streaming';
	}

	public function get_title() {
		return __( 'Live Streaming', 'aranoz' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'aranoz-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Live Streaming Section ------------------------------
        $this->start_controls_section(
            'live_stream_heading',
            [
                'label' => __( 'Live Streaming Heading', 'aranoz' ),
            ]
        );
        $this->add_control(
            'live_stream_header',
            [
                'label'         => esc_html__( 'Live Streaming Header', 'aranoz' ),
                'description'   => esc_html__('Use <br> tag for line break', 'aranoz'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>live <br> stareams</h2>', 'aranoz' )
            ]
        );
        $this->add_control(
            'about_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'aranoz' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Install Now', 'aranoz' )
            ]
        );
        $this->add_control(
            'about_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'aranoz' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->add_control(
            'slide_cont_sep',
            [
                'label'         => esc_html__( 'Slide Contents Separator', 'aranoz' ),
                'type'          => Controls_Manager::HEADING,
                'separator'     => 'after'
            ]
        );

        $this->add_control(
            'slide_contents', [
                'label' => __( 'Create New', 'aranoz' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'live_stream_img',
                        'label'     => __( 'Live Streaming Image', 'aranoz' ),
                        'type'      => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Image Title', 'aranoz' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Image 1', 'aranoz' )
                    ],
                    [
                        'name'      => 'vid_url',
                        'label'     => __( 'Popup Video URL', 'aranoz' ),
                        'type'      => Controls_Manager::URL,
                        'default'   => [
                            'url'   => 'https://www.youtube.com/watch?v=pBFQdxA-apI'
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
                'label'     => __( 'Big Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .live_stream .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .live_stream .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();


        // Single Live Streaming Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Live Streaming Color Settings', 'aranoz' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
  
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Item Title Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .live_stream .single_feature_part h4' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'item_text_color', [
                'label'     => __( 'Item Text Color', 'aranoz' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .live_stream .single_feature_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    
    // call load widget script
    $this->load_widget_script();

    $live_stream_header = !empty( $settings['live_stream_header'] ) ? $settings['live_stream_header'] : '';
    $btnlabel = !empty( $settings['about_btnlabel'] ) ? $settings['about_btnlabel'] : '';
    $btnurl = !empty( $settings['about_btnurl']['url'] ) ? $settings['about_btnurl']['url'] : '';
    $slide_contents = !empty( $settings['slide_contents'] ) ? $settings['slide_contents'] : '';
    $dynamic_class = is_front_page() ? 'live_stream' : 'live_stream padding_top';

    function single_stream_item( $live_stream_img, $counter, $video_url ){ ?>
        <div class="live_stareams_slide_img">
            <?php
                if( $live_stream_img ){
                    echo wp_kses_post( $live_stream_img );
                }

                echo '<div class="extends_video">';
                    echo '<a id="play-video_'.esc_attr( $counter ).'" class="video-play-button popup-youtube"
                    href="'.esc_url( $video_url ).'">
                        <span class="fa fa-play"></span>
                    </a>';
                echo '</div>';
            ?>
        </div>
    <?php
    }
    ?>

    <!--::about_us part start::-->
    <section class="live_stareams padding_bottom">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-2 offset-lg-2 offset-sm-1">
                        <div class="live_stareams_text">
                            <?php
                                if( $live_stream_header ){
                                    echo wp_kses_post( $live_stream_header );
                                }

                                echo '<a href="'.esc_url( $btnurl ).'" class="btn_1">'.esc_html( $btnlabel ).'</a>';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-7 offset-sm-1">
                        <div class="live_stareams_slide owl-carousel">
                            <?php
                            if( is_array( $slide_contents ) && count( $slide_contents ) > 0 ){
                                $counter = 0;
                                foreach ( $slide_contents as $item ) {
                                    $title = !empty( $item['title'] ) ? $item['title'] : 'stream image';
                                    $live_stream_img = !empty( $item['live_stream_img']['id'] ) ? wp_get_attachment_image($item['live_stream_img']['id'], 'aranoz_live_stream_img_671x561', false, ['alt' => $title]) : '';
                                    $video_url = !empty( $item['vid_url']['url'] ) ? $item['vid_url']['url'] : '';
                                    $counter++;
                                    
                                    single_stream_item( $live_stream_img, $counter, $video_url );
                                }
                            }
                            ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--::about_us part end::-->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {
                var review = $('.live_stareams_slide');
                if (review.length) {
                    review.owlCarousel({
                    items: 2,
                    loop: true,
                    dots: false,
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    nav: true,
                    navText: [
                        '<i class="fa fa-caret-left"></i>',
                        '<i class="fa fa-caret-right"></i>'
                    ],
                    margin: 15,
                    responsive: {
                        0: {
                        items: 1,
                        margin: 15,
                        },
                        600: {
                        items: 1,
                        margin: 15,
                        },
                        991: {
                        items: 1,
                        margin: 15,
                        },
                        1200: {
                        items: 2,
                        margin: 15,
                        }
                    }
                    });
                }

            });
        })(jQuery);
        </script>
        <?php 
        }
    }
}
