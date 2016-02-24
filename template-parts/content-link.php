<?php
/**
 * Template part for displaying posts with the Link format
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

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- .featured-image -->
	<?php } ?>

	<header class="entry-header">
		<?php
		/* Uses URL from post's link for title link, unless one doesn't exist. */
		the_title( '<h2 class="entry-title"><a href="' . esc_url( scratchpad_get_link_url() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

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

	<footer class="entry-meta">
		<?php scratchpad_post_format(); ?>
		<?php scratchpad_posted_on(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
