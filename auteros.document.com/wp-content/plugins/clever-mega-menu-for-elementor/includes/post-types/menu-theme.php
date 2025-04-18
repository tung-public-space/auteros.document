<?php namespace CleverSoft\WpPlugin\Cmm4E;

use WP_Post;

/**
 * MenuThemePostType
 */
final class MenuThemePostType
{
    /**
     * Post type
     *
     * @var    object
     *
     * @see    https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public $post_type;

    /**
     * Nope constructor
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
            add_action('post_updated_messages', [$self, '_notify']);
            add_filter('post_row_actions', [$self, '_remove_quick_edit'], PHP_INT_MAX, 2);
        }
    }

    /**
     * Register portfolio post type
     *
     * @internal Used as a callback.
     */
    function _register()
    {
        $args = [
            'labels' => [
                'name' => __('Menu Skins', 'clever-mega-menu-for-elementor'),
                'singular_name' => __('Menu Skin', 'clever-mega-menu-for-elementor'),
                'all_items' => __('Menu Skins', 'clever-mega-menu-for-elementor'),
                'add_new' => __('Add New Menu Skin', 'clever-mega-menu-for-elementor'),
                'add_new_item' => __('Add New Menu Skin', 'clever-mega-menu-for-elementor'),
                'edit_item' => __('Edit Menu Skin', 'clever-mega-menu-for-elementor')
            ],
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => 'cmm4e-dashboard-page',
            'supports' => ['title']
        ];

        $this->post_type = register_post_type('cmm4e_menu_theme', $args);
    }

    /**
     * Do notification
     *
     * @internal  Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     *
     * @see  https://developer.wordpress.org/reference/hooks/post_updated_messages/
     */
    function _notify($messages)
    {
        $messages['cmm4e_menu_theme'] = [
            0  => '', // Unused. Messages start at index 1.
            1  => __('Menu skin updated.', 'clever-mega-menu-for-elementor'),
            2  => __('Custom field updated.', 'clever-mega-menu-for-elementor'),
            3  => __('Custom field deleted.', 'clever-mega-menu-for-elementor'),
            4  => __('Menu skin updated.', 'clever-mega-menu-for-elementor'),
            5  => isset($_GET['revision']) ? __('Menu skin restored to revision from', 'clever-mega-menu-for-elementor') . ' ' . wp_post_revision_title(absint($_GET['revision'])) : false,
            6  => __('Menu skin published.', 'clever-mega-menu-for-elementor'),
            7  => __('Menu skin saved.', 'clever-mega-menu-for-elementor'),
            8  => __('Menu skin submitted.', 'clever-mega-menu-for-elementor'),
            9  => __('Menu skin scheduled.', 'clever-mega-menu-for-elementor'),
            10 => __('Menu skin draft updated.', 'clever-mega-menu-for-elementor')
        ];

        return $messages;
    }

    /**
     * Disable quick edit
     *
     * @internal Used as a callback.
     *
     * @see    https://developer.wordpress.org/reference/hooks/post_row_actions-5/
     */
    function _remove_quick_edit($actions, WP_Post $post)
    {
        if ('cmm4e_menu_theme' !== $post->post_type) {
            return $actions;
        }

        unset($actions['inline hide-if-no-js']);

        return $actions;
    }
}
MenuThemePostType::init();
