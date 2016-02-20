<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scratchpad
 */

?>
		</div><!-- .wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrap">

			<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<aside id="footer-widgets" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</aside><!-- #secondary -->
			<?php } ?>

			<div class="site-info">
				<?php echo file_get_contents( get_template_directory() . '/images/line.svg' ); ?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'scratchpad' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'scratchpad' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'scratchpad' ), 'Scratchpad', '<a href="http://wordpress.com/themes/scratchpad/" rel="designer">Automattic</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- .wrap -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
