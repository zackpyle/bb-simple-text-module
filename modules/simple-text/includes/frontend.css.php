<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Text color.
FLBuilderCSS::responsive_rule( array(
	'settings'     => $settings,
	'setting_name' => 'color',
	'selector'     => ".fl-node-$id .fl-simple-text, .fl-node-$id .fl-simple-text a",
	'prop'         => 'color',
	'enabled'      => ! empty( $settings->color ),
) );

// Typography.
FLBuilderCSS::typography_field_rule( array(
	'settings'     => $settings,
	'setting_name' => 'typography',
	'selector'     => array(
		".fl-node-$id .fl-simple-text",
		".fl-node-$id .fl-simple-text :where(a, q, p, span)",
	),
) );
