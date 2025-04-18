<?php namespace CleverSoft\WpPlugin\Cmm4E;

use WP_Post;
use Exception;
use LeafoScssCompiler;

/**
 * MenuThemeMeta
 */
final class MenuThemeMeta
{
    /**
     * Meta key
     *
     * @var    string
     */
    const META_KEY = 'cmm4e_menu_theme_meta';

    /**
     * Meta fields
     *
     * @var    array
     */
    public static $fields = [
        'general_font_size'                             => 14,
        'general_letter_spacing'                        => 'normal',
        'general_font_weight'                           => '400',
        'general_line_height'                           => '1.6',
        'general_text_transform'                        => 'none',
        'general_text_color'                            => '#666',
        'general_link_color'                            => '#d71683',
        'general_link_hover_color'                      => '#2bb461',
        'general_arrow_up'                              => 'fa fa-angle-up',
        'general_arrow_down'                            => 'fa fa-angle-down',
        'general_arrow_left'                            => 'fa fa-angle-left',
        'general_arrow_right'                           => 'fa fa-angle-right',
        'general_mobile_breakpoint'                     => 992,
        'menubar_style'                                 => 'horizontal',
        'menubar_vertical_width'                        => 260,
        'menubar_horizontal_layout'                     => 'horizontal-align-right',
        'menubar_menu_height'                           => 60,
        'menubar_margin_top'                            => 0,
        'menubar_margin_right'                          => 0,
        'menubar_margin_bottom'                         => 0,
        'menubar_margin_left'                           => 0,
        'menubar_padding_top'                           => 0,
        'menubar_padding_right'                         => 0,
        'menubar_padding_bottom'                        => 0,
        'menubar_padding_left'                          => 0,
        'menubar_border_color'                          => 'transparent',
        'menubar_border_top'                            => 0,
        'menubar_border_right'                          => 0,
        'menubar_border_bottom'                         => 0,
        'menubar_border_left'                           => 0,
        'menubar_border_style'                          => 'solid',
        'menubar_border_radius_top_left'                => 0,
        'menubar_border_radius_top_right'               => 0,
        'menubar_border_radius_bottom_right'            => 0,
        'menubar_border_radius_bottom_left'             => 0,
        'menubar_bg_from_color'                         => '#fff',
        'menubar_bg_to_color'                           => '#fff',
        'menubar_bg_gradient_direction'                 => 'to right',
        'menubar_item_text_color'                       => '#d71683',
        'menubar_item_text_hover_color'                 => '#2bb461',
        'menubar_item_text_font_size'                   => 14,
        'menubar_item_text_font_weight'                 => '600',
        'menubar_item_text_line_height'                 => '1.6',
        'menubar_item_text_transform'                   => 'uppercase',
        'menubar_item_text_letter_spacing'              => 'normal',
        'menubar_item_bg_color'                         => '#fff',
        'menubar_item_bg_hover_color'                   => '#fff',
        'menubar_item_padding_top'                      => 0,
        'menubar_item_padding_right'                    => 20,
        'menubar_item_padding_bottom'                   => 0,
        'menubar_item_padding_left'                     => 20,
        'menubar_item_margin_top'                       => 0,
        'menubar_item_margin_right'                     => 0,
        'menubar_item_margin_bottom'                    => 0,
        'menubar_item_margin_left'                      => 0,
        'menubar_item_border_color'                     => 'transparent',
        'menubar_item_border_top'                       => 0,
        'menubar_item_border_right'                     => 0,
        'menubar_item_border_bottom'                    => 0,
        'menubar_item_border_left'                      => 0,
        'menubar_item_border_style'                     => 'solid',
        'menubar_item_border_hover_color'               => 'transparent',
        'menubar_item_border_hover_style'               => 'solid',
        'menubar_item_border_last_child'                => '1',
        'mega_panel_css_selector'                       => '.cmm4e-container',
        'mega_panel_bg_from_color'                      => '#fff',
        'mega_panel_bg_to_color'                        => '#fff',
        'mega_panel_bg_gradient_direction'              => 'to right',
        'mega_panel_padding_top'                        => 15,
        'mega_panel_padding_right'                      => 20,
        'mega_panel_padding_bottom'                     => 20,
        'mega_panel_padding_left'                       => 20,
        'mega_panel_border_color'                       => 'transparent',
        'mega_panel_border_top'                         => 0,
        'mega_panel_border_right'                       => 0,
        'mega_panel_border_bottom'                      => 0,
        'mega_panel_border_left'                        => 0,
        'mega_panel_border_style'                       => 'solid',
        'mega_panel_border_radius_top_left'             => 0,
        'mega_panel_border_radius_top_right'            => 0,
        'mega_panel_border_radius_bottom_right'         => 0,
        'mega_panel_border_radius_bottom_left'          => 0,
        'mega_panel_h_shadow'                           => 1,
        'mega_panel_v_shadow'                           => 3,
        'mega_panel_blur_shadow'                        => 5,
        'mega_panel_spread_shadow'                      => 0,
        'mega_panel_shadow_color'                       => 'rgba(0, 0, 0, 0.2)',
        'mega_panel_heading_font_size'                  => 14,
        'mega_panel_heading_font_weight'                => '600',
        'mega_panel_heading_color'                      => '#333',
        'mega_panel_heading_style'                      => 'uppercase',
        'mega_panel_heading_line_height'                => '1.6',
        'mega_panel_heading_letter_spacing'             => 'normal',
        'mega_panel_heading_margin_top'                 => 0,
        'mega_panel_heading_margin_right'               => 0,
        'mega_panel_heading_margin_bottom'              => 5,
        'mega_panel_heading_margin_left'                => 0,
        'mega_panel_heading_padding_top'                => 0,
        'mega_panel_heading_padding_right'              => 0,
        'mega_panel_heading_padding_bottom'             => 0,
        'mega_panel_heading_padding_left'               => 0,
        'mega_panel_heading_border_color'               => '#ebebeb',
        'mega_panel_heading_border_top'                 => 0,
        'mega_panel_heading_border_right'               => 0,
        'mega_panel_heading_border_bottom'              => 1,
        'mega_panel_heading_border_left'                => 0,
        'mega_panel_heading_border_style'               => 'solid',
        'mega_panel_heading_border_radius_top_left'     => 0,
        'mega_panel_heading_border_radius_top_right'    => 0,
        'mega_panel_heading_border_radius_bottom_right' => 0,
        'mega_panel_heading_border_radius_bottom_left'  => 0,
        'mega_panel_item_text_color'                    => '#666',
        'mega_panel_item_text_hover_color'              => '#333',
        'mega_panel_item_text_font_size'                => 14,
        'mega_panel_item_text_font_weight'              => '400',
        'mega_panel_item_text_line_height'              => '1.6',
        'mega_panel_item_text_transform'                => 'capitalize',
        'mega_panel_item_text_letter_spacing'           => 'normal',
        'mega_panel_item_bg_color'                      => '#fff',
        'mega_panel_item_bg_hover_color'                => '#fff',
        'mega_panel_item_padding_top'                   => 5,
        'mega_panel_item_padding_right'                 => 0,
        'mega_panel_item_padding_bottom'                => 5,
        'mega_panel_item_padding_left'                  => 0,
        'mega_panel_item_border_color'                  => 'transparent',
        'mega_panel_item_border_top'                    => 0,
        'mega_panel_item_border_right'                  => 0,
        'mega_panel_item_border_bottom'                 => 0,
        'mega_panel_item_border_left'                   => 0,
        'mega_panel_item_border_style'                  => 'solid',
        'mega_panel_item_border_hover_color'            => 'transparent',
        'mega_panel_item_border_hover_style'            => 'solid',
        'mega_panel_item_border_last_child'             => '1',
        'flyout_bg_from_color'                          => '#fff',
        'flyout_bg_to_color'                            => '#fff',
        'flyout_bg_gradient_direction'                  => 'to right',
        'flyout_padding_top'                            => 0,
        'flyout_padding_right'                          => 20,
        'flyout_padding_bottom'                         => 0,
        'flyout_padding_left'                           => 20,
        'flyout_border_color'                           => 'transparent',
        'flyout_border_top'                             => 0,
        'flyout_border_right'                           => 0,
        'flyout_border_bottom'                          => 0,
        'flyout_border_left'                            => 0,
        'flyout_border_style'                           => 'solid',
        'flyout_border_radius_top_left'                 => 0,
        'flyout_border_radius_top_right'                => 0,
        'flyout_border_radius_bottom_right'             => 0,
        'flyout_border_radius_bottom_left'              => 0,
        'flyout_menu_h_shadow'                          => 1,
        'flyout_menu_v_shadow'                          => 3,
        'flyout_menu_blur_shadow'                       => 5,
        'flyout_menu_spread_shadow'                     => 0,
        'flyout_menu_color_shadow'                      => 'rgba(0, 0, 0, 0.2)',
        'flyout_item_text_color'                        => '#666',
        'flyout_item_text_hover_color'                  => '#333',
        'flyout_item_text_font_size'                    => 14,
        'flyout_item_text_font_weight'                  => '400',
        'flyout_item_text_line_height'                  => '1.6',
        'flyout_item_text_transform'                    => 'capitalize',
        'flyout_item_text_letter_spacing'               => 'normal',
        'flyout_item_bg_color'                          => 'transparent',
        'flyout_item_bg_hover_color'                    => 'transparent',
        'flyout_item_padding_top'                       => 10,
        'flyout_item_padding_right'                     => 0,
        'flyout_item_padding_bottom'                    => 10,
        'flyout_item_padding_left'                      => 0,
        'flyout_item_border_color'                      => '#ebebeb',
        'flyout_item_border_top'                        => 0,
        'flyout_item_border_right'                      => 0,
        'flyout_item_border_bottom'                     => 1,
        'flyout_item_border_left'                       => 0,
        'flyout_item_border_style'                      => 'solid',
        'flyout_item_border_hover_color'                => '#ebebeb',
        'flyout_item_border_hover_style'                => 'solid',
        'flyout_item_border_last_child'                 => '1',
        'mobile_panel_padding_top'                      => 20,
        'mobile_panel_padding_right'                    => 20,
        'mobile_panel_padding_bottom'                   => 20,
        'mobile_panel_padding_left'                     => 20,
        'mobile_menu_style'                             => 'off-canvas',
        'mobile_canvas_width'                           => 360,
        'mobile_offcanvas_position'                     => 'left',
        'mobile_panel_bg_color'                         => '#fff',
        'mobile_menu_disable_toggle'                    => '0',
        'mobile_menu_toggle_padding_top'                => 5,
        'mobile_menu_toggle_padding_right'              => 5,
        'mobile_menu_toggle_padding_bottom'             => 5,
        'mobile_menu_toggle_padding_left'               => 5,
        'mobile_menu_toggle_align'               => 'flex-end',
        'mobile_menu_toggle_position_top'               => 20,
        'mobile_menu_toggle_position_right'             => 0,
        'mobile_menu_toggle_position_bottom'            => 0,
        'mobile_menu_toggle_position_left'              => 20,
        'mobile_menu_toggle_button_trigger'             => '',
        'mobile_toggle_line_height'                     => 16,
        'mobile_menu_open_icon'                         => 'fa fa-navicon',
        'mobile_menu_close_icon'                        => 'fa fa-close',
        'mobile_toggle_size'                            => 16,
        'mobile_menu_toggle_text'                       => '',
        'mobile_toggle_color'                           => '#333',
        'mobile_toggle_bg_color'                        => 'transparent',
        'mobile_top_item_height'                        => 45,
        'mobile_menu_item_border_color'                 => '#ebebeb',
        'mobile_menu_item_border_style'                 => 'dotted',
        'flyout_sub_panel_indent'                       => 14,
        'custom_css'                                    => '',
        'custom_js'                                     => ''
    ];

    /**
     * Meta values
     *
     * @var    array
     */
    private $values;

    /**
     * Constructor
     */
    public function __construct()
    {
        $post_id = isset($_GET['post']) ? absint($_GET['post']) : 0;

        $this->values = (array) get_post_meta($post_id, self::META_KEY, true);
    }

    /**
     * Singleton
     */
    public static function init()
    {
        static $self = null;

        if (null === $self) {
            $self = new self;
            add_action('delete_post', [ $self, '_delete' ]);
            add_action('add_meta_boxes_cmm4e_menu_theme', [ $self, '_add' ]);
            add_action('save_post_cmm4e_menu_theme', [ $self, '_save' ], 10, 2);
        }
    }

    /**
     * Add theme meta boxes
     *
     * @internal    Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     */
    public function _add($post)
    {
        add_meta_box(
            'cmm4e-menu-theme-metabox',
            esc_html__('Menu Skin Options', 'clever-mega-menu-for-elementor'),
            array( $this, '_render' ),
            'cmm4e_menu_theme',
            'normal',
            'high'
        );
    }

    /**
     * Add general meta box
     *
     * @internal    Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     */
    public function _render()
    {
        ?>
        <ul class="tabs nav-tab-wrapper wp-clearfix">
        <li class="nav-tab tab-active" data-tab-id="#cmm4e-general-options">
			<?php esc_html_e('General', 'clever-mega-menu-for-elementor') ?>
        </li>
        <li class="nav-tab" data-tab-id="#cmm4e-menu-bar-options">
			<?php esc_html_e('Menu Bar', 'clever-mega-menu-for-elementor') ?>
        </li>
        <li class="nav-tab" data-tab-id="#cmm4e-flyout-options">
			<?php esc_html_e('Flyout Panel', 'clever-mega-menu-for-elementor') ?>
        </li>
        <li class="nav-tab" data-tab-id="#cmm4e-mega-options">
			<?php esc_html_e('Mega Panel', 'clever-mega-menu-for-elementor') ?>
        </li>
        <li class="nav-tab" data-tab-id="#cmm4e-mobile-options">
			<?php esc_html_e('Mobile Panel', 'clever-mega-menu-for-elementor') ?>
        </li>
        <li class="nav-tab" data-tab-id="#cmm4e-custom-options">
			<?php esc_html_e('Custom', 'clever-mega-menu-for-elementor') ?>
        </li>
        </ul>
        <table id="cmm4e-general-options" class="form-table clever-mega-menu-admin clever-mega-menu-theme-metabox">
            <tr>
                <td class="row-label"><?php _e( 'Link Text', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Normal Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('general_link_color') ?>"
                               value="<?php echo $this->get_value('general_link_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Hover Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('general_link_hover_color') ?>"
                               value="<?php echo $this->get_value('general_link_hover_color') ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Normal Text', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('general_text_color') ?>"
                               value="<?php echo $this->get_value('general_text_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Size', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline" name="<?php echo $this->get_field( 'general_font_size' ) ?>"
                               value="<?php echo $this->get_value( 'general_font_size' ) ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Weight', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php
                        $selected     = $this->get_value('general_font_weight');
        $font_weights = array( 100, 200, 300, 400, 500, 600, 700, 800, 900 ); ?>
                        <select name="<?php echo $this->get_field('general_font_weight') ?>">
							<?php foreach ($font_weights as $weight) : ?>
                                <option value="<?php echo intval($weight) ?>" <?php selected($selected, $weight) ?>><?php echo intval($weight) ?></option>
							<?php endforeach ?>
                        </select>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Line Height', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field('general_line_height') ?>"
                               value="<?php echo $this->get_value('general_line_height') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Letter Spacing', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field( 'general_letter_spacing' ) ?>"
                               value="<?php echo $this->get_value( 'general_letter_spacing' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Text Transform', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'general_text_transform' ) ?>
                        <select name="<?php echo $this->get_field( 'general_text_transform' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="lowercase" <?php selected( $selected, 'lowercase' ) ?>><?php _e( 'Lowercase', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="capitalize" <?php selected( $selected, 'capitalize' ) ?>><?php _e( 'Capitalize', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="uppercase" <?php selected( $selected, 'uppercase' ) ?>><?php _e( 'Uppercase', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Arrows', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Up', 'clever-mega-menu-for-elementor' ) ?></p>
                        <span class="clever-mega-menu-icon <?php echo $this->get_value( 'general_arrow_up' ) ?>"></span>
                        <div class="clever-mega-menu-icons clever-arrow-up-icons" style="display:none">
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="fa fa-caret-up"></span>
                                <span class="fa fa-angle-up"></span>
                                <span class="fa fa-long-arrow-up"></span>
                            </div>
                            <?php if (class_exists('CleverAddons', false)) : ?>
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="cs-font clever-icon-caret-up"></span>
                                <span class="cs-font clever-icon-up"></span>
                                <span class="cs-font clever-icon-arrow-up"></span>
                            </div>
                            <?php endif ?>
                        </div>
                        <input type="hidden" name="<?php echo $this->get_field('general_arrow_up') ?>"
                               value="<?php echo $this->get_value('general_arrow_up') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Down', 'clever-mega-menu-for-elementor' ) ?></p>
                        <span class="clever-mega-menu-icon <?php echo $this->get_value( 'general_arrow_down' ) ?>"></span>
                        <div class="clever-mega-menu-icons clever-arrow-down-icons" style="display:none">
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="fa fa-caret-down"></span>
                                <span class="fa fa-angle-down"></span>
                                <span class="fa fa-long-arrow-down"></span>
                            </div>
                            <?php if (class_exists('CleverAddons', false)) : ?>
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="cs-font clever-icon-caret-down"></span>
                                <span class="cs-font clever-icon-down"></span>
                                <span class="cs-font clever-icon-arrow-down"></span>
                            </div>
                            <?php endif ?>
                        </div>
                        <input type="hidden" name="<?php echo $this->get_field('general_arrow_down') ?>"
                               value="<?php echo $this->get_value('general_arrow_down') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <span class="clever-mega-menu-icon <?php echo $this->get_value( 'general_arrow_left' ) ?>"></span>
                        <div class="clever-mega-menu-icons clever-arrow-down-icons" style="display:none">
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="fa fa-caret-left"></span>
                                <span class="fa fa-angle-left"></span>
                                <span class="fa fa-long-arrow-left"></span>
                            </div>
                            <?php if (class_exists('CleverAddons', false)) : ?>
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="cs-font clever-icon-caret-left"></span>
                                <span class="cs-font clever-icon-prev"></span>
                                <span class="cs-font clever-icon-arrow-left-4"></span>
                            </div>
                            <?php endif ?>
                        </div>
                        <input type="hidden" name="<?php echo $this->get_field('general_arrow_left') ?>"
                               value="<?php echo $this->get_value('general_arrow_left') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <span class="clever-mega-menu-icon <?php echo $this->get_value( 'general_arrow_right' ) ?>"></span>
                        <div class="clever-mega-menu-icons clever-arrow-down-icons" style="display:none">
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="fa fa-caret-right"></span>
                                <span class="fa fa-angle-right"></span>
                                <span class="fa fa-long-arrow-right"></span>
                            </div>
                            <?php if (class_exists('CleverAddons', false)) : ?>
                            <div>
                                <span class="dashicons none">&nbsp;</span>
                                <span class="cs-font clever-icon-caret-right"></span>
                                <span class="cs-font clever-icon-next"></span>
                                <span class="cs-font clever-icon-arrow-right-4"></span>
                            </div>
                            <?php endif ?>
                        </div>
                        <input type="hidden" name="<?php echo $this->get_field('general_arrow_right') ?>"
                               value="<?php echo $this->get_value('general_arrow_right') ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Mobile Breakpoint', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <input type="number" class="inline"
                           name="<?php echo $this->get_field('general_mobile_breakpoint') ?>"
                           value="<?php echo $this->get_value('general_mobile_breakpoint') ?>"><span
                            class="unit">px</span>
                    <p class="description"><?php _e( 'Set a fixed width at which menus using this skin will turn into mobile layout. Default is 992px.', 'clever-mega-menu-for-elementor' ) ?></p>
                </td>
            </tr>
            <tr class="heading-row">
                <th scope="row" class="heading"><?php _e( 'Top Menu Items', 'clever-mega-menu-for-elementor' ) ?></th>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Link Text', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Normal Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_item_text_color') ?>"
                               value="<?php echo $this->get_value('menubar_item_text_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Hover Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_item_text_hover_color') ?>"
                               value="<?php echo $this->get_value('menubar_item_text_hover_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Size', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_text_font_size') ?>"
                               value="<?php echo $this->get_value('menubar_item_text_font_size') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Weight', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php
                        $selected = $this->get_value('menubar_item_text_font_weight');
        $font_weights = array( 100, 200, 300, 400, 500, 600, 700, 800, 900 ); ?>
                        <select name="<?php echo $this->get_field('menubar_item_text_font_weight') ?>">
							<?php foreach ($font_weights as $weight) : ?>
                                <option value="<?php echo intval($weight) ?>" <?php selected($selected, $weight) ?>><?php echo intval($weight) ?></option>
							<?php endforeach ?>
                        </select>
                    </label>
                    <label class="clever-mega-menu-vertial-menu-layouts">
                        <p class="description"><?php _e( 'Line Height', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field('menubar_item_text_line_height') ?>"
                               value="<?php echo $this->get_value('menubar_item_text_line_height') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Letter Spacing', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field( 'menubar_item_text_letter_spacing' ) ?>"
                               value="<?php echo $this->get_value( 'menubar_item_text_letter_spacing' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Text Transform', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'menubar_item_text_transform' ) ?>
                        <select name="<?php echo $this->get_field( 'menubar_item_text_transform' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="lowercase" <?php selected( $selected, 'lowercase' ) ?>><?php _e( 'Lowercase', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="capitalize" <?php selected( $selected, 'capitalize' ) ?>><?php _e( 'Capitalize', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="uppercase" <?php selected( $selected, 'uppercase' ) ?>><?php _e( 'Uppercase', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Margin', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_margin_top') ?>"
                               value="<?php echo $this->get_value('menubar_item_margin_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_margin_right') ?>"
                               value="<?php echo $this->get_value('menubar_item_margin_right') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_margin_bottom') ?>"
                               value="<?php echo $this->get_value('menubar_item_margin_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_margin_left') ?>"
                               value="<?php echo $this->get_value('menubar_item_margin_left') ?>"><span class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_padding_top') ?>"
                               value="<?php echo $this->get_value('menubar_item_padding_top') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_padding_right') ?>"
                               value="<?php echo $this->get_value('menubar_item_padding_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_padding_bottom') ?>"
                               value="<?php echo $this->get_value('menubar_item_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_padding_left') ?>"
                               value="<?php echo $this->get_value('menubar_item_padding_left') ?>"><span class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_item_border_color') ?>"
                               value="<?php echo $this->get_value('menubar_item_border_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_border_top') ?>"
                               value="<?php echo $this->get_value('menubar_item_border_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_border_right') ?>"
                               value="<?php echo $this->get_value('menubar_item_border_right') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_border_bottom') ?>"
                               value="<?php echo $this->get_value('menubar_item_border_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_item_border_left') ?>"
                               value="<?php echo $this->get_value('menubar_item_border_left') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'menubar_item_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'menubar_item_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border Hover', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field( 'menubar_item_border_hover_color' ) ?>"
                               value="<?php echo $this->get_value( 'menubar_item_border_hover_color' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'menubar_item_border_hover_style' ) ?>
                        <select name="<?php echo $this->get_field( 'menubar_item_border_hover_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Background Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Normal Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_item_bg_color') ?>"
                               value="<?php echo $this->get_value('menubar_item_bg_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Hover Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_item_bg_hover_color') ?>"
                               value="<?php echo $this->get_value('menubar_item_bg_hover_color') ?>">
                    </label>
                </td>
            </tr>
            <tr class="last-row">
                <td class="row-label"><?php esc_html_e( 'Hide Last Menu Item Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="checkbox" name="<?php echo $this->get_field( 'menubar_item_border_last_child' ) ?>"
                               value="1"<?php checked( $this->get_value( 'menubar_item_border_last_child' ) ) ?>>
                        <span class="description"><?php esc_html_e( 'Whether to hide border of the last item or not.', 'clever-mega-menu-for-elementor' ) ?></span>
                    </label>
                </td>
            </tr>
            <tr class="heading-row">
                <th scope="row" class="heading"><?php _e( 'Sub Menu Items', 'clever-mega-menu-for-elementor' ) ?></th>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Link Text', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Normal Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_item_text_color') ?>"
                               value="<?php echo $this->get_value('flyout_item_text_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Hover Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_item_text_hover_color') ?>"
                               value="<?php echo $this->get_value('flyout_item_text_hover_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Size', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_text_font_size') ?>"
                               value="<?php echo $this->get_value('flyout_item_text_font_size') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Weight', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php
                        $selected     = $this->get_value('flyout_item_text_font_weight');
        $font_weights = array( 100, 200, 300, 400, 500, 600, 700, 800, 900 ); ?>
                        <select name="<?php echo $this->get_field('flyout_item_text_font_weight') ?>">
							<?php foreach ($font_weights as $weight) : ?>
                                <option value="<?php echo intval($weight) ?>" <?php selected($selected, $weight) ?>><?php echo intval($weight) ?></option>
							<?php endforeach ?>
                        </select>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Line Height', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field('flyout_item_text_line_height') ?>"
                               value="<?php echo $this->get_value('flyout_item_text_line_height') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Letter Spacing', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field( 'flyout_item_text_letter_spacing' ) ?>"
                               value="<?php echo $this->get_value( 'flyout_item_text_letter_spacing' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Text Transform', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'flyout_item_text_transform' ) ?>
                        <select name="<?php echo $this->get_field( 'flyout_item_text_transform' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="lowercase" <?php selected( $selected, 'lowercase' ) ?>><?php _e( 'Lowercase', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="capitalize" <?php selected( $selected, 'capitalize' ) ?>><?php _e( 'Capitalize', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="uppercase" <?php selected( $selected, 'uppercase' ) ?>><?php _e( 'Uppercase', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_padding_top') ?>"
                               value="<?php echo $this->get_value('flyout_item_padding_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_padding_right') ?>"
                               value="<?php echo $this->get_value('flyout_item_padding_right') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_padding_bottom') ?>"
                               value="<?php echo $this->get_value('flyout_item_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_padding_left') ?>"
                               value="<?php echo $this->get_value('flyout_item_padding_left') ?>"><span class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_item_border_color') ?>"
                               value="<?php echo $this->get_value('flyout_item_border_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_border_top') ?>"
                               value="<?php echo $this->get_value('flyout_item_border_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_border_right') ?>"
                               value="<?php echo $this->get_value('flyout_item_border_right') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_border_bottom') ?>"
                               value="<?php echo $this->get_value('flyout_item_border_bottom') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_item_border_left') ?>"
                               value="<?php echo $this->get_value('flyout_item_border_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'flyout_item_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'flyout_item_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border Hover', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field( 'flyout_item_border_hover_color' ) ?>"
                               value="<?php echo $this->get_value( 'flyout_item_border_hover_color' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'flyout_item_border_hover_style' ) ?>
                        <select name="<?php echo $this->get_field( 'flyout_item_border_hover_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Background Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Normal Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_item_bg_color') ?>"
                               value="<?php echo $this->get_value('flyout_item_bg_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Hover Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_item_bg_hover_color') ?>"
                               value="<?php echo $this->get_value('flyout_item_bg_hover_color') ?>">
                    </label>
                </td>
            </tr>
            <tr class="last-row">
                <td class="row-label"><?php esc_html_e( 'Hide Last Item Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="checkbox" name="<?php echo $this->get_field( 'flyout_item_border_last_child' ) ?>"
                               value="1"<?php checked( $this->get_value( 'flyout_item_border_last_child' ) ) ?>>
                        <span class="description"><?php esc_html_e( 'Whether to hide border of the last item or not.', 'clever-mega-menu-for-elementor' ) ?></span>
                    </label>
                </td>
            </tr>
        </table>
        <table id="cmm4e-menu-bar-options" class="form-table clever-mega-menu-admin clever-mega-menu-theme-metabox"
               style="display:none">
            <tr class="clever-mega-menu-horizontal-menu-layouts">
                <td class="row-label"><?php _e( 'Height', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <input type="number" class="inline" name="<?php echo $this->get_field('menubar_menu_height') ?>"
                           value="<?php echo $this->get_value('menubar_menu_height') ?>"><span class="unit">px</span>
                </td>
            </tr>
            <tr class="clever-mega-menu-horizontal-menu-layouts">
				<?php
				$horizontal_layouts = array(
					'horizontal-align-left'    => __( 'Align Left', 'clever-mega-menu-for-elementor' ),
					'horizontal-align-center'  => __( 'Align Center', 'clever-mega-menu-for-elementor' ),
					'horizontal-align-right'   => __( 'Align Right', 'clever-mega-menu-for-elementor' ),
					'horizontal-space-around'  => __( 'Space Around', 'clever-mega-menu-for-elementor' ),
					'horizontal-space-between' => __( 'Space Between', 'clever-mega-menu-for-elementor' ),
				);
				$key                = $this->get_field( 'menubar_horizontal_layout' );
				$val                = $this->get_value( 'menubar_horizontal_layout' );
				?>
                <td class="row-label"><?php _e( 'Layout', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
					<?php
                    foreach ($horizontal_layouts as $layout => $lname) :
                        $layout_img = CMM4E_URI . 'assets/backend/images/layouts/' . esc_attr($layout) . '.jpg'; ?><label><input
                                type="radio" title="<?php echo esc_attr($lname) ?>" name="<?php echo esc_attr($key) ?>"
                                value="<?php echo esc_attr($layout) ?>" <?php checked($val, $layout) ?>><img
                                src="<?php echo esc_url($layout_img) ?>" alt="" width="97" height="15"></label><?php
                    endforeach; ?>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Margin', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_margin_top') ?>"
                               value="<?php echo $this->get_value('menubar_margin_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_margin_right') ?>"
                               value="<?php echo $this->get_value('menubar_margin_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_margin_bottom') ?>"
                               value="<?php echo $this->get_value('menubar_margin_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_margin_left') ?>"
                               value="<?php echo $this->get_value('menubar_margin_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_padding_top') ?>"
                               value="<?php echo $this->get_value('menubar_padding_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_padding_right') ?>"
                               value="<?php echo $this->get_value('menubar_padding_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_padding_bottom') ?>"
                               value="<?php echo $this->get_value('menubar_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_padding_left') ?>"
                               value="<?php echo $this->get_value('menubar_padding_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_border_color') ?>"
                               value="<?php echo $this->get_value('menubar_border_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_top') ?>"
                               value="<?php echo $this->get_value('menubar_border_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_right') ?>"
                               value="<?php echo $this->get_value('menubar_border_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_bottom') ?>"
                               value="<?php echo $this->get_value('menubar_border_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_left') ?>"
                               value="<?php echo $this->get_value('menubar_border_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'menubar_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'menubar_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border Radius', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_radius_top_left') ?>"
                               value="<?php echo $this->get_value('menubar_border_radius_top_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_radius_top_right') ?>"
                               value="<?php echo $this->get_value('menubar_border_radius_top_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_radius_bottom_right') ?>"
                               value="<?php echo $this->get_value('menubar_border_radius_bottom_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('menubar_border_radius_bottom_left') ?>"
                               value="<?php echo $this->get_value('menubar_border_radius_bottom_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Background Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'From', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_bg_from_color') ?>"
                               value="<?php echo $this->get_value('menubar_bg_from_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'To', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('menubar_bg_to_color') ?>"
                               value="<?php echo $this->get_value('menubar_bg_to_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Gradient Direction', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'menubar_bg_gradient_direction' ) ?>
                        <select name="<?php echo $this->get_field( 'menubar_bg_gradient_direction' ) ?>">
                            <option value="to right" <?php selected( $selected, 'to right' ) ?>><?php _e( 'Left to Right', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="to bottom" <?php selected( $selected, 'to bottom' ) ?>><?php _e( 'Top to Bottom', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
        </table>
        <table id="cmm4e-flyout-options" class="form-table clever-mega-menu-admin clever-mega-menu-theme-metabox"
               style="display:none">
            <tr class="first-row">
                <td class="row-label"><?php _e( 'Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_padding_top') ?>"
                               value="<?php echo $this->get_value('flyout_padding_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_padding_right') ?>"
                               value="<?php echo $this->get_value('flyout_padding_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_padding_bottom') ?>"
                               value="<?php echo $this->get_value('flyout_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_padding_left') ?>"
                               value="<?php echo $this->get_value('flyout_padding_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_border_color') ?>"
                               value="<?php echo $this->get_value('flyout_border_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline" name="<?php echo $this->get_field( 'flyout_border_top' ) ?>"
                               value="<?php echo $this->get_value( 'flyout_border_top' ) ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_border_right') ?>"
                               value="<?php echo $this->get_value('flyout_border_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_border_bottom') ?>"
                               value="<?php echo $this->get_value('flyout_border_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_border_left') ?>"
                               value="<?php echo $this->get_value('flyout_border_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'flyout_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'flyout_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Border Radius', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_border_radius_top_left') ?>"
                               value="<?php echo $this->get_value('flyout_border_radius_top_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_border_radius_top_right') ?>"
                               value="<?php echo $this->get_value('flyout_border_radius_top_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_border_radius_bottom_right') ?>"
                               value="<?php echo $this->get_value('flyout_border_radius_bottom_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_border_radius_bottom_left') ?>"
                               value="<?php echo $this->get_value('flyout_border_radius_bottom_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr class="clever-mega-menu-box-shadow-field">
                <td class="row-label"><?php _e( 'Box Shadow', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Horizontal', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_menu_h_shadow') ?>"
                               value="<?php echo $this->get_value('flyout_menu_h_shadow') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Vertical', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_menu_v_shadow') ?>"
                               value="<?php echo $this->get_value('flyout_menu_v_shadow') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Blur', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_menu_blur_shadow') ?>"
                               value="<?php echo $this->get_value('flyout_menu_blur_shadow') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Spread', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('flyout_menu_spread_shadow') ?>"
                               value="<?php echo $this->get_value('flyout_menu_spread_shadow') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_menu_color_shadow') ?>"
                               value="<?php echo $this->get_value('flyout_menu_color_shadow') ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Background Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'From', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_bg_from_color') ?>"
                               value="<?php echo $this->get_value('flyout_bg_from_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'To', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('flyout_bg_to_color') ?>"
                               value="<?php echo $this->get_value('flyout_bg_to_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Gradient Direction', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'flyout_bg_gradient_direction' ) ?>
                        <select name="<?php echo $this->get_field( 'flyout_bg_gradient_direction' ) ?>">
                            <option value="to right" <?php selected( $selected, 'to right' ) ?>><?php _e( 'Left to Right', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="to bottom" <?php selected( $selected, 'to bottom' ) ?>><?php _e( 'Top to Bottom', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
        </table>
        <table id="cmm4e-mega-options" class="form-table clever-mega-menu-admin clever-mega-menu-theme-metabox"
               style="display:none">
            <tr>
                <td class="row-label"> <?php _e( 'Fit To', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <input type="text" name="<?php echo $this->get_field( 'mega_panel_css_selector' ) ?>"
                           value="<?php echo $this->get_value( 'mega_panel_css_selector' ) ?>">
                    <p class="description"><?php _e( 'Enter a CSS selector of an unique ancestor element to synchronize the width of mega panels with that element (e.g. body, .main-navigation). Default is the nearest .cmm4e-container', 'clever-mega-menu-for-elementor' ) ?></p>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php esc_html_e( 'Background Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php esc_html_e( 'From', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_bg_from_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_bg_from_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'To', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_bg_to_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_bg_to_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Gradient Direction', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mega_panel_bg_gradient_direction' ) ?>
                        <select name="<?php echo $this->get_field( 'mega_panel_bg_gradient_direction' ) ?>">
                            <option value="to right" <?php selected( $selected, 'to right' ) ?>><?php _e( 'Left to Right', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="to bottom" <?php selected( $selected, 'to bottom' ) ?>><?php _e( 'Top to Bottom', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php esc_html_e( 'Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php esc_html_e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_padding_top') ?>"
                               value="<?php echo $this->get_value('mega_panel_padding_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_padding_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_padding_right') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_padding_bottom') ?>"
                               value="<?php echo $this->get_value('mega_panel_padding_bottom') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_padding_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_padding_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php esc_html_e( 'Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php esc_html_e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_border_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_top') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_bottom') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_bottom') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mega_panel_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'mega_panel_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php esc_html_e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php esc_html_e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php esc_html_e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php esc_html_e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php esc_html_e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php esc_html_e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php esc_html_e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php esc_html_e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php esc_html_e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php esc_html_e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php esc_html_e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php esc_html_e( 'Border Radius', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php esc_html_e( 'Top Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_radius_top_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_radius_top_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Top Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_radius_top_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_radius_top_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Bottom Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_radius_bottom_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_radius_bottom_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Bottom Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_border_radius_bottom_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_border_radius_bottom_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr class="clever-mega-menu-box-shadow-field">
                <td class="row-label"><?php esc_html_e( 'Box Shadow', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php esc_html_e( 'Horizontal', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_h_shadow') ?>"
                               value="<?php echo $this->get_value('mega_panel_h_shadow') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Vertical', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_v_shadow') ?>"
                               value="<?php echo $this->get_value('mega_panel_v_shadow') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Blur', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_blur_shadow') ?>"
                               value="<?php echo $this->get_value('mega_panel_blur_shadow') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Spread', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_spread_shadow') ?>"
                               value="<?php echo $this->get_value('mega_panel_spread_shadow') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php esc_html_e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_shadow_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_shadow_color') ?>">
                    </label>
                </td>
            </tr>
            <tr class="heading-row">
                <th scope="row" class="heading">
					<?php _e( 'Navigation Menu Widget', 'clever-mega-menu-for-elementor' ) ?>
                </th>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Title Text', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_heading_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Size', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_font_size') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_font_size') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Weight', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php
                        $selected     = $this->get_value('mega_panel_heading_font_weight');
        $font_weights = array( 100, 200, 300, 400, 500, 600, 700, 800, 900 ); ?>
                        <select name="<?php echo $this->get_field('mega_panel_heading_font_weight') ?>">
							<?php foreach ($font_weights as $weight) : ?>
                                <option value="<?php echo intval($weight) ?>" <?php selected($selected, $weight) ?>><?php echo intval($weight) ?></option>
							<?php endforeach ?>
                        </select>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Line Height', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field('mega_panel_heading_line_height') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_line_height') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Letter Spacing', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field( 'mega_panel_heading_letter_spacing' ) ?>"
                               value="<?php echo $this->get_value( 'mega_panel_heading_letter_spacing' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Text Transform', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mega_panel_heading_style' ) ?>
                        <select name="<?php echo $this->get_field( 'mega_panel_heading_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="lowercase" <?php selected( $selected, 'lowercase' ) ?>><?php _e( 'Lowercase', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="capitalize" <?php selected( $selected, 'capitalize' ) ?>><?php _e( 'Capitalize', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="uppercase" <?php selected( $selected, 'uppercase' ) ?>><?php _e( 'Uppercase', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Title Margin', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_margin_top') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_margin_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_margin_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_margin_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_margin_bottom') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_margin_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_margin_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_margin_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Title Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_padding_top') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_padding_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_padding_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_padding_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_padding_bottom') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_padding_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_padding_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Title Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_heading_border_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_top') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_bottom') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mega_panel_heading_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'mega_panel_heading_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Title Border Radius', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_radius_top_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_radius_top_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_radius_top_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_radius_top_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_radius_bottom_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_radius_bottom_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_heading_border_radius_bottom_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_heading_border_radius_bottom_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Menu Item Text', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Normal Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_item_text_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_text_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Hover Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_item_text_hover_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_text_hover_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Size', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_text_font_size') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_text_font_size') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Font Weight', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php
                        $selected     = $this->get_value('mega_panel_item_text_font_weight');
        $font_weights = array( 100, 200, 300, 400, 500, 600, 700, 800, 900 ); ?>
                        <select name="<?php echo $this->get_field('mega_panel_item_text_font_weight') ?>">
							<?php foreach ($font_weights as $weight) : ?>
                                <option value="<?php echo intval($weight) ?>" <?php selected($selected, $weight) ?>><?php echo intval($weight) ?></option>
							<?php endforeach ?>
                        </select>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Line Height', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field('mega_panel_item_text_line_height') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_text_line_height') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Letter Spacing', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="inline no-unit"
                               name="<?php echo $this->get_field( 'mega_panel_item_text_letter_spacing' ) ?>"
                               value="<?php echo $this->get_value( 'mega_panel_item_text_letter_spacing' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Text Transform', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mega_panel_item_text_transform' ) ?>
                        <select name="<?php echo $this->get_field( 'mega_panel_item_text_transform' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="lowercase" <?php selected( $selected, 'lowercase' ) ?>><?php _e( 'Lowercase', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="capitalize" <?php selected( $selected, 'capitalize' ) ?>><?php _e( 'Capitalize', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="uppercase" <?php selected( $selected, 'uppercase' ) ?>><?php _e( 'Uppercase', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Menu Item Background', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Normal Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_item_bg_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_bg_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Hover Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_item_bg_hover_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_bg_hover_color') ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Menu Item Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_padding_top') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_padding_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_padding_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_padding_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_padding_bottom') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_padding_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_padding_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Menu Item Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mega_panel_item_border_color') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_border_color') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_border_top') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_border_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_border_right') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_border_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_border_bottom') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_border_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mega_panel_item_border_left') ?>"
                               value="<?php echo $this->get_value('mega_panel_item_border_left') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mega_panel_item_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'mega_panel_item_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Menu Item Border Hover', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field( 'mega_panel_item_border_hover_color' ) ?>"
                               value="<?php echo $this->get_value( 'mega_panel_item_border_hover_color' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mega_panel_item_border_hover_style' ) ?>
                        <select name="<?php echo $this->get_field( 'mega_panel_item_border_hover_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php esc_html_e( 'Hide Last Item Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="checkbox"
                               name="<?php echo $this->get_field( 'mega_panel_item_border_last_child' ) ?>"
                               value="1"<?php checked( $this->get_value( 'mega_panel_item_border_last_child' ) ) ?>>
                        <span class="description"><?php esc_html_e( 'Whether to hide border of the last item or not.', 'clever-mega-menu-for-elementor' ) ?></span>
                    </label>
                </td>
            </tr>
        </table>
        <table id="cmm4e-mobile-options" class="form-table clever-mega-menu-admin clever-mega-menu-theme-metabox"
               style="display:none">
            <tr class="first-row">
                <td class="row-label"><?php _e( 'Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_panel_padding_top') ?>"
                               value="<?php echo $this->get_value('mobile_panel_padding_top') ?>"><span class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_panel_padding_right') ?>"
                               value="<?php echo $this->get_value('mobile_panel_padding_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_panel_padding_bottom') ?>"
                               value="<?php echo $this->get_value('mobile_panel_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_panel_padding_left') ?>"
                               value="<?php echo $this->get_value('mobile_panel_padding_left') ?>"><span class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr class="">
                <td class="row-label"><?php _e( 'Animation', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
					<?php $selected = $this->get_value( 'mobile_menu_style' ) ?>
                    <select id="cmm4e-mobile-animation" name="<?php echo $this->get_field( 'mobile_menu_style' ) ?>">
                        <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                        <option value="off-canvas" <?php selected( $selected, 'off-canvas' ) ?>><?php _e( 'Off-Canvas', 'clever-mega-menu-for-elementor' ) ?></option>
                        <option value="slide-down" <?php selected( $selected, 'slide-down' ) ?>><?php _e( 'Slide Down', 'clever-mega-menu-for-elementor' ) ?></option>
                    </select>
                    <p class="description"><?php _e( 'Sometimes, you want to animate a whole container which contains the menu. In that case, select "None" to disable animation of the menu only.', 'clever-mega-menu-for-elementor' ) ?></p>
                </td>
            </tr>
            <tr class="off-canvas-field">
                <td class="row-label"><?php _e( 'Canvas Width', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_canvas_width') ?>"
                               value="<?php echo $this->get_value('mobile_canvas_width') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr id="mobile-off-canvas-position" class="off-canvas-field">
                <td class="row-label"><?php _e( 'Off-Canvas Position', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
					<?php $selected = $this->get_value('mobile_offcanvas_position') ?>
                    <select name="<?php echo $this->get_field( 'mobile_offcanvas_position' ) ?>">
                        <option value="left" <?php selected( $selected, 'left' ) ?>><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></option>
                        <option value="right" <?php selected( $selected, 'right' ) ?>><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Background Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mobile_panel_bg_color') ?>"
                               value="<?php echo $this->get_value('mobile_panel_bg_color') ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Top Menu Item Height', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_top_item_height') ?>"
                               value="<?php echo $this->get_value('mobile_top_item_height') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e( 'Top Menu Item Border', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field( 'mobile_menu_item_border_color' ) ?>"
                               value="<?php echo $this->get_value( 'mobile_menu_item_border_color' ) ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Style', 'clever-mega-menu-for-elementor' ) ?></p>
						<?php $selected = $this->get_value( 'mobile_menu_item_border_style' ) ?>
                        <select name="<?php echo $this->get_field( 'mobile_menu_item_border_style' ) ?>">
                            <option value="none" <?php selected( $selected, 'none' ) ?>><?php _e( 'None', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inset" <?php selected( $selected, 'inset' ) ?>><?php _e( 'Inset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="outset" <?php selected( $selected, 'outset' ) ?>><?php _e( 'Outset', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="solid" <?php selected( $selected, 'solid' ) ?>><?php _e( 'Solid', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="ridge" <?php selected( $selected, 'ridge' ) ?>><?php _e( 'Ridge', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="inherit" <?php selected( $selected, 'inherit' ) ?>><?php _e( 'Inherit', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="hidden" <?php selected( $selected, 'hidden' ) ?>><?php _e( 'Hidden', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dotted" <?php selected( $selected, 'dotted' ) ?>><?php _e( 'Dotted', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="dashed" <?php selected( $selected, 'dashed' ) ?>><?php _e( 'Dashed', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="double" <?php selected( $selected, 'double' ) ?>><?php _e( 'Double', 'clever-mega-menu-for-elementor' ) ?></option>
                            <option value="groove" <?php selected( $selected, 'groove' ) ?>><?php _e( 'Groove', 'clever-mega-menu-for-elementor' ) ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td class="row-label"><?php _e('Flyout Sub Panel Indent', 'clever-mega-menu-for-elementor') ?></td>
                <td>
                    <label>
                        <input type="number" class="inline" name="<?php echo $this->get_field('flyout_sub_panel_indent') ?>" value="<?php echo $this->get_value('flyout_sub_panel_indent') ?>"><span class="unit">px</span>
                    </label>
                </td>
            </tr>
            <tr class="heading-row cmm4e-toggle-field">
                <th scope="row" class="heading">
					<?php _e( 'Toggle Button', 'clever-mega-menu-for-elementor' ) ?>
                </th>
            </tr>
            <tr class="cmm4e-toggle-field">
                <td class="row-label"><?php esc_html_e('Hidden') ?></td>
                <td>
                    <label>
                        <input id="cmm4e-disable-mobile-menu-toggle" type="checkbox"
                               name="<?php echo $this->get_field( 'mobile_menu_disable_toggle' ) ?>"
                               value="1"<?php checked( $this->get_value( 'mobile_menu_disable_toggle' ) ) ?>>
                        <span class="description"><?php _e( 'Made your own toggle? Hide this one.', 'clever-mega-menu-for-elementor' ) ?>
                        </span>
                    </label>
                </td>
            </tr>
            <tr id="cmm4e-mobile-toggle-trigger" class="cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Toggle Button Trigger', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <input type="text" name="<?php echo $this->get_field( 'mobile_menu_toggle_button_trigger' ) ?>"
                           value="<?php echo $this->get_value( 'mobile_menu_toggle_button_trigger' ) ?>">
                    <p class="description"><?php _e( 'The CSS selector of an unique toggle button which will trigger the mobile menu on touchstart.', 'clever-mega-menu-for-elementor' ) ?></p>
                </td>
            </tr>
            <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Icons', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Open', 'clever-mega-menu-for-elementor' ) ?></p>
                        <i class="clever-mega-menu-icon <?php echo $this->get_value( 'mobile_menu_open_icon' ) ?>"></i>
                        <div class="clever-mega-menu-icons clever-mega-menu-mobile-icons" style="display:none">
                            <span class="fa fa-navicon"></span>
                            <span class="cs-font clever-icon-menu-5"></span>
                        </div>
                        <input type="hidden" name="<?php echo $this->get_field('mobile_menu_open_icon') ?>"
                               value="<?php echo $this->get_value('mobile_menu_open_icon') ?>">
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Close', 'clever-mega-menu-for-elementor' ) ?></p>
                        <i class="clever-mega-menu-icon <?php echo $this->get_value( 'mobile_menu_close_icon' ) ?>"></i>
                        <div class="clever-mega-menu-icons clever-mega-menu-mobile-icons" style="display:none">
                            <span class="fa fa-close"></span>
                            <span class="cs-font clever-icon-close-1"></span>
                        </div>
                        <input type="hidden" name="<?php echo $this->get_field('mobile_menu_close_icon') ?>"
                               value="<?php echo $this->get_value('mobile_menu_close_icon') ?>">
                    </label>
                </td>
            </tr>
            <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Icon Size', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field( 'mobile_toggle_size' ) ?>"
                               value="<?php echo $this->get_value( 'mobile_toggle_size' ) ?>"><span class="unit">px</span>
                        <p class="description"><?php _e( 'Font size of toggle button', 'clever-mega-menu-for-elementor' ) ?></p>
                    </label>
                </td>
            </tr>
            <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mobile_toggle_color') ?>"
                               value="<?php echo $this->get_value('mobile_toggle_color') ?>">
                    </label>
                </td>
            </tr>
            <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Background Color', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="text" class="cmm4e-color-picker" data-alpha="true"
                               name="<?php echo $this->get_field('mobile_toggle_bg_color') ?>"
                               value="<?php echo $this->get_value('mobile_toggle_bg_color') ?>">
                    </label>
                </td>
            </tr>
            <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Button Label', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <input type="text" name="<?php echo $this->get_field( 'mobile_menu_toggle_text' ) ?>"
                           value="<?php echo $this->get_value( 'mobile_menu_toggle_text' ) ?>">
                    <p class="description"><?php _e( 'Show text for toggle button in mobile. Leave it empty will show the toggle icon only.', 'clever-mega-menu-for-elementor' ) ?></p>
                </td>
            </tr>
            <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Line Height', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field( 'mobile_toggle_line_height' ) ?>"
                               value="<?php echo $this->get_value( 'mobile_toggle_line_height' ) ?>"><span class="unit">px</span>
                        <p class="description"><?php _e( 'It may be easier to vertically align a toggle with line height rather than absolute positions.', 'clever-mega-menu-for-elementor' ) ?></p>
                    </label>
                </td>
            </tr>
            <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Padding', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_padding_top') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_padding_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_padding_right') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_padding_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_padding_bottom') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_padding_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_padding_left') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_padding_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
        <tr class="cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php esc_html_e('Align', 'clever-mega-menu-pro-for-elementor') ?></td>
                <td>
                    <label>
						<?php $selected = $this->get_value('mobile_menu_toggle_align', false); ?>
                        <select id="select-mobile_toggle_align" name="<?php echo $this->get_field('mobile_menu_toggle_align') ?>">
                            <option value="flex-start" <?php selected($selected, 'flex-start') ?>><?php esc_html_e('Left', 'clever-mega-menu-pro-for-elementor') ?></option>
                            <option value="center" <?php selected($selected, 'center') ?>><?php esc_html_e('Center', 'clever-mega-menu-pro-for-elementor') ?></option>
                            <option value="flex-end" <?php selected($selected, 'flex-end') ?>><?php esc_html_e('Right', 'clever-mega-menu-pro-for-elementor') ?></option>
                            <option value="custom" <?php selected($selected, 'custom') ?>><?php esc_html_e('Custom', 'clever-mega-menu-pro-for-elementor') ?></option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr id="mobile-toggle-position-row" class="last-row cmm4e-mobile-toggle-option-field cmm4e-toggle-field">
                <td class="row-label"><?php _e( 'Position', 'clever-mega-menu-for-elementor' ) ?></td>
                <td>
                    <label>
                        <p class="description"><?php _e( 'Top', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_position_top') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_position_top') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Right', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_position_right') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_position_right') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Bottom', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_position_bottom') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_position_bottom') ?>"><span
                                class="unit">px</span>
                    </label>
                    <label>
                        <p class="description"><?php _e( 'Left', 'clever-mega-menu-for-elementor' ) ?></p>
                        <input type="number" class="inline"
                               name="<?php echo $this->get_field('mobile_menu_toggle_position_left') ?>"
                               value="<?php echo $this->get_value('mobile_menu_toggle_position_left') ?>"><span
                                class="unit">px</span>
                    </label>
                </td>
            </tr>
        </table>
        <table id="cmm4e-custom-options" class="form-table clever-mega-menu-admin clever-mega-menu-theme-metabox"
               style="display:none">
        <tr>
            <td class="row-label"><?php _e( 'Custom CSS', 'clever-mega-menu-for-elementor' ) ?></td>
            <td>
                <p><?php _e('This feature is only available on Pro version!') ?></p>
            </td>
        </tr>
        <tr class="last-row">
            <td class="row-label"><?php _e( 'Custom Javascript', 'clever-mega-menu-for-elementor' ) ?></td>
            <td>
                <p><?php _e('This feature is only available on Pro version!') ?></p>
            </td>
        </tr>
        </table><?php
    }

    /**
     * Save metadata
     *
     * @internal    Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     *
     * @param    int $post_id
     */
    public function _save($post_id, WP_Post $post)
    {
        if (defined('XMLRPC_REQUEST') || defined('WP_IMPORTING')) {
            return;
        }

        if (defined('DOING_AJAX') && DOING_AJAX) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (! current_user_can('edit_post', $post_id) || wp_is_post_revision($post_id)) {
            return;
        }

        $meta = ! empty($_POST[ self::META_KEY ]) ? $this->sanitize($_POST[ self::META_KEY ]) : array();

        $meta = array_merge(self::$fields, $meta);

        if ($meta !== $this->values) {
            update_post_meta($post_id, self::META_KEY, $meta);
            $this->generate_css($meta, $post);
        }
    }

    /**
     * Delete generated css
     *
     * @internal    Used as a callback. PLEASE DO NOT RECALL THIS METHOD DIRECTLY!
     *
     * @see    https://developer.wordpress.org/reference/hooks/delete_post/
     */
    public function _delete($post_id)
    {
        $post = get_post($post_id);

        if ('cmm4e_menu_theme' !== $post->post_type) {
            return;
        }

        global $wp_filesystem;

        $upload_dir = wp_upload_dir();
        $save_dir   = $upload_dir['basedir'] . '/cmm4e/';
        $file_name  = $save_dir . 'cmm4e-menu-skin-' . $post->post_name . '.min.css';

        WP_Filesystem(false, $upload_dir['basedir'], true);

        if (file_exists($file_name)) {
            @unlink($file_name);
        }
    }

    /**
     * Generate CSS
     *
     * @param    array $meta
     */
    public function generate_css(array $meta, WP_Post $post)
    {
        global $wp_filesystem;

        if (empty($post->post_name) || 'publish' !== $post->post_status) {
            return;
        }

        $scss = $this->generate_scss($meta, $post);
        $scss_compiler = new LeafoScssCompiler();
        $scss_compiler->setFormatter('LeafoScssFormatterCompressed');

        try {
            $css = $scss_compiler->compile($scss);
        } catch (Exception $e) {
            throw new Exception(esc_html__('Failed to generate menu skin.', 'clever-mega-menu-for-elementor') . ' ' . $e->getMessage());
        }

        if (! empty($meta['custom_css'])) {
            $css .= stripslashes($meta['custom_css']);
        }

        $upload_dir = wp_upload_dir();
        $save_dir   = $upload_dir['basedir'] . '/cmm4e/';
        $file_name  = $save_dir . 'cmm4e-menu-skin-' . $post->post_name . '.min.css';

        WP_Filesystem(false, $upload_dir['basedir'], true);

        if (! $wp_filesystem->is_dir($save_dir)) {
            $wp_filesystem->mkdir($save_dir);
        }

        if (! $wp_filesystem->put_contents($file_name, $css)) {
            throw new Exception(esc_html__('Failed to generate menu skin. Unable to write out CSS output.', 'clever-mega-menu-for-elementor'));
        }
    }

    /**
     * Generate SCSS
     *
     * @param    array $meta
     *
     * @return    string    $scss
     */
    private function generate_scss(array $meta, WP_Post $post)
    {
        $meta   = array_merge(self::$fields, $meta);

        $scss = "
        .cmm4e-off-canvas-mask {
            background-color: rgba(0,0,0,.5);
            bottom: 0;
            left: 0;
            opacity: 0;
            position: fixed;
            right: 0;
            top: 0;
            transform: translateZ(0);
            transition: opacity .3s linear;
            visibility: hidden;
            cursor: url(\"data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 18 18' fill='%23fff'%3e%3cpath d='M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z'/%3e%3c/svg%3e\"), pointer;
        }
        .cmm4e-item-toggle{
            cursor:pointer
        }
        .cmm4e-toggle-wrapper {
            display: none;
            .toggle-icon-close {
                display: none;
            }
            .cmm4e-toggle {
                line-height: 1;
                text-align: center;
                display: inline-block;
                margin: 0;
                padding: 0;
                border: none;
                outline: none;
                &:hover {
                    cursor: pointer;
                }
            }
        }
        .cmm4e-wrapper-theme-{$post->post_name} .cmm4e-toggle{
            color: {$meta['mobile_toggle_color']};
            background: {$meta['mobile_toggle_bg_color']};
            font-size:{$meta['mobile_toggle_size']}px
        }
        .menu-item-icon{
            margin-right: 5px;
        }
        .cmm4e-container {
            display: flex !important;
            align-items:center;
            height:100%;
            width: 100%;
        }
        .cmm4e{
            .cmm4e-nav-link{
            position:relative}
            .menu-item-arrow{
                vertical-align: baseline;
                position: static;
            }
            .menu-item-badge {
                display: inline-block;
                font-size: 70%;
                text-transform: uppercase;
                padding: 3px;
                transform:translate(5px, -50%);
            }
            .cmm4e-menu-item {
                .menu,
                .sub-menu {
                    opacity: 1 !important;
                    background: none !important;
                }
                .cmm4e-sub-wrapper {
                    position: static;
                    width: 100%;
                    visibility:inherit !important;
                }
            }
             .cmm4e-sub-wrapper {
                    .cmm4e-sub-container {
                        left: calc(100% + {$meta['flyout_padding_right']}px);
                    }
                }
            >.cmm4e-menu-item>{
                .cmm4e-sub-panel {
                    left:0
                }
            }
        }
        .cmm4e-mega{
            &> .cmm4e-sub-container {
                display: none !important;
            }
        }
        .cmm4e.cmm4e-theme-{$post->post_name} {
                list-style: none;
                display: flex;
                position: relative;
                /** GENERAL  */
                color: {$meta['general_text_color']};
    			font-size: {$meta['general_font_size']}px;
                font-weight: {$meta['general_font_weight']};
                line-height: {$meta['general_line_height']};
                letter-spacing: {$meta['general_letter_spacing']};
    			text-transform: {$meta['general_text_transform']};

                /** MENUBAR */
                margin: {$meta['menubar_margin_top']}px {$meta['menubar_margin_right']}px {$meta['menubar_margin_bottom']}px {$meta['menubar_margin_left']}px;
    			padding: {$meta['menubar_padding_top']}px {$meta['menubar_padding_right']}px {$meta['menubar_padding_bottom']}px {$meta['menubar_padding_left']}px;
                border-width: {$meta['menubar_border_top']}px {$meta['menubar_border_right']}px {$meta['menubar_border_bottom']}px {$meta['menubar_border_left']}px;
                border-style: {$meta['menubar_border_style']};
                border-color: {$meta['menubar_border_color']};
    			border-radius: {$meta['menubar_border_radius_top_left']}px {$meta['menubar_border_radius_top_right']}px {$meta['menubar_border_radius_bottom_right']}px {$meta['menubar_border_radius_bottom_left']}px;
                background: linear-gradient({$meta['menubar_bg_gradient_direction']}, {$meta['menubar_bg_from_color']}, {$meta['menubar_bg_to_color']});

                /** COMMON MENU LIST ITEMS */
                .cmm4e-menu-item {
                    margin: 0;
                    padding: 0;
                    border: none;
                    display: flex;
                    height:100%;
                    align-items:center;
                    list-style: none;
                    &.menu-item-has-children{
                        position: relative;
                    }
                    .menu-item-arrow{
                        width:25px;
                        height:100%;
                        display:flex;
                        justify-content:center;
                        align-items:center;
                    }
                    .cmm4e-nav-link {
                        display: block;
                        text-decoration: none;
                        color: {$meta['general_link_color']};
                        width: 100%;
                        max-width: 100%;
                        white-space: nowrap;
                        padding:0;
                        margin:0;
                        &:hover,
                        &:active {
                            color: {$meta['general_link_hover_color']};
                            background:none !important;
                        }
                        &:before,
                        &:after {
                            display: none;
                        }
                    }
                    &.menu-item-has-children {
                        .cmm4e-item-toggle {
                            display: none;
                            position: absolute;
                            top: 0;
                            right: -20px;
                            line-height: {$meta['mobile_top_item_height']}px;
                            transition: all ease-in .3s;
                            padding: 0 20px;
                            z-index: 9;
                        }
                        .cmm4e-sub-panel {
        				    text-align: left;
        				    position: absolute;
        					top: 0;
              				z-index: 9;
                            visibility: hidden;
                            opacity: 0;
                            transition: all .2s ease-in;
        				}
                        .menu,
                        .sub-menu {
                            margin: 0;
                            padding: 0;
                            float: none;
                            border: none;
                        }
                        &:hover {
                            > .cmm4e-sub-panel {
                                visibility: visible;
                                opacity: 1;
                                z-index: 9;
                            }
                        }
                    }
                }

                /** Top Menu Items */
                > .cmm4e-menu-item {
                    border-width: {$meta['menubar_item_border_top']}px {$meta['menubar_item_border_right']}px {$meta['menubar_item_border_bottom']}px {$meta['menubar_item_border_left']}px;
                    border-style: {$meta['menubar_item_border_style']};
                    border-color: {$meta['menubar_item_border_color']};
                    margin: {$meta['menubar_item_margin_top']}px {$meta['menubar_item_margin_right']}px {$meta['menubar_item_margin_bottom']}px {$meta['menubar_item_margin_left']}px;
                    padding: {$meta['menubar_item_padding_top']}px {$meta['menubar_item_padding_right']}px {$meta['menubar_item_padding_bottom']}px {$meta['menubar_item_padding_left']}px;
                    background-color: {$meta['menubar_item_bg_color']};";
        if ($meta['menubar_item_border_last_child'] === '1') {
            $scss .= "&:last-child {
                            border-width: 0px;
                        }";
        }
        $scss .="
                    &:hover,
                    &.cmm4e-current-menu-item {
                        border-color: {$meta['menubar_item_border_hover_color']};
                        border-style: {$meta['menubar_item_border_hover_style']};
                        background-color: {$meta['menubar_item_bg_hover_color']};
                        &> {
                            .cmm4e-nav-link {
                                line-height:inherit;
                            }
                             .cmm4e-nav-link,.menu-item-arrow, .cmm4e-item-toggle{
                                color: {$meta['menubar_item_text_hover_color']};
                             }
                         }
                    }
                    > .cmm4e-nav-link{
                        font-weight: {$meta['menubar_item_text_font_weight']};
                        text-transform: {$meta['menubar_item_text_transform']};
                        letter-spacing: {$meta['menubar_item_text_letter_spacing']};
                    }
                    > .cmm4e-nav-link, >.menu-item-arrow, .cmm4e-item-toggle{
                        color: {$meta['menubar_item_text_color']};
                        font-size: {$meta['menubar_item_text_font_size']}px;
                    }
                    .cmm4e-content-container {
                        max-width:100vw;
                        padding: {$meta['mega_panel_padding_top']}px {$meta['mega_panel_padding_right']}px {$meta['mega_panel_padding_bottom']}px {$meta['mega_panel_padding_left']}px;
                        border-width: {$meta['mega_panel_border_top']}px {$meta['mega_panel_border_right']}px {$meta['mega_panel_border_bottom']}px {$meta['mega_panel_border_left']}px;
                        border-style: {$meta['mega_panel_border_style']};
                        border-color: {$meta['mega_panel_border_color']};
                        border-radius: {$meta['mega_panel_border_radius_top_left']}px {$meta['mega_panel_border_radius_top_right']}px {$meta['mega_panel_border_radius_bottom_right']}px {$meta['mega_panel_border_radius_bottom_left']}px;
                        box-shadow: {$meta['mega_panel_h_shadow']}px {$meta['mega_panel_v_shadow']}px {$meta['mega_panel_blur_shadow']}px {$meta['mega_panel_spread_shadow']}px {$meta['mega_panel_shadow_color']};
                        background: linear-gradient({$meta['mega_panel_bg_gradient_direction']}, {$meta['mega_panel_bg_from_color']}, {$meta['mega_panel_bg_to_color']});
                    }
                }
                    .cmm4e-sub-container {
                        min-width: max-content;
                        padding: {$meta['flyout_padding_top']}px {$meta['flyout_padding_right']}px {$meta['flyout_padding_bottom']}px {$meta['flyout_padding_left']}px;
                        border-width: {$meta['flyout_border_top']}px {$meta['flyout_border_right']}px {$meta['flyout_border_bottom']}px {$meta['flyout_border_left']}px;
                        border-style: {$meta['flyout_border_style']};
                        border-color: {$meta['flyout_border_color']};
                        border-radius: {$meta['flyout_border_radius_top_left']}px {$meta['flyout_border_radius_top_right']}px {$meta['flyout_border_radius_bottom_right']}px {$meta['flyout_border_radius_bottom_left']}px;
                        box-shadow: {$meta['flyout_menu_h_shadow']}px {$meta['flyout_menu_v_shadow']}px {$meta['flyout_menu_blur_shadow']}px {$meta['flyout_menu_spread_shadow']}px {$meta['flyout_menu_color_shadow']};
                        background: linear-gradient({$meta['flyout_bg_gradient_direction']}, {$meta['flyout_bg_from_color']}, {$meta['flyout_bg_to_color']});
                            .cmm4e-menu-item{
        						padding: {$meta['flyout_item_padding_top']}px {$meta['flyout_item_padding_right']}px {$meta['flyout_item_padding_bottom']}px {$meta['flyout_item_padding_left']}px;
                                border-width: {$meta['flyout_item_border_top']}px {$meta['flyout_item_border_right']}px {$meta['flyout_item_border_bottom']}px {$meta['flyout_item_border_left']}px;
                                border-style: {$meta['flyout_item_border_style']};
                                border-color: {$meta['flyout_item_border_color']};
                                font-size: {$meta['flyout_item_text_font_size']}px;
                                font-weight: {$meta['flyout_item_text_font_weight']};
                                letter-spacing: {$meta['flyout_item_text_letter_spacing']};
                                text-transform: {$meta['flyout_item_text_transform']};
                                background-color: {$meta['flyout_item_bg_color']};
                                &>.cmm4e-nav-link{
                                    line-height: {$meta['flyout_item_text_line_height']};
                                }
                                &>.cmm4e-nav-link, &>.menu-item-arrow, &>.cmm4e-item-toggle{
                                    color: {$meta['flyout_item_text_color']};
                                }
                                &:hover {
                                    border-style: {$meta['flyout_item_border_hover_style']};
                                    border-color: {$meta['flyout_item_border_hover_color']};
                                    background-color: {$meta['flyout_item_bg_hover_color']};
                                    &>.cmm4e-nav-link, &>.menu-item-arrow, &>.cmm4e-item-toggle{
                                        color: {$meta['flyout_item_text_hover_color']};
                                    }
                                }
                            }";
        if ($meta['flyout_item_border_last_child'] === '1') {
            $scss .= ".cmm4e-menu-item:last-child{
                                        border-width: 0px;
                                }";
        }

        $scss .= ".menu-item-arrow{margin-right: -5px;}
                    }

                /** ELEMENTOR */
    	      	.elementor {
                    .elementor-row {
                        z-index: 1;
                        position: relative;
                        }
                }
                .elementor-widget {
                    &.elementor-widget-wp-widget-nav_menu {
                        h5 {
                            /* bla */
                            line-height: {$meta['mega_panel_heading_line_height']};
                            font-size: {$meta['mega_panel_heading_font_size']}px;
                            font-weight: {$meta['mega_panel_heading_font_weight']};
                            color: {$meta['mega_panel_heading_color']};
                            text-transform: {$meta['mega_panel_heading_style']};
                            letter-spacing: {$meta['mega_panel_heading_letter_spacing']};
                            padding: {$meta['mega_panel_heading_padding_top']}px {$meta['mega_panel_heading_padding_right']}px {$meta['mega_panel_heading_padding_bottom']}px {$meta['mega_panel_heading_padding_left']}px;
                            margin: {$meta['mega_panel_heading_margin_top']}px {$meta['mega_panel_heading_margin_right']}px {$meta['mega_panel_heading_margin_bottom']}px {$meta['mega_panel_heading_margin_left']}px;
                            border-radius: {$meta['mega_panel_heading_border_radius_top_left']}px {$meta['mega_panel_heading_border_radius_top_right']}px {$meta['mega_panel_heading_border_radius_bottom_right']}px {$meta['mega_panel_heading_border_radius_bottom_left']}px;
                            border-width: {$meta['mega_panel_heading_border_top']}px {$meta['mega_panel_heading_border_right']}px {$meta['mega_panel_heading_border_bottom']}px {$meta['mega_panel_heading_border_left']}px;
                            border-style: {$meta['mega_panel_heading_border_style']};
                            border-color: {$meta['mega_panel_heading_border_color']};
                        }
                        .menu-item{
                            position:relative;
                            width:100%;
                            list-style:none;
                            padding: {$meta['mega_panel_item_padding_top']}px {$meta['mega_panel_item_padding_right']}px {$meta['mega_panel_item_padding_bottom']}px {$meta['mega_panel_item_padding_left']}px;
                            border-width: {$meta['mega_panel_item_border_top']}px {$meta['mega_panel_item_border_right']}px {$meta['mega_panel_item_border_bottom']}px {$meta['mega_panel_item_border_left']}px;
                            border-style: {$meta['mega_panel_item_border_style']};
                            border-color: {$meta['mega_panel_item_border_color']};
                            font-size: {$meta['mega_panel_item_text_font_size']}px;
                            font-weight: {$meta['mega_panel_item_text_font_weight']};
                            letter-spacing: {$meta['mega_panel_item_text_letter_spacing']};
                            line-height: {$meta['mega_panel_item_text_line_height']};
                            text-transform: {$meta['mega_panel_item_text_transform']};
                            background-color: {$meta['mega_panel_item_bg_color']};
                            &:hover {
                                color: {$meta['mega_panel_item_text_hover_color']};
                                border-style: {$meta['mega_panel_item_border_hover_style']};
                                border-color: {$meta['mega_panel_item_border_hover_color']};
                                background-color: {$meta['mega_panel_item_bg_hover_color']};
                                &>a{
                                    color: {$meta['mega_panel_item_text_hover_color']};
                                }
                            }
                            & > a{
                                color: {$meta['mega_panel_item_text_color']};
                            }
                        }
                        .menu {
                            display: block;
                            list-style: none;
                            position: static;
                            .sub-menu{
                                width:100%;
                            }
                            a {
                                display: block;
                                text-decoration: none;
                                font-weight: {$meta['mega_panel_item_text_font_weight']};
                            }";
        if ($meta['mega_panel_item_border_last_child'] === '1') {
            $scss .= "
                            .menu-item:last-child {
                                 border-width: 0px;
                            }";
        }
        $scss .= "
                        }
                    }
                    table {
                        table-layout: fixed;
                        width: 100%;
                        margin: 0;
                        th {
                            padding: 1em;
                            text-align: center;
                        }
                        td {
                            padding: 1em;
                            vertical-align: baseline;
                            text-align: center;
                            white-space: nowrap;
                            a, &#today {
                                color: {$meta['general_link_color']};
                                font-weight: bolder;
                                &:hover {
                                    color: {$meta['general_link_hover_color']};
                                }
                            }
                            &#prev {
                                text-align: left;
                                text-transform: uppercase;
                            }
                        }
                    }
                }
                /** Horizontal Menubar */
                &.cmm4e-horizontal {
                    width:100%;
                    flex-wrap: nowrap;
                    > .cmm4e-menu-item {
                        > .cmm4e-content-container {
                            left: 0;
                            width: 100%;
                        }
                    }
                    &.cmm4e-horizontal-align-center {
                        justify-content: center;
                    }
                    &.cmm4e-horizontal-align-right {
                        justify-content: flex-end;
                    }
                    &.cmm4e-horizontal-space-around {
                        justify-content: space-around;
                    }
                    &.cmm4e-horizontal-space-between {
                        justify-content: space-between;
                    }
                }
                /** Vertical Menubar */
                &.cmm4e-vertical {
                    width: {$meta['menubar_vertical_width']}px;
                    flex-direction: column;
                    .menu-item-arrow {
                        margin-right: -5px;
                    }
                    > .cmm4e-menu-item {
                        > .cmm4e-nav-link {
                            height: auto;
                            line-height: inherit;
                            .menu-item-arrow {
                                float: right;
                                line-height: inherit !important;
                            }
                        }
                    }
                }


                /** FADE-IN-UP ANIMATION ONLY */
                &.cmm4e-menu-fade-up {
                    .cmm4e-sub-container {
                        top: calc(100% - 20px) !important;
                    }
                    .cmm4e-menu-item{
                        &:hover {
                            > .cmm4e-sub-container {
                                top: 0 !important;
                            }
                        }
                    }

                    > .cmm4e-menu-item {
                        > .cmm4e-sub-panel {
                            top: calc(100% + 20px) !important;
                        }
                        > .cmm4e-sub-container {
                            left: -{$meta['menubar_item_margin_left']}px;
                        }
                        &:hover {
                            > .cmm4e-sub-panel {
                                top: 100% !important;
                            }
                        }
                    }
                    &.cmm4e-vertical {
                        .cmm4e-menu-item {
                            &.menu-item-has-children {
                                &.cmm4e-mega {
                                    position:relative;
                                }
                                .cmm4e-sub-panel {
                                    left: 100% !important;
                                    top: 20px !important;
                                    .cmm4e-sub-container {
                                        left: calc(100% + {$meta['flyout_padding_right']}px) !important;
                                    }
                                }
                                &:hover{
                                    > {
                                        .cmm4e-sub-panel {
                                            top: 0 !important;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        @media (min-width: {$meta['general_mobile_breakpoint']}px) {
            .cmm4e.cmm4e-theme-{$post->post_name}{

                .elementor-widget.elementor-widget-wp-widget-nav_menu .menu .sub-menu{
                    left:100%;
                    top:0;
                    position:absolute;
                }
                &.cmm4e-horizontal {
                    height: {$meta['menubar_menu_height']}px;
                     >.cmm4e-menu-item>.cmm4e-nav-link>.menu-item-badge{
                        position: absolute;
                        bottom: 100%;
                        left: 100%;transform:translateX(-25%);
                    }
                    .cmm4e-mega{
                            position:static !important;
                    }
                    .elementor-widget.elementor-widget-wp-widget-nav_menu .menu .sub-menu{
                        opacity:0;
                        visibility:hidden;
                    }
                    .elementor-widget.elementor-widget-wp-widget-nav_menu .menu .menu-item:hover> .sub-menu{
                        opacity:1;
                        z-index:9;
                        visibility:visible
                    }
                }
             }
        }
        @media (max-width: calc({$meta['general_mobile_breakpoint']}px - 0.02px)) {
            .cmm4e-container.cmm4e-active{
                .cmm4e-toggle {
                    .toggle-icon-close {
                        display: inline-block;
                    }
                    .toggle-icon-open {
                        display: none;
                    }
                }
                .cmm4e-off-canvas-mask{
                    visibility:visible;
                    opacity:1;
                    z-index:9
                }";
        if ('off-canvas' === $meta['mobile_menu_style']) {
            $scss .= ".cmm4e.cmm4e-theme-{$post->post_name} {";
            if ('left' === $meta['mobile_offcanvas_position']) {
                $scss .= "transform: translateX({$meta['mobile_canvas_width']}px);";
            } else {
                $scss .= "transform: translateX(-{$meta['mobile_canvas_width']}px);";
            }
            $scss .= "
                        }
                    ";
        }
        $scss .= "
            }
            .cmm4e-wrapper-theme-{$post->post_name}{
                .cmm4e-toggle-wrapper {
                    display: flex;
                    position: relative;
                    width: 100%;
                    max-width: 100%;
                    align-items: center;";
                    if ($meta['mobile_menu_toggle_align'] !== 'custom') {
                        $scss .= "justify-content:{$meta['mobile_menu_toggle_align']};";
                    }
                    $scss .= "
                    .cmm4e-toggle {";
                        if ($meta['mobile_menu_toggle_align'] === 'custom') {
                            $scss .= "position:absolute;top: {$meta['mobile_menu_toggle_position_top']}; right: {$meta['mobile_menu_toggle_position_right']};bottom: {$meta['mobile_menu_toggle_position_bottom']};left: {$meta['mobile_menu_toggle_position_left']};";
                        }
                        $scss .= "
                        padding: {$meta['mobile_menu_toggle_padding_top']}px {$meta['mobile_menu_toggle_padding_right']}px {$meta['mobile_menu_toggle_padding_bottom']}px {$meta['mobile_menu_toggle_padding_left']}px;
                        line-height: {$meta['mobile_toggle_line_height']}px;
                        &.toggled-on {
                            .toggle-icon-close {
                                display: inline-block;
                            }
                            .toggle-icon-open {
                                display: none;
                            }
                        }
                    }
                }
                &.cmm4e-container {
                    position: relative;";
        // if ('off-canvas' !== $meta['mobile_menu_style']) {
        //     $scss .= "margin-top: {$meta['mobile_menu_toggle_position_top']}px;";
        // }
        $scss .= "
                 }
            }
            .cmm4e.cmm4e-theme-{$post->post_name} {
                overflow: hidden;
                overflow-y:auto;
                background: none;
                background-color: {$meta['mobile_panel_bg_color']};
                padding: {$meta['mobile_panel_padding_top']}px {$meta['mobile_panel_padding_right']}px {$meta['mobile_panel_padding_bottom']}px {$meta['mobile_panel_padding_left']}px;";
        if ('slide-down' === $meta['mobile_menu_style']) {
            $scss .= ";display: none; width: 100vw; position: absolute; left: 0;top:100%;z-index:9;";
        } else {
            $scss .= "display: block;";
        }
        if ('off-canvas' === $meta['mobile_menu_style']) {
            $scss .= "
                    height: 100vh !important;
                    max-height: 100vh !important;
                    width: {$meta['mobile_canvas_width']}px !important;
                    max-width: calc(100vw - 50px);
                    position: fixed;
                    z-index:99;
                    top: 0;
                    transition: all ease-in .3s;";
            if ('left' === $meta['mobile_offcanvas_position']) {
                $scss .= "left: -{$meta['mobile_canvas_width']}px;";
            } else {
                $scss .= "right: -{$meta['mobile_canvas_width']}px;";
            }
        } else {
            $scss .= "transition: none;max-height:80vh;";
        }
        $scss .= "
                /** COMMON MENU ITEMS */
                .cmm4e-menu-item {
                    display: inline-block;
                    padding: 0;
                    position: relative !important;
                    width: 100%;
                    background: none;
                    height:auto;
                    margin:0;
                    &.menu-item-has-children {
                        .menu-item-arrow {
                            display: none;
                        }
                        .cmm4e-item-toggle {
                            display: block;
                        }
                        .cmm4e-sub-panel {
                            width: 100% !important;
                            min-width:0;
                            margin: 0;
                            padding: 0;
                            display: none;
                            position: static;
                            z-index: 9;
                            visibility: visible;
                            opacity: 1;
                            transition: none;
                            box-shadow: none;
                            .menu,
                            .sub-menu {
                                display: block;
                            }
                        }
                        > .cmm4e-content-container {
                            margin: 0;
                            padding: 1em 0;
                            box-shadow: none;
                        }
                        > .cmm4e-sub-container {
                            border:none;
                            .cmm4e-menu-item {
                                border-width: 1px 0 0 0 !important;
                                border-color: {$meta['mobile_menu_item_border_color']} !important;
                                border-style: {$meta['mobile_menu_item_border_style']} !important;
                                margin:0;
                                padding:0;
                            }
                            .cmm4e-nav-link {
                                display: flex;
                                align-items:center;
                                width: 100%;
                                height: {$meta['mobile_top_item_height']}px !important;
                                line-height: calc({$meta['mobile_top_item_height']}px - 16px) !important;
                            }
                            .cmm4e-sub-panel {
                                padding-right: 0;
                                padding-left: {$meta['flyout_sub_panel_indent']}px;
                            }
                        }
                        &.cmm4e-hide-sub-on-mobile {
                            > .cmm4e-sub-panel {
                                display: none !important;
                            }
                        }
                    }
                }

                /** TOP LEVEL ITEMS */
                > .cmm4e-menu-item {
                        border-width: 1px 0 0 0 !important;
                        border-color: {$meta['mobile_menu_item_border_color']} !important;
                        border-style: {$meta['mobile_menu_item_border_style']} !important;
                        &:first-child{
                        border:none !important}
                    > .cmm4e-nav-link {
                        padding: 0;
                        height: {$meta['mobile_top_item_height']}px !important;
                        line-height: {$meta['mobile_top_item_height']}px !important;
                    }
                }

                /** ELEMENTOR */
                .elementor {
                    .elementor-row {
                        .elementor-column {
                            width: 100%;
                            .elementor-column-wrap {
                                padding: 0;
                                .elementor-widget-wp-widget-nav_menu .menu .sub-menu{
                                    margin-left:15px
                                }
                                .elementor-widget {
                                    margin-bottom: 1em;
                                    &.elementor-widget-wp-widget-nav_menu {
                                        .menu,
                                        .sub-menu {
                                            li {
                                                display: block;
                                                margin: 0;
                                                padding: 0;
                                                width: 100%;
                                                border: none;
                                                background: none;
                                                a {
                                                    display: block;
                                                    width: 100%;
                                                    margin: 0;
                                                    padding: 8px 0;
                                                    background: none;
                                                    border: none;
                                                }
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }

                /** SLIDE-DOWN ANIMATION */
                &.cmm4e-mobile-animation-slide-down {
                    width:100vw;
                }
            }
        }
        /** RTL CSS **/
        .rtl{
			.menu-item-icon{
				margin-left: 5px;
				margin-right: 0;
			}
			.cmm4e .cmm4e-sub-container {
				right: calc(100% + {$meta['flyout_padding_left']}px);
				left: auto;
			}
			.cmm4e.cmm4e-menu-fade-up >.cmm4e-menu-item {
                >.cmm4e-sub-panel {
                    right: 0;
					left:auto;
                }
                > .cmm4e-sub-container {
                    right: -{$meta['menubar_item_margin_right']}px !important;
                }

            }
            .cmm4e .menu-item-badge {
                transform: translate(-5px, -50%);
            }
			.cmm4e.cmm4e-theme-{$post->post_name} {
					/** COMMON MENU LIST ITEMS */
					.cmm4e-menu-item {
					    text-align:right;
						&.menu-item-has-children {
							.cmm4e-item-toggle {
								left: -20px;
								right: auto;
							}
						}
					}
					.cmm4e-sub-container {
						.menu-item-arrow{
							margin-left: -5px;
							margin-right: 0;
						}
					}
					/** Vertical Menubar */
					&.cmm4e-vertical {
						.menu-item-arrow {
							margin-left: -5px;
							margin-right: 0;
						}
						> .cmm4e-menu-item {
							> .cmm4e-nav-link {
								.menu-item-arrow {
								float: left;
								}
							}
						}
						 .cmm4e-menu-item.menu-item-has-children{
                             .cmm4e-sub-panel {
                                 left: auto;
                                 right: 100% !important;
                                 .cmm4e-sub-container {
                                     right: calc(100% + {$meta['flyout_padding_left']}px) !important;
                                 }
                             }
						 }
					}
					.elementor-widget.elementor-widget-wp-widget-nav_menu{
					    text-align:right;
                        .menu .sub-menu{
                            left:auto;
                            right:100%
                        }
                    }
			}
		}
        @media (min-width: {$meta['general_mobile_breakpoint']}px) {
            .rtl .cmm4e.cmm4e-theme-{$post->post_name}.cmm4e-horizontal {
                >.cmm4e-menu-item>.cmm4e-nav-link>.menu-item-badge{
                    right: 100%;
                    transform:translateX(25%);
                    left:auto;
                }
            }
            .rtl .cmm4e.cmm4e-theme-{$post->post_name}.cmm4e-horizontal > .cmm4e-menu-item.cmm4e-mega > .cmm4e-content-container{
                left:auto;
                right: 50%;
                transform: translateX(50%);
			}
        }
        @media (max-width: calc({$meta['general_mobile_breakpoint']}px - 0.02px)) {
            .rtl .cmm4e.cmm4e-theme-{$post->post_name} {
                /** COMMON MENU ITEMS */
                .cmm4e-menu-item {
                    &.menu-item-has-children {
                        .cmm4e-sub-panel {
							padding-left:0;
							padding-right: {$meta['flyout_sub_panel_indent']}px;
                        }
                    }
                }
            }
        }
        ";

        return $scss;
    }

    /**
     * Sanitize metadata
     *
     * @param    array    Raw metadata.
     *
     * @return    array    Sanitized metadata.
     */
    private function sanitize($meta)
    {
        $meta['general_letter_spacing']              = isset($meta['general_letter_spacing']) ? $this->get_letter_spacing_value($meta['general_letter_spacing']) : 'normal';
        $meta['menubar_item_text_letter_spacing']    = isset($meta['menubar_item_text_letter_spacing']) ? $this->get_letter_spacing_value($meta['menubar_item_text_letter_spacing']) : 'normal';
        $meta['flyout_item_text_letter_spacing']     = isset($meta['flyout_item_text_letter_spacing']) ? $this->get_letter_spacing_value($meta['flyout_item_text_letter_spacing']) : 'normal';
        $meta['mega_panel_item_text_letter_spacing'] = isset($meta['mega_panel_item_text_letter_spacing']) ? $this->get_letter_spacing_value($meta['mega_panel_item_text_letter_spacing']) : 'normal';
        $meta['mega_panel_heading_letter_spacing']   = isset($meta['mega_panel_heading_letter_spacing']) ? $this->get_letter_spacing_value($meta['mega_panel_heading_letter_spacing']) : 'normal';
        $meta['mobile_menu_toggle_text']             = isset($meta['mobile_menu_toggle_text']) ? $meta['mobile_menu_toggle_text'] : '';
        $meta['mobile_menu_disable_toggle']          = isset($meta['mobile_menu_disable_toggle']) ? $meta['mobile_menu_disable_toggle'] : 0;
        $meta['mobile_menu_toggle_position_top'] = is_numeric($meta['mobile_menu_toggle_position_top']) ? intval($meta['mobile_menu_toggle_position_top']) . 'px' : 'auto';
        $meta['mobile_menu_toggle_position_right'] = is_numeric($meta['mobile_menu_toggle_position_right']) ? intval($meta['mobile_menu_toggle_position_right']) . 'px' : 'auto';
        $meta['mobile_menu_toggle_position_bottom'] = is_numeric($meta['mobile_menu_toggle_position_bottom']) ? intval($meta['mobile_menu_toggle_position_bottom']) . 'px' : 'auto';
        $meta['mobile_menu_toggle_position_left'] = is_numeric($meta['mobile_menu_toggle_position_left']) ? intval($meta['mobile_menu_toggle_position_left']) . 'px' : 'auto';
        $meta['menubar_item_border_last_child']      = isset($meta['menubar_item_border_last_child']) ? $meta['menubar_item_border_last_child'] : 0;
        $meta['flyout_item_border_last_child']       = isset($meta['flyout_item_border_last_child']) ? $meta['flyout_item_border_last_child'] : 0;
        $meta['mega_panel_item_border_last_child']   = isset($meta['mega_panel_item_border_last_child']) ? $meta['mega_panel_item_border_last_child'] : 0;

        foreach ($meta as $key => $value) {
            if ('' !== $value && null !== $value) {
                // $meta[$key] = sanitize_text_field($value);
            } else {
                $meta[ $key ] = self::$fields[ $key ];
            }
        }

        return $meta;
    }

    /**
     * Get field ID
     *
     * @param    string $name Field name.
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
     * @param    string $name Field name.
     *
     * @return    mixed    $value    Field's value.
     */
    private function get_value($name)
    {
        return isset($this->values[ $name ]) ? $this->values[ $name ] : self::$fields[ $name ];
    }

    /**
     * Get letter spacing value
     */
    private function get_letter_spacing_value($value)
    {
        if (! $value) {
            return 'normal';
        }

        $value = strtolower($value);

        if (is_numeric($value)) {
            return $value . 'px';
        }

        return $value;
    }
}

MenuThemeMeta::init();
