<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UniVersoMe_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Author Section -->
	<section class="box-author-wrapper p-6 bg-blue-100 rounded-md shadow-md flex items-center space-x-4">
		<div class="shrink-0">
			<?php echo get_avatar(get_the_author_meta('user_email'), $size = '96', $default_value = '', $alt = '', $args = array('class' => 'rounded-full'));  ?>
		</div>
		<div>
			<div class="text-xl font-medium text-black inline-block"> <?php the_author_meta('display_name') ?> </div>
			<div class="post-author-role inline">
				<span> <?php the_author_meta('user_status') ?> </span>
			</div>
			<p class="text-sm text-slate-500"> <?php the_author_meta('description') ?> </p>
		</div>
	</section>


	<section class="post-box">
		<header class="entry-header">
			<?php
			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif;

			if ('post' === get_post_type()) :
			?>
				<div class="entry-meta">
					<?php
					universome_theme_posted_on();
					universome_theme_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php universome_theme_post_thumbnail();
		//get_template_part('template-parts/components/thumbnails/thumbnail', 'single');
		?>

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'universome-theme'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'universome-theme'),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php universome_theme_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</section>
</article><!-- #post-<?php the_ID(); ?> -->