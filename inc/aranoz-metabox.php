<?php
function aranoz_portfolio_metabox( $meta_boxes ) {

	$aranoz_prefix = '_aranoz_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Single Metabox', 'aranoz' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => $aranoz_prefix . 'project_start_time',
				'name'       => esc_html__( 'Project Start Time', 'aranoz' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $aranoz_prefix . 'project_start_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Start Date', 'aranoz' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'         => $aranoz_prefix . 'project_end_time',
				'name'       => esc_html__( 'Project End Time', 'aranoz' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $aranoz_prefix . 'project_end_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project End Date', 'aranoz' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => $aranoz_prefix . 'project_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Location', 'aranoz' ),
				'placeholder' => esc_html__( 'Project Location', 'aranoz' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'aranoz_portfolio_metabox' );