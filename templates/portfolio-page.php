<?php
/**
 * Template Name: Portfolio
 *
 * @package Reinform
 */
get_header(); ?>

<div class="row">
	<div id="primary" class="content-area <?php reinform_content_classes(); ?>">
		<main id="main" class="site-main portfolio-archive" role="main">

			<?php

				if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = 1;
				endif;

				$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page' );

				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'posts_per_page' => $posts_per_page,
					'paged'			 => $paged,
				);

				$wp_query = new WP_Query ( $args );

				if ( post_type_exists( 'jetpack-portfolio' ) && $wp_query->have_posts() ) : ?>

					<div class="portfolio-listing">

						<div class="row">
							<div class="portfolio-wrapper clear masonry" id="post-load">

								<div class="<?php reinform_grid_sizer_class(); ?>"></div>

								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

									<?php get_template_part( 'templates/template-parts/content', 'portfolio' ); ?>

								<?php endwhile; ?>

							</div><!-- .portfolio-wrapper -->
						</div><!-- .row -->

					</div><!-- .portfolio-listing -->

					<?php
						wp_reset_postdata();

						// Archives numbered paging
						reinform_numbers_pagination();
					?>

				<?php else : ?>

					<section class="no-results not-found">

						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'reinform' ); ?></h1>
						</header>
						<div class="entry-content">
							<?php if ( current_user_can( 'publish_posts' ) ) : ?>

								<p><?php printf( wp_kses( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'reinform' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

							<?php else : ?>

								<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'reinform' ); ?></p>
								<?php get_search_form(); ?>
								<div class="search-instructions"><?php esc_html_e( 'Press Enter / Return to begin your search.', 'reinform' ); ?></div>

							<?php endif; ?>
						</div>

					</section>

				<?php endif; ?>

		</main>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
