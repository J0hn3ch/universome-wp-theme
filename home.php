<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UniVersoMe_Theme
 */

get_header();
?>
<?php //get_template_part('template-parts/components/boxes/box', '1'); 
?>
<main id="primary-home" class="site-main">
	<div class="">
		<!-- ... grid gap-4 grid-cols-3 grid-rows-none-->
	</div>
	<div class="grid gap-1 grid-cols-3 grid-rows-none">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', 'recent-news');

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<?php get_template_part('template-parts/components/button/button'); ?>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
