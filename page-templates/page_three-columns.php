<?php

/**
 * Template Name: Three Columns
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UniVersoMe_Theme
 */

get_header();
?>

<main id="primary-3" class="site-main">
	<div class="columns-3">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', 'page');

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
