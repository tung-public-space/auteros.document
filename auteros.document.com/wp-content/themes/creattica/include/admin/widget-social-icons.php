<?php
/**
 * Social Icons Widget
 *
 * @package    Hoot
 * @subpackage Creattica
 */

/**
* Class Hoot_Social_Icons_Widget
*/
class Hoot_Social_Icons_Widget extends HybridExtend_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-social-icons-widget';
		$settings['name'] = __( 'Hoot > Social Icons', 'creattica' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Social Icons', 'creattica'),
			// 'classname'		=> 'hoot-social-icons-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( "Title (optional)", 'creattica' ),
				'id'		=> 'title',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Icon Size', 'creattica' ),
				'id'		=> 'size',
				'type'		=> 'select',
				'std'		=> 'small',
				'options'	=> array(
					'small'		=> __( 'Small', 'creattica' ),
					'medium'	=> __( 'Medium', 'creattica' ),
					'large'		=> __( 'Large', 'creattica' ),
					'huge'		=> __( 'Huge', 'creattica' ),
				),
			),
			array(
				'name'		=> __( 'Social Icons', 'creattica' ),
				'id'		=> 'icons',
				'type'		=> 'group',
				'options'	=> array(
					'item_name'	=> __( 'Icon', 'creattica' ),
				),
				'fields'	=> array(
					array(
						'name'		=> __( 'Social Icon', 'creattica' ),
						'id'		=> 'icon',
						'type'		=> 'select',
						'options'	=> hybridextend_enum_social_profiles(),
					),
					array(
						'name'		=> __( 'URL (enter username for Skype, email address for Email)', 'creattica' ),
						'id'		=> 'url',
						'type'		=> 'text',
						'sanitize'	=> 'social_icons_sanitize_url',
					),
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

		$settings = apply_filters( 'hoot_social_icons_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hybridextend_locate_widget( 'social-icons' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function hoot_social_icons_widget_register(){
	register_widget('Hoot_Social_Icons_Widget');
}
add_action('widgets_init', 'hoot_social_icons_widget_register');

/**
 * Custom Sanitization Function
 */
function hoot_social_icons_sanitize_url( $value, $name, $instance ){
	if ( $name == 'social_icons_sanitize_url' ) {
		if ( !empty( $instance['icon'] ) && $instance['icon'] == 'fa-skype' )
			$new = sanitize_user( $value, true );
		elseif ( !empty( $instance['icon'] ) && $instance['icon'] == 'fa-envelope' )
			$new = is_email( $value );
		else
			$new = esc_url_raw( $value );
		return $new;
	}
	return $value;
}
add_filter('widget_admin_sanitize_field', 'hoot_social_icons_sanitize_url', 10, 3);