<?php
/**
 * Template part for displaying posts with the image format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scratchpad
 */


/* translators: %s: Name of current post */
$content_text = sprintf(
	wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'scratchpad' ), array( 'span' => array( 'class' => array() ) ) ),
	the_title( '<span class="screen-reader-text">"', '"</span>', false )
);
$content = apply_filters( 'the_content', get_the_content( $content_text ) );
$image = get_media_embedded_in_content( $content, array( 'image' ) );
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
	<?php } else if ( ! empty( $image ) ) { ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>"><?php echo $image[0]; ?></a>
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
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php scratchpad_post_format(); ?>
			<?php scratchpad_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
