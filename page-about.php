<?php

/**
 * Template Name: About Page
 * 
 * The template for displaying About Page
 *
 * This is the template that displays the team.
 * Here we have, Direttore Editoriale, Direttore Responsabile,
 * Consiglio Direttivo delle Unit, Redattori e Tecnici.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UniVersoMe_Theme
 */

get_header();
?>

<main id="primary-3" class="site-main">
	Pagina di chi siamo
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

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
