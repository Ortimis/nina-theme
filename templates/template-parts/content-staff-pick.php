<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reinform
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php reinform_featured_image(); ?>
	<div class="entry-text">
		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php reinform_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php
			endif;

			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_excerpt();
				//the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'reinform' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
