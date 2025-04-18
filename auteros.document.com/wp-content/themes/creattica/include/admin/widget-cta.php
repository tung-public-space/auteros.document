<?php
/**
 * Call To Action Widget
 *
 * @package    Hoot
 * @subpackage Creattica
 */

/**
* Class Hoot_CTA_Widget
*/
class Hoot_CTA_Widget extends HybridExtend_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-cta-widget';
		$settings['name'] = __( 'Hoot > Call To Action', 'creattica' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Call To Action block.', 'creattica'),
			// 'classname'		=> 'hoot-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( 'Style', 'creattica' ),
				'id'		=> 'style',
				'type'		=> 'images',
				'std'		=> 'style1',
				'options'	=> array(
					'style1'	=> trailingslashit( HYBRIDEXTEND_INCURI ) . 'admin/images/cta-style-1.png',
					'style2'	=> trailingslashit( HYBRIDEXTEND_INCURI ) . 'admin/images/cta-style-2.png',
					'style3'	=> trailingslashit( HYBRIDEXTEND_INCURI ) . 'admin/images/cta-style-3.png',
				),
			),
			array(
				'name'		=> __( 'Headline', 'creattica' ),
				'id'		=> 'headline',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Description', 'creattica' ),
				'id'		=> 'description',
				'type'		=> 'textarea',
			),
			array(
				'name'		=> __( 'Button Text', 'creattica' ),
				'id'		=> 'button_text',
				'type'		=> 'text',
				'std'		=> sprintf( __( 'READ MORE %s', 'creattica' ), '&rarr;' ),
			),
			array(
				'name'		=> __( 'Button URL', 'creattica' ),
				'desc'		=> __( 'Leave empty if you dont want to show button', 'creattica' ),
				'id'		=> 'url',
				'type'		=> 'text',
				'sanitize'	=> 'url',
			),
			array(
				'name'		=> __( 'Border', 'creattica' ),
				'desc'		=> __( 'Top and bottom borders.', 'creattica' ),
				'id'		=> 'border',
				'type'		=> 'select',
				'std'		=> 'none none',
				'options'	=> array(
					'line line'		=> __( 'Top - Line || Bottom - Line', 'creattica' ),
					'line shadow'	=> __( 'Top - Line || Bottom - StrongLine', 'creattica' ),
					'line none'		=> __( 'Top - Line || Bottom - None', 'creattica' ),
					'shadow line'	=> __( 'Top - StrongLine || Bottom - Line', 'creattica' ),
					'shadow shadow'	=> __( 'Top - StrongLine || Bottom - StrongLine', 'creattica' ),
					'shadow none'	=> __( 'Top - StrongLine || Bottom - None', 'creattica' ),
					'none line'		=> __( 'Top - None || Bottom - Line', 'creattica' ),
					'none shadow'	=> __( 'Top - None || Bottom - StrongLine', 'creattica' ),
					'none none'		=> __( 'Top - None || Bottom - None', 'creattica' ),
				),
			),
			array(
				'name'		=> __( 'Widget CSS', 'creattica' ),
				'id'		=> 'customcss',
				'type'		=> 'collapse',
				'fields'	=> array(
					array(
						'name'		=> __( 'Custom CSS Class', 'creattica' ),
						'desc'		=> __( 'Give this widget a custom css classname', 'creattica' ),
						'id'		=> 'class',
						'type'		=> 'text',
					),
					array(
						'name'		=> __( 'Margin Top', 'creattica' ),
						'desc'		=> __( '(in pixels) Leave empty to load default margins', 'creattica' ),
						'id'		=> 'mt',
						'type'		=> 'text',
						'settings'	=> array( 'size' => 3 ),
						'sanitize'	=> 'integer',
					),
					array(
						'name'		=> __( 'Margin Bottom', 'creattica' ),
						'desc'		=> __( '(in pixels) Leave empty to load default margins', 'creattica' ),
						'id'		=> 'mb',
						'type'		=> 'text',
						'settings'	=> array( 'size' => 3 ),
						'sanitize'	=> 'integer',
					),
					array(
						'name'		=> __( 'Widget ID', 'creattica' ),
						'id'		=> 'widgetid',
						'type'		=> '<span class="widgetid" data-baseid="' . $settings['id'] . '">' . __( 'Save this widget to view its ID', 'creattica' ) . '</span>',
					),
				),
			),
		);

		$settings = apply_filters( 'hoot_cta_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hybridextend_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function hoot_cta_widget_register(){
	register_widget('Hoot_CTA_Widget');
}
add_action('widgets_init', 'hoot_cta_widget_register');