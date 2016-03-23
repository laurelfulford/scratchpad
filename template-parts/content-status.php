<?php
/**
 * Template part for displaying posts with the Status format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scratchpad
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php scratchpad_sticky(); ?>

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- .featured-image -->
	<?php } ?>

	<header class="entry-header">
		<?php
			if ( is_single() ) {
				scratchpad_categories();
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>


	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'scratchpad' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'scratchpad' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-meta">
		<?php scratchpad_post_format(); ?>
		<?php scratchpad_posted_on(); ?>
	</div><!-- .entry-meta -->

	<?php get_template_part( 'images/inline', 'pen.svg' ); ?>
</article><!-- #post-## -->
