<?php
/**
 * Template part for displaying posts with the video format.
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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() ) { ?>
		<span class="featured-post">
			<?php echo file_get_contents( get_template_directory() . '/images/icon-star.svg' ); ?>
			<?php esc_html_e( 'Featured', 'scratchpad' ); ?>
		</span>
	<?php } ?>

	<?php
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

		if ( ! empty( $video ) ) {
			foreach ( $video as $video_html ) {
				$content = str_replace( $video_html, '', $content );
				?>
				<div class="entry-video jetpack-video-wrapper">
					<?php echo $video_html; ?>
					<div class="movie-tickets">
						<?php echo file_get_contents( get_template_directory() . '/images/movie-ticket.svg' ); ?>
						<?php echo file_get_contents( get_template_directory() . '/images/movie-ticket.svg' ); ?>
					</div><!-- .movie-tickets -->
				</div><!-- .entry-video.jetpack-video-wrapper -->
			<?php
			} // endforeach
		} // endif !empty ( $media )
	?>

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
