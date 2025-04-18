<?php namespace CleverSoft\WpPlugin\Cmm4E;

use WP_Query;

/**
 * MenuTermMeta
 */
final class MenuTermMeta
{
    /**
     * Meta key
     *
     * @var    string
     */
    const META_KEY = 'cmm4e_menu_meta';

    /**
     * Meta fields
     *
     * @var    array
     */
    public static $fields = array(
        'enabled'   => '0',
        'se_markup' => '0',
        'theme'     => 'default-menu-skin-461836'
    );

    /**
     * Constructor
     */
    private function __construct()
    {

    }

    /**
     * Singleton
     */
    static function init()
    {
        static $self = null;

        if (null === $self) {
            $self = new self;
            add_action('wp_update_nav_menu', array($self, '_save'), 10, 2);
            add_action('admin_footer-nav-menus.php', array($self, '_render'), 10, 0);
            add_filter('wp_nav_menu_args', array($self, '_change_nav_menu_args'), PHP_INT_MAX);
        }
    }

    /**
     * Render
     *
     * @internal    Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     *
     * @global    $nav_menu_selected_id    int    Selected menu ID.
     */
    function _render($menu_id = false, $html = false)
    {
        if (is_customize_preview()) {
            return;
        }

        global $nav_menu_selected_id, $menu_locations;

        $current_location = '';

        $menu_id = $menu_id ? absint($menu_id) : $nav_menu_selected_id;

        foreach ($menu_locations as $location => $_menu_id) {
            if ($menu_id === $_menu_id) {
                $current_location = $location;
                break;
            }
        }

        $settings = (array)get_term_meta($menu_id, self::META_KEY, true);
        $settings = array_merge(self::$fields, $settings);

        if (!$html) :
        ?><script type="text/html" id="clever-mega-menu-popup-tpl">
            <div class="clever-mega-menu-popup"></div>
        </script>
        <script type="text/html" id="clever-mega-menu-settings">
        <?php endif; ?>
            <div class="clever-mega-menu-settings">
                <h3><?php _e('Clever Mega Menu for Elementor Settings', 'clever-mega-menu-for-elementor'); ?></h3>
                <fieldset class="menu-settings-group">
                    <legend class="menu-settings-group-name howto"><?php _e('Enable', 'clever-mega-menu-for-elementor'); ?></legend>
                    <div class="menu-settings-input checkbox-input">
                        <input id="clever-mega-menu-enable-checkbox" type="checkbox" value="1" <?php checked($settings['enabled']) ?> name="<?php echo $this->get_field('enabled') ?>">
                        <label for="clever-mega-menu-enable-checkbox"><?php _e('Whether to enable Mega Menu for this menu or not.', 'clever-mega-menu-for-elementor') ?></label>
                    </div>
                </fieldset>
                <fieldset class="menu-settings-group clever-mega-menu-advanced-setting">
                    <?php
                        $args = array(
                            'post_type'        => 'cmm4e_menu_theme',
                            'post_status'      => 'publish',
                            'no_found_rows'    => true,
                            'suppress_filters' => true,
                        );
                        $themes = new WP_Query($args);
                    ?>
                    <legend class="menu-settings-group-name howto"><?php _e('Menu skin', 'clever-mega-menu-for-elementor'); ?></legend>
                    <div class="menu-settings-input checkbox-input">
                        <select id="clever-mega-menu-theme" name="<?php echo $this->get_field('theme') ?>">
                            <?php foreach ($themes->posts as $theme) : ?>
                                <option <?php selected($settings['theme'], $theme->post_name) ?> value="<?php echo esc_attr($theme->post_name) ?>"><?php echo esc_html($theme->post_title) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="clever-mega-menu-theme"><?php printf(__('Select a menu skin or %screate a new one%s.', 'clever-mega-menu-for-elementor'), '<a href="' . admin_url('post-new.php?post_type=cmm4e_menu_theme') . '">', '</a>') ?></label>
                    </div>
                </fieldset>
                <?php if (!empty($current_location) && !empty($settings['theme'])): ?>
                <fieldset class="menu-settings-group clever-mega-menu-advanced-setting">
                    <legend class="menu-settings-group-name howto"><?php _e('Menu shortcode', 'clever-mega-menu-for-elementor'); ?></legend>
                    <div class="menu-settings-input checkbox-input">
                        <code><?php printf('[cmm4e loc="%s" skin="%s"]', $current_location, $settings['theme']) ?></code>
                    </div>
                </fieldset>
                <?php endif; ?>
            </div>
            <?php if (!$html) : ?>
        </script><?php endif;
    }

    /**
     * Save metadata
     *
     * @internal    Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     *
     * @see    https://developer.wordpress.org/reference/hooks/wp_update_nav_menu/
     */
    function _save($menu_id, $data = false, $update = true)
    {
      if (isset($_REQUEST['wp_customize']) && $_REQUEST['wp_customize'] === 'on') {
        return;
      }

      if (!isset($_POST[self::META_KEY]) || $_POST[self::META_KEY] === self::$fields) {
        return;
      }

      $settings = array_merge(self::$fields, $this->sanitize($_POST[self::META_KEY]));

      if ($update) {
          update_term_meta($menu_id, self::META_KEY, $settings);
      } else {
          return array('settings' => $settings);
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
    function _change_nav_menu_args($args)
    {
        if (is_admin() || !empty($args['cmm4e_nav_widget'])) {
            return $args;
        }

        $locations = get_nav_menu_locations();

        if (!empty($locations[$args['theme_location']])) {
            $menu = wp_get_nav_menu_object($locations[$args['theme_location']]);
        } elseif (!empty($args['menu'])) {
            $menu = wp_get_nav_menu_object($args['menu']);
        } else {
            $menus = (array)wp_get_nav_menus();
            if ($menus) {
                foreach ($menus as $menu) {
                    $has_items = wp_get_nav_menu_items($menu->term_id, ['update_post_term_cache' => false]);
                    if ($has_items) break;
                }
            }
        }

        if (!isset($menu) || is_wp_error($menu) || !is_object($menu)) {
            return $args;
        }

        $settings = (array)get_term_meta($menu->term_id, self::META_KEY, true);

        if (empty($settings['enabled'])) {
            return $args;
        }

        $theme = !empty($settings['theme']) ? $settings['theme'] : 'default-menu-skin-461836';

        if (!empty($args['cmm4e_menu_theme'])) {
            $theme = $args['cmm4e_menu_theme'];
        }

        $theme_meta = [];
        $menu_style = 'horizontal';
        $menu_style_classes = ' cmm4e';
        $args['menu_class'] = 'cmm4e-theme-' . $theme;
        $menu_theme = get_page_by_path($theme, OBJECT, 'cmm4e_menu_theme');

        if ($menu_theme) {
            $theme_meta = (array)get_post_meta($menu_theme->ID, MenuThemeMeta::META_KEY, true);
            $menu_style = 'horizontal';
            if ('horizontal' === $menu_style) {
                $horizontal_layout = !empty($theme_meta['menubar_horizontal_layout']) ? $theme_meta['menubar_horizontal_layout'] : 'horizontal-align-left';
                $menu_style_classes .= ' cmm4e-horizontal cmm4e-' . $horizontal_layout;
            }
            $mobile_style = !empty($theme_meta['mobile_menu_style']) ? $theme_meta['mobile_menu_style'] : 'slide-down';
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

        $settings = array_merge(self::$fields, $settings);
        $theme_meta = array_merge(MenuThemeMeta::$fields, $theme_meta);

        $config = [
            'container'  => $theme_meta['mega_panel_css_selector'],
            'breakpoint' => $theme_meta['general_mobile_breakpoint'],
            'arrows'     => [
                'up'    => $theme_meta['general_arrow_up'],
                'down'  => $theme_meta['general_arrow_down'],
                'left'  => $theme_meta['general_arrow_left'],
                'right' => $theme_meta['general_arrow_right']
            ]
        ];

        $config['desktop']['orientation'] = 'horizontal';

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

        $config = "data-config='" . esc_js(json_encode($config)) . "'";
        $items_wrap = '<ul id="%1$s" class="%2$s" ' . $config . '>%3$s</ul>';

        $this->settings['current_menu_options'] = $settings;
        $this->settings['current_menu_options']['menu_id'] = $menu->term_id;
        $this->settings['current_menu_options']['menu_location'] = $args['theme_location'];

        $args = [
            'menu'            => $args['menu'],
            'menu_id'         => $args['menu_id'],
            'menu_class'      => $args['menu_class'] . $menu_style_classes,
            'theme_location'  => $args['theme_location'],
            'container'       => 'div',
            'container_id'    => false,
            'container_class' => 'cmm4e-container cmm4e-wrapper-theme-'. $theme,
            'fallback_cb'     => false,
            'before'          => $args['before'],
            'after'           => $args['after'],
            'link_before'     => $args['link_before'],
            'link_after'      => $args['link_after'],
            'echo'            => $args['echo'],
            'depth'           => $args['depth'],
            'items_wrap'      => $items_wrap,
            'item_spacing'    => isset($args['item_spacing']) ? $args['item_spacing'] : '',
            'walker'          => new MegaMenuWalker($this->settings, $theme_meta)
        ];

        return apply_filters('cmm4e_nav_menu_args', $args, $this->settings, $theme_meta);
    }

    /**
     * Do sanitization
     */
    private function sanitize($meta)
    {
        return $meta;
    }

    /**
     * Get field ID
     *
     * @param    string    $name    Field name.
     *
     * @return    string   $field    Field's ID.
     */
    private function get_field($name)
    {
        return self::META_KEY . '[' . $name . ']';
    }

    /**
     * Get field value
     *
     * @param    string    $name      Field name.
     * @param    array     $values    An array of values.
     *
     * @return    mixed    $value    Field's value.
     */
    private function get_value($name, $values)
    {
        $value = isset($values[$name]) ? $values[$name] : self::$fields[$name];

        return $value;
    }
}
MenuTermMeta::init();
