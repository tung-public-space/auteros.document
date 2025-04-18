<?php namespace CleverSoft\WpPlugin\Cmm4E;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Cmm4eElementorWidget
 */
final class Cmm4eElementorWidget extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve button widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'cmm4e-mega-menu';
    }

    /**
     * Get widget title.
     *
     * Retrieve button widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Clever Mega Menu', 'clever-mega-menu-for-elementor');
    }

    /**
     * @return array
     */
    public function get_categories()
    {
        if (defined('ELEMENTOR_PRO_VERSION')) {
            return ['theme-elements'];
        } elseif (class_exists('\CleverAddonsForElementor', false)) {
            return ['clever-elements'];
        } else {
            return ['general'];
        }
    }

    /**
     * Get widget icon.
     *
     * Retrieve button widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    /**
     * Register controls
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_menu_content',
            [
                'label' => esc_html__('Menu Content', 'clever-mega-menu-for-elementor'),
            ]
        );

        $this->add_control(
            'menu_theme',
            [
                'label' => esc_html__('Skin', 'clever-mega-menu-for-elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => $this->listMenuPresets()
            ]
        );

        $this->add_control(
            'menu_location',
            [
                'label' => esc_html__('Location', 'clever-mega-menu-for-elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => get_registered_nav_menus()
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (!empty($settings['menu_location'])) {
            $args = [
                'theme_location' => $settings['menu_location']
            ];
            if (!empty($settings['menu_theme'])) {
                $args['cmm4e_menu_theme'] = $settings['menu_theme'];
                $this->loadPreset($settings['menu_theme']);
            }
            wp_nav_menu($this->parseNavMenuArgs($args));
        } else {
            esc_html_e('No menu location selected.', 'clever-mega-menu-for-elementor');
        }
    }

    /**
     * Get menu presets
     */
    private function listMenuPresets()
    {
        $presets = [
            'none' => esc_html__('None', 'clever-mega-menu-for-elementor')
        ];

        $posts = get_posts([
            'post_type' => 'cmm4e_menu_theme',
            'no_found_rows' => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false
        ]);

        if (!empty($posts)) {
            foreach ($posts as $post) {
                $presets[$post->post_name] = $post->post_title ? : esc_html__('Untitled Menu Skin', 'clever-mega-menu-for-elementor');
            }
        }

        return $presets;
    }

    /**
     * Load menu preset
     */
    private function loadPreset($preset)
    {
        $uploads = wp_upload_dir();
        $theme_css = $uploads['basedir'] . '/cmm4e/cmm4e-menu-skin-' . $preset . '.min.css';

        if (file_exists($theme_css)) {
            $inline_css = file_get_contents($theme_css);
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                printf('<style media="all">%s</style>', $inline_css);
            } else {
                if (!wp_style_is('cmm4e-menu-skin-' . $preset)) {
                    add_action('wp_footer', function () use ($inline_css) {
                        printf('<style media="all">%s</style>', $inline_css);
                    }, 10, 0);
                }
            }
        }
    }

    /**
     * Change navigation menus' arguments
     *
     * @internal    Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     *
     * @see    https://developer.wordpress.org/reference/hooks/wp_nav_menu_args/
     *
     * @return    array    $args    Modified arguments.
     */
    private function parseNavMenuArgs(array $args)
    {
        $locations = get_nav_menu_locations();

        if (!empty($locations[$args['theme_location']])) {
            $menu = wp_get_nav_menu_object($locations[$args['theme_location']]);
        }

        if (!isset($menu) || is_wp_error($menu) || !is_object($menu)) {
            return $args;
        }

        $settings = array_merge([
            'enabled'   => '0',
            'se_markup' => '0',
            'theme'     => 'cmm4e-default-menu-theme-461836'
        ], (array)get_term_meta($menu->term_id, MenuTermMeta::META_KEY, true));

        $theme = !empty($args['cmm4e_menu_theme']) ? $args['cmm4e_menu_theme'] : $settings['theme'];

        $theme_meta = [];
        $menu_style = 'horizontal';
        $menu_style_classes = ' cmm4e';
        $args['menu_class'] = 'cmm4e-theme-' . $theme;
        $menu_theme = get_page_by_path($theme, OBJECT, 'cmm4e_menu_theme');

        if ($menu_theme) {
            $theme_meta = (array)get_post_meta($menu_theme->ID, MenuThemeMeta::META_KEY, true);
            $menu_style = !empty($theme_meta['menubar_style']) ? $theme_meta['menubar_style'] : 'horizontal';
            if ('horizontal' === $menu_style) {
                $horizontal_layout = !empty($theme_meta['menubar_horizontal_layout']) ? $theme_meta['menubar_horizontal_layout'] : 'horizontal-align-right';
                $menu_style_classes .= ' cmm4e-horizontal cmm4e-' . $horizontal_layout;
            } else {
                $menu_style_classes .= ' cmm4e-vertical';
            }
            $mobile_style = !empty($theme_meta['mobile_menu_style']) ? $theme_meta['mobile_menu_style'] : 'off-canvas';
            if ('off-canvas' === $mobile_style) {
                $menu_style_classes .= ' cmm4e-mobile-animation-off-canvas';
                $menu_style_classes .= ' cmm4e-off-canvas-' . $theme_meta['mobile_offcanvas_position'];
            } elseif ('slide-down' === $mobile_style) {
                $menu_style_classes .= ' cmm4e-mobile-animation-slide-down';
            } else {
                $menu_style_classes .= ' cmm4e-mobile-animation-none';
            }
            $menu_style_classes .= ' cmm4e-menu-fade-up'; // Maybe allow to choose custom sub panels animation.
        }

        $settings = array_merge(MenuTermMeta::$fields, $settings);
        $theme_meta = array_merge(MenuThemeMeta::$fields, $theme_meta);

        $config = [
            'isMobile'   => wp_is_mobile(),
            'container'  => $theme_meta['mega_panel_css_selector'],
            'breakpoint' => $theme_meta['general_mobile_breakpoint'],
            'arrows'     => [
                'up'    => $theme_meta['general_arrow_up'],
                'down'  => $theme_meta['general_arrow_down'],
                'left'  => $theme_meta['general_arrow_left'],
                'right' => $theme_meta['general_arrow_right']
            ],
            'maxHeight' => $theme_meta['menubar_menu_height']
        ];

        if ('horizontal' === $menu_style) {
            $config['desktop']['orientation'] = 'horizontal';
        } else {
            $config['desktop']['orientation'] = 'vertical';
        }

        $config['mobile'] = [
            'animation'      => $theme_meta['mobile_menu_style'],
            'toggleDisable'  => $theme_meta['mobile_menu_disable_toggle'],
            'togglePosition' => [
                'top'    => $theme_meta['mobile_menu_toggle_position_top'],
                'right'  => $theme_meta['mobile_menu_toggle_position_right'],
                'bottom' => $theme_meta['mobile_menu_toggle_position_bottom'],
                'left'   => $theme_meta['mobile_menu_toggle_position_left']
            ],
            'toggleTrigger'   => $theme_meta['mobile_menu_toggle_button_trigger'],
            'toggleIconOpen'  => $theme_meta['mobile_menu_open_icon'],
            'toggleIconClose' => $theme_meta['mobile_menu_close_icon'],
            'toggleMenuText'  => $theme_meta['mobile_menu_toggle_text']
        ];

        $config = "data-config='" . esc_js(json_encode($config, JSON_UNESCAPED_UNICODE)) . "'";

        $items_wrap = $settings['se_markup'] ? '<ul id="%1$s" class="%2$s" ' . $config . ' itemscope itemtype="https://schema.org/SiteNavigationElement">%3$s</ul>' : '<ul id="%1$s" class="%2$s" ' . $config . '>%3$s</ul>';

        $menu_settings['current_menu_options'] = $settings;

        $args = [
            'menu'             => $menu->term_id,
            'menu_class'       => $args['menu_class'] . $menu_style_classes,
            'theme_location'   => $args['theme_location'],
            'cmm4e_nav_widget' => 1,
            'container'        => 'div',
            'container_id'     => false,
            'container_class'  => 'cmm4e-container cmm4e-wrapper-theme-' . $args['cmm4e_menu_theme'],
            'items_wrap'       => $items_wrap,
            'item_spacing'     => isset($args['item_spacing']) ? $args['item_spacing'] : '',
            'walker'           => new MegaMenuWalker($menu_settings, $theme_meta)
        ];

        return $args;
    }
}
