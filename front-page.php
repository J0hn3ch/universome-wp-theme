<?php

/**
 * The template displaying the Front Page used as Home Page
 *
 * The main contains various sections, displaying articles divided by its category.
 * Section Ultime notizie
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UniVersoMe_Theme
 */

get_header();
?>

<main id="primary-front" class="site-main">

	<section class="site-main__latest-news">
		<h2>Ultime notizie</h2>
		<div class="site-main__post-container">
			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 3
			);

			$loop = new WP_Query($args);
			if ($loop->have_posts()) :
				while ($loop->have_posts()) : $loop->the_post();
					// Display post content
					get_template_part('./template-parts/sections/section', 'articles');
				endwhile;
			endif;
			?>
		</div>
	</section>

	<section>
		<h2>Attualità</h2>
		<h3>Breaking News</h3>
	</section>

	<section>
		<h2>Cultura locale</h2>
	</section>

	<section>
		<h2>Scienza&Salute</h2>
	</section>

	<section>
		<h2>Recensioni</h2>
	</section>

	<section>
		<h2>Inchiostro</h2>
	</section>

	<section>
		<h2>Eventi</h2>
	</section>

	<?php
	echo get_option('show_on_front');
	if ('posts' == get_option('show_on_front')) {
		include(get_home_template());
	} else {
		//include(get_page_template());
	}


	if (have_posts()) : while (have_posts()) : the_post();
			get_home_template();
		endwhile;
	else :
	// no posts found
	endif;

	//while (have_posts()) :
	//	the_post();

	//	get_template_part('template-parts/content', 'page');

	// If comments are open or we have at least one comment, load up the comment template.
	/*if (comments_open() || get_comments_number()) :
			comments_template();
		endif;*/

	//endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
