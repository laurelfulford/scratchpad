<?php
/**
 * Template part for displaying posts with the image format.
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
			<div class="photo-corners">
				<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
				<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
				<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
				<?php echo file_get_contents( get_template_directory() . '/images/photo-corners.svg' ); ?>
			</div><!-- .photo-corners -->
		</div><!-- .featured-image -->
	<?php } ?>

	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php scratchpad_post_format(); ?>
			<?php scratchpad_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
