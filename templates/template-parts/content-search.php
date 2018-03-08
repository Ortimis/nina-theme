<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reinform
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	$blog_layout = get_theme_mod( 'blog_layout_setting', 'magazine' );

	if ( !has_post_thumbnail() && !is_sticky() && $blog_layout == 'magazine' ) { ?>

		<?php
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta entry-meta-top">
				<?php reinform_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif;
		?>
		<div class="entry-text">
			<header class="entry-header">
				<?php
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

	<?php } else if ( has_post_thumbnail() && is_sticky() && $blog_layout == 'magazine' ) { ?>

		<div class="sticky-wrapper">
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

					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif; ?>

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
		</div>

	<?php } else if ( 'jetpack-portfolio' == get_post_type() ) { ?>
		<?php reinform_featured_image(); ?>
		<div class="entry-text">
			<header class="entry-header">
				<?php
				if ( 'post' === get_post_type() || 'jetpack-portfolio' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php reinform_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php
				endif;

				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>

			</header><!-- .entry-header -->
		</div>
	<?php } else { ?>

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

				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>

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

	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
