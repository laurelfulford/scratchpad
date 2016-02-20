<?php
/**
 * Template part for displaying posts with the audio format.
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
	<?php
		$audio = get_media_embedded_in_content( $content, array( 'audio' ) );

		if ( ! empty( $audio ) ) {
			foreach ( $audio as $audio_html ) {
				$content = str_replace( $audio_html, '', $content );
				?>
				<div class="entry-audio">
					<?php echo $audio_html; ?>
				</div><!-- .entry-audio -->
			<?php } // endforeach
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
			<?php scratchpad_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
