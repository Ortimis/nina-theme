<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reinform
 */

$footer_copyright = get_theme_mod( 'reinform_footer_copyright', '' );

?>

	</div><!-- #content -->

	<?php if ( ( is_home() || is_front_page() ) && ! is_paged() ) {
		// fetaured category slider
		reinform_featured_category_slider();

	}
	?>

	<?php
		$instagramBox = get_theme_mod( 'instagram_enable', 0 );
		if ( $instagramBox ) :
	?>

		<div id="instagram-profile" class="instagram-feed clear">

			<?php reinform_get_instagram_feed(); ?>

		</div>

	<?php endif; ?>

	<footer id="colophon" class="site-footer container">

		<?php
		if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) { ?>

			<div class="footer-widget-holder">
				<?php reinform_footer_widgets(); ?>
			</div>
		<?php } ?>

		<div class="site-info">

			<?php if ( '' == $footer_copyright ) { ?>

				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'reinform' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'reinform' ), 'WordPress' ); ?></a>
				<span class="sep"> - </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'reinform' ), 'Reinform', '<a href="https://themeskingdom.com/" rel="designer">Themes Kingdom</a>' );

			}
			else {

				printf( $footer_copyright );

			} ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
// ****
// Cookie Consent Bar
// ****
function handleCookieBar () {
	$('.cookie-info').hide();
	if(sessionStorage.getItem('cookieNotifyState') != 'dismissed'){
			$('.cookie-info').delay(2000).fadeIn();

	}
	$('.cookie-info').on('click', '#dismiss-cookie-notification', function(event){
			event.preventDefault();
			$('.cookie-info').fadeOut();
			sessionStorage.setItem('cookieNotifyState', 'dismissed');
	});
}

(function($) {
		$('.cookie-info').hide();
		if(sessionStorage.getItem('cookieNotifyState') != 'dismissed'){
				$('.cookie-info').delay(2000).fadeIn();
		}
		$('.cookie-info').on('click', '.dismiss-cookie-notification', function(event){
				console.log('Clicked!');
				event.preventDefault();
				$('.cookie-info').fadeOut();
				sessionStorage.setItem('cookieNotifyState', 'dismissed');
		});
})(jQuery);

</script>

</body>
</html>
