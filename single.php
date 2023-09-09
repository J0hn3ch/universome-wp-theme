<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UniVersoMe_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="max-w-4xl mx-auto px-4">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());



			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

			the_post_navigation(
				array(
					'prev_text' => '<p class="nav-subtitle font-medium text-blue-800 underline underline-offset-4 decoration-2 decoration-blue-500">' . esc_html__('Precedente', 'universome-theme') . '</p> <p class="nav-title font-semibold">%title</p>',
					'next_text' => '<p class="nav-subtitle font-medium text-blue-800 underline underline-offset-4 decoration-2 decoration-blue-500">' . esc_html__('Successivo', 'universome-theme') . '</p> <p class="nav-title font-semibold">%title</p>',
				)
			);
		endwhile; // End of the loop.
		?>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
