<?php
/**
 * Template Name: Home Full Slider, Magazine
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reinform
 */

get_header(); ?>

	<!-- Featured Portfolio Slider -->

	<?php if ( ! is_paged() && reinform_has_featured_posts() ) { ?>

		<div id="featured-content" class="horizontal">

			<div class="featured-slider clear">
				<?php
					// Load featured images
					$featured_posts = apply_filters( 'rht_get_featured_posts', array( '69', '165', '172' ) );

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

						<div class="grid-sizer col-sm-6"></div>

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

	</div><!-- .row -->

<?php

reinform_featured_category_slider();

get_footer();
