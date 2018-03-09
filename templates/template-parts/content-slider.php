<?php
/**
 * The template used for displaying projects slides
 *
 * @package Reinform
 */
?>

<?php $featured_slider = get_theme_mod( 'reinform_featured_content', 'viewport' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php reinform_featured_image(); ?>

	<div class="slider-entry-content-wrap">
		<div class="slider-entry-content">

			<header class="entry-header">

			<div class="entry-meta">
				<?php reinform_posted_on(); ?>
			</div><!-- .entry-meta -->

				<?php
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h1>' );
				?>

			</header><!-- .entry-header -->

			<div class="excerpt-holder">
				<?php the_excerpt(); ?>
			</div>

		</div><!-- .slider-entry-content -->
	</div><!-- .slider-entry-content-wrap -->

</article>
