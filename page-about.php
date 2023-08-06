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
	<div class="w-20 h-14 bg-gradient-to-r from-cyan-500 to-blue-500 rounded">
		<h1 class="text-xl">Hello</h1>
		<p class="text-sm">Everyone</p>
	</div>
	<div>
		<form class="m-4 flex">
			<input class="rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" placeholder="your@mail.com" />
			<button class="px-8 rounded-r-lg bg-yellow-400 text-gray-800 font-bold p-4 uppercase border-yellow-500 border-t border-b border-r">Subscribe</button>
		</form>
	</div>
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
