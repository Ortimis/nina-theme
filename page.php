<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reinform
 */

get_header(); ?>

	<div class="header-wrapper container <?php reinform_page_classes(); ?>">
		<header class="entry-header">
			<!-- <?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?> -->
		</header><!-- .entry-header -->

		<?php reinform_featured_image(); ?>
	</div>

	<div class="primary-wrapper container <?php reinform_page_classes(); ?>">
		<div class="row">
			<div id="primary" class="content-area <?php reinform_content_classes(); ?>">
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'templates/template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>
		</div><!-- .row -->
	</div><!-- .container -->

	<?php
		while ( have_posts() ) : the_post();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) : ?>
				<div class="comment-holder clear">
					<?php comments_template(); ?>
				</div>
			<?php endif;

		endwhile; // End of the loop.

get_footer();
