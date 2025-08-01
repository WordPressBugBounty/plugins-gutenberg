<?php
/**
 * Server-side rendering of the `core/comments-pagination` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/comments-pagination` block on the server.
 *
 * @since 6.0.0
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Block default content.
 *
 * @return string Returns the wrapper for the Comments pagination.
 */
function gutenberg_render_block_core_comments_pagination( $attributes, $content ) {
	if ( empty( trim( $content ) ) ) {
		return '';
	}

	if ( post_password_required() ) {
		return;
	}

	$classes            = ( isset( $attributes['style']['elements']['link']['color']['text'] ) ) ? 'has-link-color' : '';
	$wrapper_attributes = get_block_wrapper_attributes(
		array(
			'aria-label' => __( 'Comments pagination' ),
			'class'      => $classes,
		)
	);

	return sprintf(
		'<nav %1$s>%2$s</nav>',
		$wrapper_attributes,
		$content
	);
}

/**
 * Registers the `core/comments-pagination` block on the server.
 *
 * @since 6.0.0
 */
function gutenberg_register_block_core_comments_pagination() {
	register_block_type_from_metadata(
		__DIR__ . '/comments-pagination',
		array(
			'render_callback' => 'gutenberg_render_block_core_comments_pagination',
		)
	);
}
add_action( 'init', 'gutenberg_register_block_core_comments_pagination', 20 );
