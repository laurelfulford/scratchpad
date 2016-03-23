<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Scratchpad
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function scratchpad_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'scratchpad_infinite_scroll_render',
		'footer'    => 'page',
		'footer_widgets' => 'sidebar-2'
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	//Site logo
	add_image_size( 'scratchpad-site-logo', 300, 800 );
	add_theme_support( 'site-logo', array(
		'header-text' => array(
			'site-title',
			'site-description',
		),
		'size'        => 'scratchpad-site-logo',
	) );
}
add_action( 'after_setup_theme', 'scratchpad_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function scratchpad_infinite_scroll_render() {
	require get_template_directory() . '/template-parts/scratchpad-pieces.php';
	$currentpost = get_option( 'posts_per_page' );

	while ( have_posts() ) {
		shuffle( $stationary );
		if( $currentpost % 3 == 0 && ! is_sticky() ) {
			echo '<div class="separator">';
			echo file_get_contents( get_template_directory() . '/images/' . $stationary[0] );
			echo '</div>';
		}
		$currentpost++;

		the_post();
		if ( is_search() ) :
		    get_template_part( 'template-parts/content', 'search' );
		else :
		    get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
