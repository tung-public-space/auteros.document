<?php namespace CleverSoft\WpPlugin\Cmm4E;

use WP_Post;
use Walker_Nav_Menu;
use Elementor\Plugin as Elementor;

/**
 * MegaMenuWalker
 */
final class MegaMenuWalker extends Walker_Nav_Menu
{
    /**
     * Menu settings
     *
     * @var    array
     */
    private $settings;

    /**
     * Menu skin settings
     *
     * @var    array
     */
    private $skin_settings;

    /**
     * Current parsing item's settings
     *
     * @param object \WP_Post
     */
    private $current_item_settings;

    /**
     * Constructor
     */
    public function __construct(array $menu_settings, array $skin_settings)
    {
        $this->is_rtl = is_rtl();
        $this->is_mobile = wp_is_mobile();
        $this->menu_settings = $menu_settings;
        $this->skin_settings = $skin_settings;
        $this->isElementorPreview = Elementor::$instance->preview->is_preview_mode();
    }

    /**
     * Starts the list before the elements are added.
     *
     * @see \Walker::start_lvl()
     */
    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        $style = ' style="width: 260px"';

        if ($this->has_children && 'yes' !== $this->current_item_settings['enable_mega']) {
            if (!$this->is_mobile && !empty($this->current_item_settings['flyout_panel_width'])) {
                $style = ' style="width:' . esc_attr($this->current_item_settings['flyout_panel_width']['size']) . esc_attr($this->current_item_settings['flyout_panel_width']['unit']) . '"';
            }
        }
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='cmm4e-sub-panel cmm4e-sub-container'" . $style . "><ul class=\"sub-menu cmm4e-sub-wrapper\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @see \Walker::end_lvl()
     */
    public function end_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    /**
     * Start the element output.
     *
     * @see \Walker::start_el()
     */
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $atts = [];
        $args = (array)$args;
        $content = $this->getItemContent($item->ID);
        $this->current_item_settings = $settings = $this->getItemSettings($item->ID);

        if ($settings['hide_on_mobile'] && $this->is_mobile && !$this->isElementorPreview) {
            return;
        }

        if ($settings['hide_on_desktop'] && !$this->is_mobile && !$this->isElementorPreview) {
            return;
        }

        $indent  = $depth ? str_repeat("\t", $depth) : '';
        $classes = ['cmm4e-menu-item'];
        $default_classes = (array)$item->classes;
        $class_hide_sub = '';

        if ('yes' === $settings['hide_on_mobile']) {
            $classes[] = 'cmm4e-hide-on-mobile';
        }

        if ('yes' === $settings['hide_on_desktop']) {
            $classes[] = 'cmm4e-hide-on-desktop';
        }

        if ($this->has_children) {
            $classes[] = 'menu-item-has-children';
            if ('yes' === $settings['hide_sub_on_mobile']) {
                $classes[] = 'cmm4e-hide-sub-on-mobile';
            }
        }

        if ($content && ('yes' === $settings['enable_mega'])) {
            $atts['aria-haspopup'] = 'true';
        }

        if (in_array('current-menu-item', $default_classes)) {
            $classes[] = 'cmm4e-current-menu-item';
        }

        $classes[] = 'cmm4e-item-depth-'.$depth;
        $classes[] = join(' ', $this->getItemHtmlClasses($settings));

        $html_classes = join(' ', array_filter($classes));
        $html_classes = ($content && ('yes' === $settings['enable_mega'])) ? $html_classes . ' menu-item-has-children cmm4e-item-has-content' . $class_hide_sub : $html_classes;

        $output .= $indent.'<li id="cmm4e-menu-item-' . esc_attr($item->ID) . '" class="' . esc_attr($html_classes) . '">';

        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        if ($settings['disable_link']) {
            unset($atts['href']);
        }

        $attributes = '';

        if (!isset($atts['class'])) {
            $atts['class'] = '';
        }

        foreach ($atts as $attr => $value) {
            if ($attr === 'class') {
                if (!empty($value)) {
                    $value .= ' cmm4e-nav-link';
                } else {
                    $value .= 'cmm4e-nav-link';
                }
            }
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $se_markup = $this->menu_settings['current_menu_options']['se_markup'];
        $item_output = isset($args['before']) ? $args['before'] : '';
        $item_output .= $settings['disable_link'] ? '<span'. $attributes .'>' : '<a'. $attributes;

        if (!$settings['disable_link']) {
            $item_output .= $se_markup ? ' itemprop="url">' : '>';
        }

        $item_output .= $this->getIcon($settings);

        if (!$settings['hide_title']) {
            $item_output .= '<span class="cmm4e-item-label"';
            $item_output .= ($se_markup && !$settings['disable_link']) ? ' itemprop="name">' : '>';
            $item_output .= $item->title;
            $item_output .='</span>';
        }

        $item_output .= $settings['disable_link'] ? '</span>' : '</a>';
	    if (($this->has_children || 'yes' === $settings['enable_mega']) && !$this->is_mobile) {
		    if ($depth > 0) {
			    $arrow_icon = $this->is_rtl ? $this->skin_settings['general_arrow_left'] : $this->skin_settings['general_arrow_right'];
		    } else {
			    $arrow_icon = $this->skin_settings['general_arrow_down'];
		    }
		    $item_output .= '<span role="presentation" class="menu-item-arrow ' . esc_attr($arrow_icon) . '"></span>';
	    }
        $item_output .= isset($args['after']) ? $args['after'] : '';

        if ($content && ('yes' === $settings['enable_mega'])) {
            $mega_style = !$this->is_mobile ? 'width:' . $settings['mega_panel_width']['size'] . $settings['mega_panel_width']['unit'] . ';' : '';
            $item_output .= '<div class="cmm4e-sub-panel cmm4e-content-container" style="' . esc_attr($mega_style) . '">';
            $item_output .= sprintf('<div class="cmm4e-content-wrapper">%s</div>', $content);
            $item_output .= '</div>';
        }

        $output .= apply_filters('cmm4e_walker_start_el', $item_output, $item, $depth, $args, $settings);
    }

    /**
     * Ends the element output, if needed.
     *
     * @see \Walker::end_el()
     */
    public function end_el(&$output, $item, $depth = 0, $args = [])
    {
        $output .= "</li>\n";
    }

    /**
     * Get item settings
     *
     * @param    int    $id    Item's ID.
     *
     * @return    array    $settings
     */
    private function getItemSettings($item_id)
    {
        $default = [
            'cmm4e_icon' => '',
            'enable_mega' => '',
            'hide_title' => '',
            'viewers' => ['role_anyone'],
            'disable_link' => '',
            'hide_on_mobile' => '',
            'hide_on_desktop' => '',
            'hide_sub_on_mobile' => '',
            'show_badge' => '',
            'mega_panel_width' => ['unit' => '%', 'size' => 100]
        ];

        $menu_item_id = intval(get_post_meta($item_id, 'cmm4e_menu_post_id', true));

        if ($menu_item_id) {
            $menu_item_settings = get_post_meta($menu_item_id, '_elementor_page_settings', true);
            return array_merge($default, (array)$menu_item_settings);
        }

        return $default;
    }

    /**
     * Get item settings
     *
     * @param    int    $id    Item's ID.
     *
     * @return    mixed    $content
     */
    private function getItemContent($item_id)
    {
        static $elementor = null;

        $menu_item_post_id = intval(get_post_meta($item_id, 'cmm4e_menu_post_id', true));

        if ($menu_item_post_id) {
            if (null === $elementor) {
                $elementor = Elementor::instance();
            }
            return $elementor->frontend->get_builder_content_for_display($menu_item_post_id);
        }

        return '';
    }

    /**
     * Build custom HTML classes
     *
     * @param    array    $settings    Item's settings.
     * @param    array    $classes     Default classes.
     *
     * @return    array    $classes    Custom HTML classes.
     */
    private function getItemHtmlClasses(array $settings, array $classes = [])
    {
        if ('yes' === $settings['enable_mega']) {
            $classes[] = 'cmm4e-mega';
        }

        if ($settings['cmm4e_icon']) {
            $classes[] = 'cmm4e-has-icon';
        }

        if ('yes' === $settings['hide_title']) {
            $classes[] = 'cmm4e-hide-title';
        }

        return $classes;
    }

    /**
     * Parse icon
     *
     * @param    array    $settings    Menu item's settings.
     *
     * @return    string    $icon    Parsed icon string.
     */
    private function getIcon(array $settings)
    {
        $icon = empty($settings['cmm4e_icon']) ? '' : trim($settings['cmm4e_icon']);

        if ($icon) {
            $icon = '<span class="menu-item-icon"><i class="'.esc_attr($icon).'"></i></span>';
        }

        return $icon;
    }
}
