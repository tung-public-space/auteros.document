<?php namespace CleverSoft\WpPlugin\Cmm4E;

use Exception;

/**
 * Cmm4eMenuPostType
 */
final class Cmm4eMenuPostType
{
    /**
     * Post type
     *
     * @var object
     *
     * @see https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public $post_type;

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
            add_action('init', [$self, '_register'], 10, 0);
            add_action('init', [$self, '_preEditPost'], PHP_INT_MAX);
            add_filter('template_include', [$self, '_includeTemplate'], PHP_INT_MAX);
            add_filter('option_elementor_cpt_support', [$self, '_addElementorSupport']);
            add_filter('default_option_elementor_cpt_support', [$self, '_addElementorSupport']);
        }
    }

    /**
     * @internal Used as a callback.
     */
    function _register()
    {
        $this->post_type = register_post_type('cmm4e_menu', [
            'labels' => [
                'name' => __('Clever Mega Menu Items', 'clever-mega-menu-for-elementor'),
                'singular_name' => __('Clever Mega Menu Item', 'clever-mega-menu-for-elementor'),
                'all_items' => __('All Menu Items', 'clever-mega-menu-for-elementor')
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => false,
            'exclude_from_search' => true,
            'supports' => ['title', 'editor']
        ]);
    }

    /**
     * @internal Used as a callback.
     */
    function _preEditPost()
    {
        if (!current_user_can('edit_posts')) return;

        if (empty($_REQUEST['cmm4e-edit-menu-item']) || empty($_REQUEST['cmm4e_menu_post_id']) || empty($_REQUEST['cmm4e_menu_id'])) {
            return;
        }

        $menu_id = intval($_REQUEST['cmm4e_menu_id']);
        $menu_item_id = intval($_REQUEST['cmm4e_menu_post_id']);
        $mega_menu_id = get_post_meta($menu_item_id, 'cmm4e_menu_post_id', true);

        if (!$mega_menu_id) {
            $mega_menu_id = wp_insert_post([
                'post_title' => 'Mega Menu Item #' . $menu_item_id,
                'post_name' => 'cmm4e-mega-menu-item-' . $menu_item_id,
                'post_status' => 'publish',
                'post_type' => 'cmm4e_menu',
            ]);
            if (!is_int($mega_menu_id)) {
                throw new Exception(__('Elementor failed to make mega menu item editable.', 'clever-mega-menu-for-elementor'));
            } else {
                update_post_meta($mega_menu_id, 'cmm4e_menu_id', $menu_id);
                update_post_meta($menu_item_id, 'cmm4e_menu_post_id', $mega_menu_id);
                update_post_meta($mega_menu_id, 'cmm4e_menu_item_id', $menu_item_id);
            }
        }

        wp_redirect(add_query_arg(
            [
                'post' => $mega_menu_id,
                'action' => 'elementor',
                'context' => 'cmm4e-mega-menu',
                'cmm4e_menu_id' => $menu_id,
                'cmm4e_menu_post_id' => $menu_item_id,
            ],
            admin_url('post.php')
        ));

        exit;
    }

    /**
     * @internal  Used as a callback
     */
    function _addElementorSupport($supports)
    {
        if (empty($supports)) $supports = [];

        if (!isset($supports['cmm4e_menu'])) {
            $supports[] = 'cmm4e_menu';
        }

        return $supports;
    }

    /**
     * @internal  Used as a callback
     */
    function _includeTemplate($template)
    {
		if (is_singular('cmm4e_menu')) {
			$template = CMM4E_DIR . 'includes/templates/cmm4e-menu.php';
		}

		return $template;
    }
}
Cmm4eMenuPostType::init();
