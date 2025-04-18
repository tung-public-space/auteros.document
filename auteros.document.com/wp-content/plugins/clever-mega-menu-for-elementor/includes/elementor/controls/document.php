<?php namespace CleverSoft\WpPlugin\Cmm4E;

use Elementor\Scheme_Color;
use Elementor\Controls_Manager;

/**
 * Cmm4eMenuPostType
 */
final class Cmm4eDocument
{
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
            add_action('elementor/element/wp-post/document_settings/after_section_end', [$self, '_modGeneralSettings'], PHP_INT_MAX);
        }
    }

    /**
     * @internal  Used as a callback
     */
    function _modGeneralSettings($document)
    {
        $post = $document->get_post();

        if ('cmm4e_menu' !== $post->post_type) {
            return;
        }

        $viewers = ['pro_only' => __('Available on Pro version only!', 'clever-mega-menu-for-elementor')];

        $document->remove_control('post_title');

        remove_all_actions('elementor/documents/register_controls');

		$document->start_injection([
			'of' => 'post_status'
		]);

		$document->add_control(
			'enable_mega',
			[
				'label' => __( 'Mega Menu', 'clever-mega-menu-for-elementor' ),
				'type' => Controls_Manager::SWITCHER
			]
		);

		$document->add_control(
			'disable_link',
			[
				'label' => __( 'Disable Link', 'clever-mega-menu-for-elementor' ),
				'type' => Controls_Manager::SWITCHER
			]
		);

		$document->add_control(
			'hide_on_mobile',
			[
				'label' => __('Hide on Mobile', 'clever-mega-menu-for-elementor'),
				'type' => Controls_Manager::SWITCHER
			]
		);

		$document->add_control(
			'hide_on_desktop',
			[
				'label' => __('Hide on Desktop', 'clever-mega-menu-for-elementor'),
				'type' => Controls_Manager::SWITCHER
			]
		);

		$document->add_control(
			'hide_sub_on_mobile',
			[
				'label' => __('Hide Sub on Mobile', 'clever-mega-menu-for-elementor'),
				'type' => Controls_Manager::SWITCHER
			]
		);

		$document->add_control(
			'cmm4e_icon',
			[
				'label' => __('Icon', 'clever-mega-menu-for-elementor'),
				'label_block' => true,
				'type' => class_exists('CleverAddonsForElementor\Controls\CleverIcon') ? 'clevericon' : Controls_Manager::ICON
			]
		);

		$document->add_control(
			'viewers',
			[
				'label' => __('Role & Restrictions', 'clever-mega-menu-for-elementor'),
                'label_block' => true,
				'type' => Controls_Manager::SELECT,
                'multiple' => true,
                'options' => $viewers,
                'default' => 'pro_only'
			]
		);

		$document->add_control(
			'show_badge',
			[
				'label' => __('Show Badge', 'clever-mega-menu-for-elementor'),
				'type' => Controls_Manager::SWITCHER
			]
		);

		$document->add_control(
			'_badge_available_on_pro_version',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'This feature is only available on Pro version!', 'clever-mega-menu-for-elementor' ),
                'condition' => [
                    'show_badge' => 'yes'
                ]
			]
		);

        $document->end_injection();

        $document->start_controls_section(
			'flyout_panel_settings',
			[
				'label' => __('Flyout Panel Settings', 'clever-mega-menu-for-elementor'),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$document->add_control(
			'flyout_panel_width',
			[
				'label' => __( 'Width', 'clever-mega-menu-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%', 'vw', 'px'],
				'range' => [
					'%' => [
						'min' => 10,
						'max' => 50
					],
					'px' => [
						'min' => 150,
						'max' => 400
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 260,
				],
				'selectors' => [
					'.cmm4e-menu-item.cmm4e-current-edit-item > .cmm4e-sub-container' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

        $document->end_controls_section();

		$document->start_controls_section(
			'mega_panel_settings',
			[
				'label' => __('Mega Panel Settings', 'clever-mega-menu-for-elementor'),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$document->add_control(
			'mega_panel_width',
			[
				'label' => __( 'Width', 'clever-mega-menu-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%', 'vw', 'px'],
				'range' => [
					'%' => [
						'min' => 30,
						'max' => 100
					],
					'px' => [
						'min' => 400,
						'max' => 1920
					]
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'#cmm4e-menu-content' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $document->end_controls_section();
    }
}
Cmm4eDocument::init();
