<?php
/**
 * Simple Text Module for Beaver Builder
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FLSTSimpleTextModule extends FLBuilderModule {
	public function __construct() {
		parent::__construct( array(
			'name'            => __( 'Simple Text', 'bb-simple-text' ),
			'description'     => __( 'Display a simple text/heading with extended tag options.', 'bb-simple-text' ),
			'category'        => __( 'Basic', 'fl-builder' ),
			'icon'            => 'text.svg',
			'partial_refresh' => true,
			'include_wrapper' => true,
			'element_setting' => false,
			'dir'             => BBSTM_DIR . 'modules/simple-text/',
			'url'             => BBSTM_URL . 'modules/simple-text/',
		) );
	}

	public function get_rel() {
		$rel = array();
		if ( isset( $this->settings->link_target ) && '_blank' === $this->settings->link_target ) {
			$rel[] = 'noopener';
		}
		if ( isset( $this->settings->link_nofollow ) && 'yes' === $this->settings->link_nofollow ) {
			$rel[] = 'nofollow';
		}
		$rel = implode( ' ', $rel );
		if ( $rel ) {
			$rel = ' rel="' . $rel . '" ';
		}
		return $rel;
	}
}

FLBuilder::register_module( 'FLSTSimpleTextModule', array(
	'general' => array(
		'title'    => __( 'General', 'bb-simple-text' ),
		'sections' => array(
			'general' => array(
				'title'  => '',
				'fields' => array(
					'heading' => array(
						'type'        => 'textarea',
						'label'       => __( 'Text', 'bb-simple-text' ),
						'default'     => '',
						'rows'        => 1,
						'preview'     => array(
							'type'     => 'text',
							'selector' => '{node} .fl-simple-text-content, .fl-simple-text-content',
						),
						'connections' => array( 'string' ),
					),
					'tag'     => array(
						'type'     => 'select',
						'label'    => __( 'HTML Tag', 'bb-simple-text' ),
						'default'  => 'p',
						'sanitize' => array( 'FLBuilderUtils::esc_tags', 'p' ),
						'options'  => array(
							'p'    => 'p',
							'span' => 'span',
							'div'  => 'div',
							'h2'   => 'h2',
							'h3'   => 'h3',
							'h4'   => 'h4',
							'h5'   => 'h5',
							'h6'   => 'h6',
						),
						'preview'  => array(
							'type' => 'refresh',
						),
					),
					'link'    => array(
						'type'          => 'link',
						'label'         => __( 'Link', 'bb-simple-text' ),
						'show_target'   => true,
						'show_nofollow' => true,
						'show_download' => true,
						'preview'       => array(
							'type' => 'none',
						),
						'connections'   => array( 'url' ),
					),
				),
			),
		),
	),
	'style'   => array(
		'title'    => __( 'Style', 'bb-simple-text' ),
		'sections' => array(
			'colors' => array(
				'title'  => '',
				'fields' => array(
					'color'      => array(
						'type'        => 'color',
						'connections' => array( 'color' ),
						'show_reset'  => true,
						'show_alpha'  => true,
						'responsive'  => true,
						'label'       => __( 'Color', 'bb-simple-text' ),
						'preview'     => array(
							'type'      => 'css',
							'selector'  => '{node} .fl-simple-text, {node} .fl-simple-text :not(.fl-block-overlay *)',
							'property'  => 'color',
							'important' => true,
						),
					),
					'typography' => array(
						'type'       => 'typography',
						'label'      => __( 'Typography', 'bb-simple-text' ),
						'responsive' => true,
						'preview'    => array(
							'type'     => 'css',
							'selector' => '{node} .fl-simple-text, {node} .fl-simple-text :not(.fl-block-overlay :where(a, q, p, span))',
						),
					),
				),
			),
		),
	),
) );
