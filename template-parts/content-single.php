<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scratchpad
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="featured-image">
			<?php echo file_get_contents( get_template_directory() . '/images/paperclip.svg' ); ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- .featured-image -->
	<?php } ?>

	<header class="entry-header">
		<?php scratchpad_categories(); ?>
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
		<div class="entry-meta">
			<?php scratchpad_post_format(); ?>
			<?php scratchpad_posted_on(); ?>
		</div><!-- .entry-meta -->
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

	<?php get_template_part( 'template-parts/author-bio' ); ?>

	<footer class="entry-footer">
		<?php scratchpad_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php
	/* Post-format specific SVGs */
	if ( 'audio' == get_post_format() ) {
		echo '<div class="earbud-container">' .
		file_get_contents( get_template_directory() . '/images/earbuds.svg' ) .
		file_get_contents( get_template_directory() . '/images/earbuds-plug.svg' ) .
		'</div>';
	} ?>
</article><!-- #post-## -->
