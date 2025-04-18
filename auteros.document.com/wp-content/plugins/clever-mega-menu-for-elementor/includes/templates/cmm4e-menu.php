<?php
/**
 * Template for `cmm4e_menu` post type
 *
 * @package Cmm4e
 * @subpackage Templates
 */

use CleverSoft\WpPlugin\Cmm4E\MenuThemeMeta;

$menu_id = get_post_meta($post->ID, 'cmm4e_menu_id', true);
$menu_item_id = get_post_meta($post->ID, 'cmm4e_menu_item_id', true);

$menu_settings = array_merge([
    'enabled'   => '0',
    'se_markup' => '0',
    'theme'     => 'cmm4e-default-menu-skin-461836'
], (array)get_term_meta($menu_id, 'cmm4e_menu_meta', true));

$item_settings = array_merge([
    'cmm4e_icon' => '',
    'enable_mega' => '',
    'hide_title' => '',
    'viewers' => ['pro_only'],
    'disable_link' => '',
    'hide_on_mobile' => '',
    'hide_on_desktop' => '',
    'hide_sub_on_mobile' => '',
    'show_badge' => '',
    'mega_panel_width' => []
], (array)get_post_meta($post->ID, '_elementor_page_settings', true));

$container_class = ('yes' === $item_settings['enable_mega']) ? 'cmm4e-mega-enabled' : 'cmm4e-mega-disabled';
$menu_skin = get_page_by_path($menu_settings['theme'], OBJECT, 'cmm4e_menu_theme');
$menu_skin = array_merge(MenuThemeMeta::$fields, (array)get_post_meta($menu_skin->ID, MenuThemeMeta::META_KEY, true));
$menu_locations = array_flip(get_nav_menu_locations());

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
        <style media="all">
            html, body {
                margin: 0;
                padding: 0;
                border: none;
                background-color: #495157;
            }
            #elementor {
                padding-bottom: 1px;
            }
            #cmm4e-menu-container {
                margin: 40px;
                position: relative;
            }
            #cmm4e-menu-container .cmm4e-menu-content-container {
                transition: all 0.3s ease-in;
                width: 100%;
            }
            .cmm4e-menu-vertical #cmm4e-menu-container {
                display: flex;
            }
            .cmm4e-menu-vertical #cmm4e-.cmm4e-container {
                align-items: flex-start;
            }
            .cmm4e-menu-vertical .cmm4e-navigation-menu {
                width: <?php echo intval($menu_skin['menubar_vertical_width']) ?>px;
                min-width: intrinsic;
                min-width: -moz-max-content;
                min-width: -webkit-max-content;
                min-width: max-content;
            }
            #cmm4e-menu-container .cmm4e-current-edit-item .cmm4e-sub-container {
                visibility: visible;
                opacity: 1;
            }
            #cmm4e-menu-container .cmm4e-current-edit-item .cmm4e-item-toggle {
                display: none;
            }
            .cmm4e-sub-container .cmm4e-current-edit-item .cmm4e-nav-link {
                <?php echo "color: {$menu_skin['flyout_item_text_hover_color']} !important;" ?>
            }
            #cmm4e-menu-content #elementor {
                <?php
                echo "font-size: {$menu_skin['general_font_size']}px;
                font-weight: {$menu_skin['general_font_weight']};
                letter-spacing: {$menu_skin['general_letter_spacing']};
                line-height: {$menu_skin['general_line_height']};
                text-transform: {$menu_skin['general_text_transform']};
                color: {$menu_skin['general_text_color']};
                padding: {$menu_skin['mega_panel_padding_top']}px {$menu_skin['mega_panel_padding_right']}px {$menu_skin['mega_panel_padding_bottom']}px {$menu_skin['mega_panel_padding_left']}px;
                border-width: {$menu_skin['mega_panel_border_top']}px {$menu_skin['mega_panel_border_right']}px {$menu_skin['mega_panel_border_bottom']}px {$menu_skin['mega_panel_border_left']}px;
                border-style: {$menu_skin['mega_panel_border_style']};
                border-color: {$menu_skin['mega_panel_border_color']};
                border-radius: {$menu_skin['mega_panel_border_radius_top_left']}px {$menu_skin['mega_panel_border_radius_top_right']}px {$menu_skin['mega_panel_border_radius_bottom_right']}px {$menu_skin['mega_panel_border_radius_bottom_left']}px;
                box-shadow: {$menu_skin['mega_panel_h_shadow']}px {$menu_skin['mega_panel_v_shadow']}px {$menu_skin['mega_panel_blur_shadow']}px {$menu_skin['mega_panel_spread_shadow']}px {$menu_skin['mega_panel_shadow_color']};
                background: {$menu_skin['mega_panel_bg_to_color']};
                background: linear-gradient(to bottom, {$menu_skin['mega_panel_bg_from_color']}, {$menu_skin['mega_panel_bg_to_color']});";
                ?>
            }
            #cmm4e-menu-content .elementor-widget.elementor-widget-wp-widget-nav_menu .menu {
                list-style: none;
            }
            #cmm4e-menu-content .elementor-widget-wp-widget-nav_menu > .elementor-widget-container > h5 {
				<?php
                echo "font-size: {$menu_skin['mega_panel_heading_font_size']}px;
                line-height: {$menu_skin['mega_panel_heading_line_height']};
                font-weight: {$menu_skin['mega_panel_heading_font_weight']};
	      		color: {$menu_skin['mega_panel_heading_color']};
	            text-transform: {$menu_skin['mega_panel_heading_style']};
                letter-spacing: {$menu_skin['mega_panel_heading_letter_spacing']};
				padding: {$menu_skin['mega_panel_heading_padding_top']}px {$menu_skin['mega_panel_heading_padding_right']}px {$menu_skin['mega_panel_heading_padding_bottom']}px {$menu_skin['mega_panel_heading_padding_left']}px;
				margin: {$menu_skin['mega_panel_heading_margin_top']}px {$menu_skin['mega_panel_heading_margin_right']}px {$menu_skin['mega_panel_heading_margin_bottom']}px {$menu_skin['mega_panel_heading_margin_left']}px;
                border-radius: {$menu_skin['mega_panel_heading_border_radius_top_left']}px {$menu_skin['mega_panel_heading_border_radius_top_right']}px {$menu_skin['mega_panel_heading_border_radius_bottom_right']}px {$menu_skin['mega_panel_heading_border_radius_bottom_left']}px;
                border-width: {$menu_skin['mega_panel_heading_border_top']}px {$menu_skin['mega_panel_heading_border_right']}px {$menu_skin['mega_panel_heading_border_bottom']}px {$menu_skin['mega_panel_heading_border_left']}px;
                border-style: {$menu_skin['mega_panel_heading_border_style']};
                border-color: {$menu_skin['mega_panel_heading_border_color']};"
                ?>
            }
            #cmm4e-menu-content .elementor-widget.elementor-widget-wp-widget-nav_menu:not(:last-child) {
                margin-bottom: 20px;
            }
            #cmm4e-menu-content .elementor-widget.elementor-widget-wp-widget-nav_menu .menu {
                margin: 0;
                padding: 0;
            }
            #cmm4e-menu-content .elementor-widget.elementor-widget-wp-widget-nav_menu .menu li {
                margin: 0;
                padding: 0;
                list-style: none;
            }
            #cmm4e-menu-content .elementor-widget.elementor-widget-wp-widget-nav_menu .menu > li > a {
                <?php
                echo "text-decoration:none;
                display: block;
                padding: {$menu_skin['mega_panel_item_padding_top']}px {$menu_skin['mega_panel_item_padding_right']}px {$menu_skin['mega_panel_item_padding_bottom']}px {$menu_skin['mega_panel_item_padding_left']}px;
                border-width: {$menu_skin['mega_panel_item_border_top']}px {$menu_skin['mega_panel_item_border_right']}px {$menu_skin['mega_panel_item_border_bottom']}px {$menu_skin['mega_panel_item_border_left']}px;
                border-style: {$menu_skin['mega_panel_item_border_style']};
                border-color: {$menu_skin['mega_panel_item_border_color']};
                color: {$menu_skin['mega_panel_item_text_color']};
                font-size: {$menu_skin['mega_panel_item_text_font_size']};
                font-weight: {$menu_skin['mega_panel_item_text_font_weight']};
                letter-spacing: {$menu_skin['mega_panel_item_text_letter_spacing']};
                line-height: {$menu_skin['mega_panel_item_text_line_height']};
                text-transform: {$menu_skin['mega_panel_item_text_transform']};
                background-color: {$menu_skin['mega_panel_item_bg_color']};";
                ?>
            }
            #cmm4e-menu-content .elementor-widget .menu > li > a:hover {
                <?php
                echo "color: {$menu_skin['mega_panel_item_text_hover_color']};
                border-style: {$menu_skin['mega_panel_item_border_hover_style']};
                border-color: {$menu_skin['mega_panel_item_border_hover_color']};
                background-color: {$menu_skin['mega_panel_item_bg_hover_color']};";
                ?>
            }
            #cmm4e-menu-content .elementor-widget .menu > li:last-child > a {
                border-width: 0px;
            }
            #cmm4e-menu-content .elementor-widget table {
                table-layout: fixed;
                width: 100%;
                margin: 0;
            }
            #cmm4e-menu-content .elementor-widget table th {
                padding: 1em;
                text-align: center;
            }
            #cmm4e-menu-content .elementor-widget table td {
                padding: 1em;
                vertical-align: baseline;
                text-align: center;
                white-space: nowrap;
            }
            #cmm4e-menu-content .elementor-widget table #prev {
                text-align: left;
                text-transform: uppercase;
            }
            #cmm4e-menu-content .elementor-widget table td a,
            #cmm4e-menu-content .elementor-widget table #today {
                padding: 0;
                <?php echo "color: {$menu_skin['general_link_color']};"; ?>
                font-weight: bolder;
            }
            #cmm4e-menu-content .elementor-widget table td a:hover,
            #cmm4e-menu-content .elementor-widget table #today:hover {
                <?php echo "color: {$menu_skin['general_link_hover_color']};"; ?>
            }
            @media (min-width: <?php echo intval($menu_skin['general_mobile_breakpoint']) ?>px) {
                #cmm4e-menu-container #cmm4e- .cmm4e {
                    display: flex !important;
                }
            }
            @media (max-width: calc(<?php echo intval($menu_skin['general_mobile_breakpoint']) ?>px - 0.02px)) {
                #cmm4e-menu-container {
                    margin: 0;
                }
                #cmm4e-menu-container .cmm4e-toggle-wrapper {
                    <?php
                        echo "margin: {$menu_skin['mobile_menu_toggle_position_top']}px {$menu_skin['mobile_menu_toggle_position_right']}px {$menu_skin['mobile_menu_toggle_position_bottom']}px {$menu_skin['mobile_menu_toggle_position_left']}px;";
                    ?>
                    padding: 0;
                }
                #cmm4e-menu-container .cmm4e-container {
                    margin: 0;
                    padding: 0;
                    width: 100vw;
                }
                #cmm4e-menu-container #cmm4e- .cmm4e-menu-item .menu-item-arrow {
                    display: none !important;
                }
                #cmm4e-menu-container .cmm4e-current-edit-item .cmm4e-item-toggle {
                    display: block;
                }
                #cmm4e-menu-container .cmm4e.cmm4e-theme-<?php echo esc_attr($menu_settings['theme']) ?> {
                    <?php
                    echo "padding-top: 20px;";
                    ?>
                }
            }
        }
        </style>
	</head>
	<body <?php body_class('cmm4e-preview cmm4e-menu-' . esc_attr($menu_skin['menubar_style'])); ?>>
        <div id="cmm4e-menu-container" class="cmm4e-menu-container <?php echo esc_attr($container_class) ?>">
            <div class="cmm4e-navigation-menu">
                <?php wp_nav_menu(['menu' => $menu_id]); ?>
            </div>
            <div class="cmm4e-menu-content-container cmm4e-<?php echo esc_attr($menu_skin['menubar_style']) ?>">
                <div id="cmm4e-menu-content" class="cmm4e-content-<?php echo esc_attr($menu_skin['menubar_style']) ?>">
                    <?php
            		while (have_posts()) : the_post();
            			the_content();
            		endwhile;
                    ?>
                </div>
            </div>
        </div>
		<?php wp_footer(); ?>
	</body>
</html>
