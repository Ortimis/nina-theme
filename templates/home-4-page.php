<?php
/**
 * Template Name: Home Newspaper, Sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reinform
 */

get_header(); ?>

	<div class="row">
		<div id="primary" class="content-area <?php reinform_content_classes(); ?>">
			<main id="main" class="site-main">

			<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>

			<?php
			if ( have_posts() ) : ?>

				<div class="row">
					<div class="masonry" id="post-load">
						<div class="lines">
							<span class="line"></span>
							<span class="line"></span>
							<span class="line"></span>
						</div>

						<?php
							function rht4_grid_sizer_class( $classes ) {
								$classes = array();
								if ( is_active_sidebar( 'sidebar-1' ) && ! is_search() ) {

									$classes[] = esc_attr( 'col-lg-4 col-md-4 col-sm-6' );

								} else {

									$classes[] = esc_attr( 'col-lg-3 col-md-4 col-sm-6' );

								}

								echo esc_attr( implode( ' ', $classes ) );
							}
						?>

						<div class="grid-sizer <?php rht4_grid_sizer_class(); ?>"></div>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'templates/template-parts/content', get_post_format() );

						endwhile;

						?>

					</div><!-- .masonry -->
				</div><!-- .row -->

			<?php

				reinform_numbers_pagination();

			else :

				get_template_part( 'templates/template-parts/content', 'none' );

			endif;

			wp_reset_query(); ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .row -->

<?php

reinform_featured_category_slider();

get_footer();
