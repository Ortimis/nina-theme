<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nina-theme
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'reinform' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<?php
			$logo_position = get_theme_mod( 'logo_position_setting', 'default' );
			if ( 'default' == $logo_position ) { ?>
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->

			<?php } ?>

			<nav id="site-navigation" class="main-navigation">
				<?php printf( '<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><em>%1$s</em><span>%2$s</span></button>', esc_html__( 'Menu', 'reinform' ), '&nbsp;' ); ?>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->


			<?php if ( function_exists( 'jetpack_social_menu' ) ) {
				if ( has_nav_menu( 'jetpack-social-menu' ) ) { ?>
					<!-- Social menu trigger -->
					<div id="social_menu_trigger" class="social-menu-trigger">
						<a href="http://facebook.com/ninasvoxbox" target="_blank" class="genericon genericon-facebook"></a>
						<a href="http://instagram.com/ninasvoxbox" target="_blank" class="genericon genericon-instagram"></a>
						<!-- <button>
							<?php esc_html_e( 'Follow', 'reinform' ); ?>
						</button> -->
					</div>
			<?php
				}
			}
			?>

			<!-- Search trigger -->
			<div id="big_search_trigger" class="big-search-trigger">
				<button>
					<span class="screen-reader-text"><?php esc_html_e( 'open search form', 'reinform' ); ?></span>
					<i class="icon-search"></i>
				</button>
			</div>
		</div><!-- .container -->
	</header><!-- #masthead -->

	<?php if ( function_exists( 'jetpack_social_menu' ) ) {
		if ( has_nav_menu( 'jetpack-social-menu' ) ) { ?>
		<!-- Social menu -->
		<div id="bigSocialWrap" class="social-wrapper verticalize-container">
			<?php reinform_social_menu(); ?>
			<button id="closeSocialMenu"><span class="screen-reader-text"><?php esc_html_e( 'close Social menu', 'reinform' ); ?></span></button>
		</div>
	<?php
		}
	}
	?>

	<!-- Search form -->
	<div id="bigSearchWrap" class="search-wrap">
		<?php get_search_form(); ?>
		<div class="search-instructions"><?php esc_html_e( 'Press Enter / Return to begin your search.', 'reinform' ); ?></div>
		<button id="big-search-close">
			<span class="screen-reader-text"><?php esc_html_e( 'close search form', 'reinform' ); ?></span>
		</button>
	</div>

	<?php
	if ( 'center' == $logo_position ) { ?>
		<figure id="headerImgArea" class="header-image">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->
			<?php if ( has_header_image() ) { ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
			<?php } ?>
		</figure>

		<?php } ?>

	<!-- Featured Portfolio Slider -->

	<?php if ( is_front_page() && ! is_paged() && reinform_has_featured_posts() ) { ?>

		<div id="featured-content" class="horizontal">

			<div class="featured-slider clear">
				<?php
					// Load featured images
					$featured_posts = reinform_get_featured_posts();

					foreach ( (array) $featured_posts as $post ) : setup_postdata( $post );
						// Include the featured content template.
						get_template_part( 'templates/template-parts/content', 'slider' );
					endforeach;

					wp_reset_postdata();
				?>

				<?php $featured_slider = get_theme_mod( 'reinform_featured_content', 'viewport' ); ?>

			</div>

			<div class="pulse"></div>

		</div>

	<?php } ?>

	<div id="content" class="site-content container">
