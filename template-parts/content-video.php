<?php
/**
 * Template part for displaying posts with the video format.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scratchpad
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

		if ( ! empty( $video ) ) {
			foreach ( $video as $video_html ) {
				$content = str_replace( $video_html, '', $content );
				?>
				<div class="entry-video jetpack-video-wrapper">
					<?php echo $video_html; ?>
				</div><!-- .entry-video.jetpack-video-wrapper -->
			<?php
			} // endforeach
		} // endif !empty ( $media )
	?>

	<header class="entry-header">
		<?php echo file_get_contents( get_template_directory() . '/images/movie-ticket.svg' ); ?>
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
