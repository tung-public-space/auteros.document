<?php
/**
 * Register sidebar widget areas for the theme
 * This file is loaded via the 'after_setup_theme' hook at priority '10'
 *
 * @package    Hoot
 * @subpackage Creattica
 */

/* Register sidebars. */
add_action( 'widgets_init', 'hoot_base_register_sidebars', 5 );
add_action( 'widgets_init', 'hoot_frontpage_register_sidebars' );

/**
 * Registers sidebars.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function hoot_base_register_sidebars() {

	global $wp_version;
		if ( version_compare( $wp_version, '4.9.7', '>=' ) ) {
			$emstart = '<strong><em>'; $emend = '</strong></em>';
		} else $emstart = $emend = '';

	// Primary Sidebar
	hybrid_register_sidebar(
		array(
			'id'          => 'hoot-primary-sidebar',
			'name'        => _x( 'Primary Sidebar', 'sidebar', 'creattica' ),
			'description' => __( 'The main sidebar used throughout the site.', 'creattica' )
		)
	);

	// Leftbar Top Sidebar
	hybrid_register_sidebar(
		array(
			'id'          => 'hoot-leftbar-top',
			'name'        => _x( 'Leftbar Top', 'sidebar', 'creattica' ),
			'description' => __( 'Leave empty if you dont want to show anything above the logo.', 'creattica' )
		)
	);

	// Leftbar Bottom Widget Area
	hybrid_register_sidebar(
		array(
			'id'          => 'hoot-leftbar-bottom',
			'name'        => _x( 'Leftbar Bottom', 'sidebar', 'creattica' ),
			'description' => __( 'Leave empty if you dont want to show anything at bottom of Left Bar.', 'creattica' )
		)
	);

	// Content Top Widget Area
	hybrid_register_sidebar(
		array(
			'id'          => 'hoot-content-top',
			'name'        => _x( 'Content Top', 'sidebar', 'creattica' ),
			'description' => __( 'This area is often used for displaying context specific menus, advertisements, and third party breadcrumb plugins.', 'creattica' )
		)
	);

	// Subfooter Widget Area
	hybrid_register_sidebar(
		array(
			'id'          => 'hoot-sub-footer',
			'name'        => _x( 'Sub Footer', 'sidebar', 'creattica' ),
			'description' => __( 'Leave empty if you dont want to show subfooter.', 'creattica' )
		)
	);

	// Footer Columns
	$footercols = hoot_get_footer_columns();

	if( $footercols ) :
		$alphas = range('a', 'z');
		for ( $i=0; $i < 4; $i++ ) :
			if ( isset( $alphas[ $i ] ) ) :
				hybrid_register_sidebar(
					array(
						'id'          => 'hoot-footer-' . $alphas[ $i ],
						'name'        => sprintf( _x( 'Footer %s Column', 'sidebar', 'creattica' ), strtoupper( $alphas[ $i ] ) ),
						'description' => ( $i < $footercols ) ? '' : ' ' . $emstart . sprintf( __( 'This column is currently NOT VISIBLE on your site. To activate it, go to Appearance &gt; Customize &gt; Footer &gt; Select a layout with more than %1$s columns', 'creattica' ), $i ) . $emend,
					)
				);
			endif;
		endfor;
	endif;

}

/**
 * Registers frontpage widget areas.
 *
 * @since 1.0
 * @access public
 * @return void
 */
function hoot_frontpage_register_sidebars() {

	$areas = array();
	global $wp_version;
	if ( version_compare( $wp_version, '4.9.7', '>=' ) ) {
		$emstart = '<strong><em>'; $emend = '</strong></em>';
	} else $emstart = $emend = '';

	/* Set up defaults */
	$defaults = apply_filters( 'hoot_frontpage_widget_areas', array( 'a', 'b', 'c', 'd', 'e' ) );
	$locations = apply_filters( 'hoot_frontpage_widget_area_names', array(
		__( 'Left', 'creattica' ),
		__( 'Center Left', 'creattica' ),
		__( 'Center', 'creattica' ),
		__( 'Center Right', 'creattica' ),
		__( 'Right', 'creattica' ),
	) );

	// Get user settings
	$sections = hybridextend_sortlist( hoot_get_mod( 'frontpage_sections' ) );

	foreach ( $defaults as $key ) {
		$id = "area_{$key}";
		if ( empty( $sections[$id]['sortitem_hide'] ) ) {

			$columns = ( isset( $sections[$id]['columns'] ) ) ? $sections[$id]['columns'] : '';
			$count = count( explode( '-', $columns ) ); // empty $columns still returns array of length 1
			$location = '';

			for ( $c = 1; $c <= $count ; $c++ ) {
				switch ( $count ) {
					case 2: $location = ($c == 1) ? $locations[0] : $locations[4];
							break;
					case 3: $location = ($c == 1) ? $locations[0] : (
								($c == 2) ? $locations[2] : $locations[4]
							);
							break;
					case 4: $location = ($c == 1) ? $locations[0] : (
								($c == 2) ? $locations[1] : (
									($c == 3) ? $locations[3] : $locations[4]
								)
							);
				}
				$areas[ $id . '_' . $c ] = sprintf( __( 'Frontpage - Widget Area %s %s', 'creattica' ), strtoupper( $key ), $location );
			}

		}
	}

	foreach ( $areas as $key => $name ) {
		hybrid_register_sidebar(
			array(
				'id'          => 'hoot-frontpage-' . $key,
				'name'        => $name,
				'description' => __( 'You can reorder and change the number of columns in Appearance &gt; Customize &gt; Frontpage Modules', 'creattica' ),
			)
		);
	}

}