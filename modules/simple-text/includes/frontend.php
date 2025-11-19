<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$classes = [
    'fl-simple-text',
    'fl-simple-text-content',
];
?>
<<?php echo esc_attr( $settings->tag ); ?> class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php if ( ! empty( $settings->link ) ) : ?>
	<a href="<?php echo esc_url( do_shortcode( $settings->link ) ); ?>" title="<?php echo esc_attr( wp_strip_all_tags( $settings->heading ) ); ?>" <?php echo ( isset( $settings->link_download ) && 'yes' === $settings->link_download ) ? ' download' : ''; ?> target="<?php echo esc_attr( $settings->link_target ); ?>" <?php echo $module->get_rel(); ?>>
	<?php endif; ?>
		<?php echo $settings->heading; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php if ( ! empty( $settings->link ) ) : ?>
	</a>
	<?php endif; ?>
</<?php echo esc_attr( $settings->tag ); ?>>
