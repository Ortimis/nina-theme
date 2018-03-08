<?php
/**
 * Content portfolio single standard
 *
 * @package Reinform
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php

			the_content();

			wp_link_pages( array(
				'before'   => '<div class="page-links clear">',
				'after'    => '</div>',
				'pagelink' => '<span class="page-link">%</span>',
			) );
		?>

		<footer class="entry-footer">
			<?php reinform_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
