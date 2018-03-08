<?php
/**
 * The template used for displaying projects on index view
 *
 * @package Reinform
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="portfolio-wrapper">

		<?php reinform_featured_image(); ?>

		<header class="entry-header">

			<?php

				if ( 'post' === get_post_type() || 'jetpack-portfolio' === get_post_type() ) { ?>

						<div class="entry-meta">
							<?php reinform_posted_on(); ?>
						</div><!-- .entry-meta -->

				<?php }

				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h1>' );

			?>

		</header><!-- .entry-header -->

	</div>

</article><!-- #post-## -->
