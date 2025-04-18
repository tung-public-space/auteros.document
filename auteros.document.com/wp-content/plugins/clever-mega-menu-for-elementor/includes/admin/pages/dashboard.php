<?php

use CleverSoft\WpPlugin\Cmm4E\Plugin;

/**
 * Render page content
 */
function cmm4e_render_dashboard_menu_page($data)
{
    wp_enqueue_script('dashboard');

    ?>
    <div class="wrap clever-mega-menu-admin">
        <div id="welcome-panel" class="welcome-panel">
            <a class="welcome-panel-close" href="#" aria-label="Dismiss the welcome panel"><?php esc_html_e('Dismiss') ?></a>
            <div class="welcome-panel-content">
                <h2 class="welcome-page-title"><?php _e('Thanks you for using Clever Mega Menu for Elementor!', 'clever-mega-menu-for-elementor') ?></h2>
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h3><?php _e('First Steps', 'clever-mega-menu-for-elementor') ?></h3>
                        <a class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo admin_url('nav-menus.php?action=edit&menu=0') ?>"><?php _e('Create a Navigation Menu', 'clever-mega-menu-for-elementor') ?></a>
                        <p class="hide-if-no-customize"><?php _e('or', 'clever-mega-menu-for-elementor') ?>, <a href="<?php echo admin_url('nav-menus.php') ?>"><?php _e('edit an existing navigation menu', 'clever-mega-menu-for-elementor') ?></a>.</p>
                    </div>
                    <div class="welcome-panel-column">
                        <h3><?php esc_html_e('Next Steps') ?></h3>
                        <ul>
                            <li><i class="dashicons dashicons-welcome-add-page"></i> <a href="<?php echo admin_url('post-new.php?post_type=cmm4e_menu_theme') ?>"><?php _e('Create a menu skin', 'clever-mega-menu-for-elementor') ?></a></li>
                            <li><i class="dashicons dashicons-plus-alt"></i> <a href="<?php echo admin_url('post-new.php?post_type=cmm4e_menu_location') ?>"><?php _e('Register a menu location', 'clever-mega-menu-for-elementor') ?></a></li>
                            <li><i class="dashicons dashicons-admin-settings"></i> <a href="<?php echo admin_url('nav-menus.php?action=locations') ?>"><?php _e('Manage other menu locations') ?></a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h3><?php _e('More Steps', 'clever-mega-menu-for-elementor') ?></h3>
                        <ul>
                            <li><div><i class="dashicons dashicons-video-alt3"></i> <a target="_blank" href="#"><?php _e('View online tutorials') ?></a> </div></li>
                            <li><i class="dashicons dashicons-sos"></i> <a target="_blank" href="https://wordpress.org/support/plugin/clever-mega-menu-for-elementor/"><?php _e('Get help at plugin helpdesk', 'clever-mega-menu-for-elementor') ?></a></li>
                            <li><i class="dashicons dashicons-welcome-learn-more"></i> <a target="_blank" href="https://doc.cleveraddon.com/clever-mega-menu-elementor"><?php _e('Learn more about getting started') ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Add menu page
 */
add_action('admin_menu', function($context)
{
    add_menu_page(
        __('Mega Menu', 'clever-mega-menu-for-elementor'),
        __('Mega Menu', 'clever-mega-menu-for-elementor'),
        'manage_options',
        'cmm4e-dashboard-page',
        'cmm4e_render_dashboard_menu_page',
        CMM4E_URI . 'assets/backend/images/clever-mega-menu-icon-16x16.png',
        65
    );
}, 0);
