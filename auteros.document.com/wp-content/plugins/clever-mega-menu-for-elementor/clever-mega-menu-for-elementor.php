<?php namespace CleverSoft\WpPlugin\Cmm4E;

/**
 * Plugin Name: Clever Mega Menu for Elementor
 * Plugin URI:  https://cleveraddon.com/clever-mega-menu-for-elementor
 * Description: With ease of visual editing from Elementor Page Builder, Clever Mega Menu for Elementor helps you make stunning navigation menus easily without any coding knowledge. <a href="https://cleveraddon.com/clever-mega-menu-for-elementor">Documentation</a> | <a href="https://cleveraddon.com/clever-mega-menu-for-elementor">ChangeLogs</a></p>
 * Author:      CleverSoft
 * Version:     1.1.2
 * Author URI:  http://zootemplate.com/
 * Text Domain: clever-mega-menu-for-elementor
 */

use Exception;

/**
 * Plugin container.
 */
final class Plugin
{
    /**
     * Version
     *
     * @var  string
     */
    const VERSION = '1.1.2';

    /**
     * Settings key
     *
     * @var  string
     */
    const SETTINGS_KEY = 'cmm4e_plugin_settings';

    /**
     * @var  array
     */
    private $settings;

    /**
     * Constructor
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;

        define('CMM4E_DIR', __DIR__ . '/');
        define('CMM4E_URI', str_replace(['http:', 'https:'], '', plugins_url('/', __FILE__)));

        add_action('init', [$this, '_register_assets'], PHP_INT_MAX, 0);
        add_action('plugins_loaded', [$this, '_install'], PHP_INT_MAX, 0);
        add_action('admin_menu', [$this, '_remove_slugdiv_metabox'], PHP_INT_MAX);
        add_action('admin_enqueue_scripts', [$this, '_load_admin_assets'], PHP_INT_MAX);
        add_action('wp_enqueue_scripts', [$this, '_load_public_assets'], PHP_INT_MAX, 0);
        add_action('elementor/widgets/widgets_registered', [$this, '_register_elementor_widgets']);
        add_action('elementor/editor/after_enqueue_scripts', [$this, '_load_elementor_assets'], PHP_INT_MAX);
        add_action('activate_clever-mega-menu-for-elementor/clever-mega-menu-for-elementor.php', [$this, '_activate']);
        add_action('deactivate_clever-mega-menu-for-elementor/clever-mega-menu-for-elementor.php', [$this, '_deactivate']);
    }

    /**
     * Do activation
     *
     * @internal  Used as a callback.
     *
     * @see  https://developer.wordpress.org/reference/functions/register_activation_hook/
     *
     * @param  bool  $network  Whether to activate this plugin on a network or a single site.
     */
    public function _activate($network)
    {
        try {
            $this->preActivate();
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        // Add default settings.
        add_option(self::SETTINGS_KEY, [
            'db_version' => self::VERSION . time(),
            'flushed_rewrite_rules' => false
        ]);
    }

    /**
     * Do installation
     *
     * @internal  Used as a callback.
     *
     * @see  https://developer.wordpress.org/reference/hooks/plugins_loaded/
     */
    public function _install()
    {
	    if(!did_action('elementor/loaded')) {
		    add_action('admin_notices', function() {
                if(!current_user_can('activate_plugins')) return;
			    $message = sprintf('<strong>%s</strong> %s', esc_html__('Clever Mega Menu for Elementor ', 'clever-mega-menu-for-elementor'), esc_html__('requires Elementor Page Builder plugin to be active. Please install and activate Elementor Page Builder!', 'clever-mega-menu-for-elementor'));
			    if(!is_plugin_active('elementor/elementor.php')) {
				    $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=elementor/elementor.php&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_elementor/elementor.php');
				    $message = __('<strong>Clever Mega Menu for Elementor</strong> requires Elementor Page Builder plugin to be active. Please install and activate Elementor Page Builder!', 'clever-mega-menu-for-elementor');
				    $button_text = __('Activate Elementor', 'clever-mega-menu-for-elementor');
			    } else {
				    $activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
				    $message = __('<strong>Clever Mega Menu for Elementor</strong> requires Elementor Page Builder plugin to be active. Please install and activate Elementor Page Builder!', 'clever-mega-menu-for-elementor');
				    $button_text = __('Install Elementor', 'clever-mega-menu-for-elementor');
			    }
			    $button = '<p><a href="' . esc_url($activation_url) . '" class="button-primary">' . esc_html($button_text) . '</a></p>';
			    printf('<div class="error"><p>%1$s</p>%2$s</div>', $message, $button);
		    }, 10, 0);
	    }

        // Make sure translation is available.
        load_plugin_textdomain('clever-mega-menu-for-elementor', false, __DIR__ . '/languages');

        // Load vendor resources.
        if (!class_exists('LeafoScssCompiler'))
            require __DIR__ . '/includes/vendor/class-leafo-scss-compiler.php';

        if (is_admin()) { // Load admin resources.
            require __DIR__ . '/includes/admin/pages/dashboard.php';
            require __DIR__ . '/includes/elementor/controls/document.php';
        } else { // Load public resources.
        }

        // Load common resources.
        require __DIR__ . '/includes/mega-menu-walker.php';
        require __DIR__ . '/includes/post-types/cmm4e-menu.php';
        require __DIR__ . '/includes/post-types/menu-theme.php';
        require __DIR__ . '/includes/meta/menu-term.php';
        require __DIR__ . '/includes/meta/menu-theme.php';
    }

    /**
     * Do deactivation
     *
     * @internal  Used as a callback.
     *
     * @see  https://developer.wordpress.org/reference/functions/register_deactivation_hook/
     *
     * @param  bool  $network  Whether to deactivate this plugin on network or a single site.
     */
    public function _deactivate($network)
    {
        // flush_rewrite_rules();
    }

    /**
     * Remove slugdiv meta box
     *
     * @internal    Used as a callback.
     *
     * @param    string    $context
     *
     * @see    https://developer.wordpress.org/reference/hooks/admin_menu/
     */
    function _remove_slugdiv_metabox($context)
    {
        remove_meta_box('slugdiv', ['cmm4e_menu_theme'], 'normal');
    }

    /**
     * Register widgets for Elementor
     *
     * @internal Used as a callback
     */
    function _register_elementor_widgets($widget_manager)
    {
        if (!empty($GLOBALS['post']) && 'cmm4e_menu' === $GLOBALS['post']->post_type) {
            return;
        }

        require __DIR__ . '/includes/elementor/widgets/cmm4e.php';

        $widget_manager->register_widget_type(new Cmm4eElementorWidget());
    }

    /**
     * Register assets
     *
     * @internal    Used as a callback.
     */
    function _register_assets()
    {
        // Register stylesheets.
        wp_register_style('fontawesome47', CMM4E_URI . 'assets/vendor/font-awesome/font-awesome.min.css', [], '4.7.0');
        wp_register_style('cleverfont', CMM4E_URI . 'assets/vendor/cleverfont/style.min.css', [], '1.9');
        wp_register_style('spectrum', CMM4E_URI . 'assets/vendor/spectrum/spectrum.min.css', [], '1.8');
        wp_register_style('cmm4e-nav-menu', CMM4E_URI . 'assets/backend/css/cmm4e-nav-menu.min.css', ['cleverfont', 'fontawesome47'], self::VERSION);
        wp_register_style('cmm4e-menu-theme', CMM4E_URI . 'assets/backend/css/cmm4e-menu-theme.min.css', ['cleverfont', 'fontawesome47', 'spectrum'], self::VERSION);
        wp_register_style('cmm4e-admin', CMM4E_URI . 'assets/backend/css/cmm4e-admin.min.css', ['cleverfont', 'fontawesome47'], self::VERSION);
        wp_register_style('cmm4e-default-skin-461836', CMM4E_URI . 'assets/frontend/css/default-skin.min.css', ['fontawesome47', 'cleverfont'], self::VERSION);

        // Register scripts.
        wp_register_script('spectrum', CMM4E_URI . 'assets/vendor/spectrum/spectrum.min.js', ['jquery-core'], '1.8', true);
        wp_register_script('cmm4e-admin', CMM4E_URI . 'assets/backend/js/cmm4e-admin.min.js', [], self::VERSION, true );
        wp_register_script('cmm4e-menu-theme', CMM4E_URI . 'assets/backend/js/cmm4e-menu-theme.min.js', ['spectrum'], self::VERSION, true);
        wp_register_script('cmm4e-mega-menu', CMM4E_URI . 'assets/frontend/js/cmm4e.min.js' , ['jquery-core'], self::VERSION, true);

        // Localize scripts.
        wp_localize_script('cmm4e-admin', 'cmm4eL10n', [
            'edit' => __('Edit', 'clever-mega-menu-for-elementor'),
            'editBtn' => __('CMM4E', 'clever-mega-menu-for-elementor'),
            'menuItemOptions' => __('Menu Item Options', 'clever-mega-menu-for-elementor'),
            'assignMenuLocation' => __('Please assign a menu location!', 'clever-mega-menu-for-elementor'),
            'selectMenuTheme' => __('You haven&#8217;t selected a menu skin yet!', 'clever-mega-menu-for-elementor')
        ]);

        wp_localize_script('cmm4e-admin', 'cmm4eConfig', [
            'isRTL' => is_rtl(),
            'editUrl'  => admin_url('?cmm4e-edit-menu-item=true'),
            'menuPost' => admin_url('post.php?post_type=cmm4e_menu'),
            '_nonce'   => wp_create_nonce('cmm4e_menu'),
            'menuUrl'  => admin_url('nav-menus.php'),
            'currentUserRoles' => wp_get_current_user()->roles
        ]);

        wp_localize_script('cmm4e-mega-menu', 'cmm4eFrontendConfig', [
            'isRTL' => is_rtl(),
            'isMobile' => wp_is_mobile()
        ]);

        // Flush rewrite rules for custom post types.
        if (!$this->settings['flushed_rewrite_rules']) {
            flush_rewrite_rules(false);
            $this->settings['flushed_rewrite_rules'] = true;
            update_option(self::SETTINGS_KEY, $this->settings);
        }
    }

    /**
     * Load admin assets
     *
     * @internal    Used as a callback.
     *
     * @param    string    $hook_suffix    Hook suffix of current screen.
     *
     * @see    https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
     */
    function _load_admin_assets($hook_suffix)
    {
        if (is_customize_preview()) {
            return;
        }

        wp_enqueue_style('cleverfont');
        wp_enqueue_style('fontawesome47');

        wp_enqueue_style('cmm4e-admin');
        wp_enqueue_script('cmm4e-admin');

        if ($hook_suffix === 'toplevel_page_cmm4e-dashboard-page') {
            wp_enqueue_style('dashboard');
            wp_enqueue_script('dashboard');
        }

        if ($hook_suffix === 'nav-menus.php') {
            wp_enqueue_style('cmm4e-nav-menu');
            wp_localize_script('cmm4e-admin', 'cleverMenuItems', $this->get_items_settings($this->get_selected_menu_id()));
        }

        if ('cmm4e_menu_theme' === $GLOBALS['typenow'] && (isset($_REQUEST['post']) || isset($_REQUEST['post_type']))) {
            wp_enqueue_style('cmm4e-menu-theme');
            wp_enqueue_script('cmm4e-menu-theme');
        }
    }

    /**
     * Load elementor assets
     *
     * @internal    Used as a callback.
     *
     * @param    string    $hook_suffix    Hook suffix of current screen.
     *
     * @see    https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
     */
    function _load_elementor_assets()
    {
        global $post;

        if ('cmm4e_menu' !== $post->post_type) {
            return;
        }

        wp_enqueue_script('cmm4e-elementor-editor', CMM4E_URI . 'assets/backend/js/cmm4e-elementor-editor.min.js', ['elementor-editor'], self::VERSION, true);
    }

    /**
     * Load public assets
     *
     * @internal    Used as a callback.
     *
     * @param    string    $hook_suffix    Hook suffix of current screen.
     *
     * @see    https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
     */
    function _load_public_assets()
    {
       $menus = get_terms([
    		'hide_empty' => true,
    		'taxonomy'   => 'nav_menu',
    		'fields'     => 'id=>slug'
    	]);

        $themes = [];
        $is_cmm4e = false;

        if (!empty($menus) && is_array($menus)) {
            foreach ($menus as $id => $menu) {
                $menu_meta = get_term_meta($id, MenuTermMeta::META_KEY, true);
                if (!empty($menu_meta['enabled'])) {
                    $is_cmm4e = true;
                    if (!empty($menu_meta['theme']) && 'none' != $menu_meta['theme']) {
                        $theme = get_page_by_path($menu_meta['theme'], OBJECT, 'cmm4e_menu_theme');
                        if ($theme && !isset($themes[$menu_meta['theme']])) {
                            $themes[$menu_meta['theme']] = $theme;
                        }
                    }
                }
            }
            if ($themes) {
                $uploads = wp_upload_dir();
                foreach ($themes as $name => $object) {
                    $theme_css = $uploads['basedir'] . '/cmm4e/cmm4e-menu-skin-' . $name . '.min.css';
                    $theme_meta = (array)get_post_meta($object->ID, MenuThemeMeta::META_KEY, true);
                    if (file_exists($theme_css)) {
                        wp_enqueue_style('cmm4e-menu-skin-' . $name, $uploads['baseurl'] . '/cmm4e/cmm4e-menu-skin-' . $name . '.min.css' , ['fontawesome47', 'cleverfont'], self::VERSION);
                        if (!empty($theme_meta['custom_css'])) {
                            $custom_css = str_replace('{{CURRENT_MENU}}', '.cmm4e.cmm4e-theme-' . $name, $theme_meta['custom_css']);
                            wp_add_inline_style('cmm4e-menu-skin-' . $name, $custom_css);
                        }
                        if (!empty($theme_meta['custom_js'])) {
                            wp_add_inline_script('cmm4e-mega-menu', $theme_meta['custom_js']);
                        }
                    } elseif ($name === 'default-menu-skin-461836') {
                        wp_enqueue_style('cmm4e-default-skin-461836');
                    }
                }
            }
        }

        wp_enqueue_script('cmm4e-mega-menu');
    }

    /**
     * Get menu items' data
     */
    private function get_items_settings($menu_id)
    {
        $items = wp_get_nav_menu_items($menu_id, [
            'no_found_rows' => true,
            'suppress_filters' => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false
        ]);

        $menu_items = [];

        if ($items) {
            foreach ($items as $item) {
                $cmm4e_menu_id = get_post_meta($item->ID, 'cmm4e_menu_post_id', true);
                $menu_items[$item->ID] = array_merge([
                    'cmm4e_icon' => '',
                    'enable_mega' => '',
                    'hide_title' => '0',
                    'disable_link' => '0',
                    'hide_on_mobile' => '0',
                    'hide_on_desktop' => '0',
                    'hide_sub_on_mobile' => '',
                    'show_badge' => '',
                    'mega_panel_width' => ['unit' => '%', 'size' => 100]
                ], (array)get_post_meta($cmm4e_menu_id, '_elementor_page_settings', true));
            }
        }

        return $menu_items;
    }

    /**
     * Get selected nav menu ID
     */
    private function get_selected_menu_id()
    {
        global $nav_menu_selected_id;

        if ($nav_menu_selected_id) {
            return $nav_menu_selected_id;
        }

        $nav_menus = wp_get_nav_menus(['orderby' => 'name']);

        $menu_count = count($nav_menus);

        $menu_id = isset($_REQUEST['menu'], $_REQUEST['action']) ? (int)$_REQUEST['menu'] : 0;

        $add_new_screen = (isset($_GET['menu']) && 0 === $_GET['menu']) ? true : false;

        $page_count = wp_count_posts('page');

        $one_theme_location_no_menus = (1 === count(get_registered_nav_menus()) && !$add_new_screen && empty($nav_menus) && !empty($page_count->publish)) ? true : false;

        $recently_edited = absint(get_user_option('nav_menu_recently_edited'));

        if (empty($recently_edited) && is_nav_menu($menu_id)) {
            $recently_edited = $menu_id;
        }

        if (empty($menu_id) && !isset($_GET['menu']) && is_nav_menu($recently_edited)) {
            $menu_id = $recently_edited;
        }

        if (!$add_new_screen && 0 < $menu_count && isset($_GET['action']) && 'delete' === $_GET['action']) {
            $menu_id = $nav_menus[0]->term_id;
        }

        if ($one_theme_location_no_menus) {
            $menu_id = 0;
        } elseif (empty($menu_id) && !empty($nav_menus) && !$add_new_screen) {
            $menu_id = $nav_menus[0]->term_id;
        }

        return $menu_id;
    }

    /**
     * Pre-activation check
     *
     * @throws  Exception
     */
    private function preActivate()
    {
        global $wpdb;

        if (version_compare(PHP_VERSION, '5.6', '<')) {
            throw new Exception(esc_html__('This plugin requires PHP version 5.6 at least!','clever-mega-menu-for-elementor'));
        }

        if (version_compare($GLOBALS['wp_version'], '4.7', '<')) {
            throw new Exception(esc_html__('This plugin requires WordPress version 4.7 at least!','clever-mega-menu-for-elementor'));
        }

        if (!defined('WP_CONTENT_DIR') || !is_writable(WP_CONTENT_DIR)) {
            throw new Exception(esc_html__('Your WordPress content directory is not writeable. Please correct permission of the directory before installing this plugin!','clever-mega-menu-for-elementor'));
        }

        $results = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_type='cmm4e_menu_theme' AND post_status='publish'");

        if (empty($results)) {
            $inserted = $wpdb->insert($wpdb->posts, [
                'post_type'      => 'cmm4e_menu_theme',
                'post_name'      => 'default-menu-skin-461836',
                'post_title'     => __('Default Menu Skin', 'clever-mega-menu-for-elementor'),
                'post_status'    => 'publish',
                'ping_status'    => 'closed',
                'comment_status' => 'closed'
            ]);
            if (!$inserted) {
                throw new Exception(esc_html__('Failed to insert default menu skin!','clever-mega-menu-for-elementor'));
            }
        }
    }
}

if (!class_exists('CleverSoft\WpPlugin\Cmm4EPro\Plugin')) {
    return new Plugin(get_option(Plugin::SETTINGS_KEY, []));
}
