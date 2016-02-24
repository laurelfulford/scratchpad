<?php
/**
 * Template part for displaying gallery posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scratchpad
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_sticky() && is_home() ) { ?>
		<span class="featured-post">
			<?php echo file_get_contents( get_template_directory() . '/images/icon-star.svg' ); ?>
			<?php esc_html_e( 'Featured', 'scratchpad' ); ?>
		</span>
	<?php } ?>

	<?php
		if ( get_post_gallery() ) { ?>
			<div class="entry-gallery">
				<?php echo get_post_gallery(); ?>
				<div class="photo-corners">
					<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
					<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
					<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
					<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
				</div><!-- .photo-corners -->
			</div><!-- .entry-gallery -->
		<?php
		} // endif get_post_gallery()
	?>

	<header class="entry-header">
		<?php if ( ! is_single() ) {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		} else {
			the_title( '<h2 class="entry-title">', '</h2>' );
		} ?>
	</header><!-- .entry-header -->

	<?php if ( is_single() ) { ?>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'scratchpad' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'scratchpad' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php } ?>

	<footer class="entry-meta">
		<?php scratchpad_post_format(); ?>
		<?php scratchpad_posted_on(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
