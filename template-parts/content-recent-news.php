<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UniVersoMe_Theme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("max-w-[450px]"); ?>>
	<div class="article-thumbnail mx-auto relative rounded-lg overflow-hidden">
		<?php //universome_theme_post_thumbnail('poster-thumbail'); 
		$thumbnail_attr = array('class' => 'object-cover h-64');
		the_post_thumbnail($size = 'post-thumbnail', $attr = $thumbnail_attr); ?>
	</div>
	<div class="article-header p-2 flex justify-between">
		<p class="article-header__category">Attualità</p>
		<p class="article-header__date">10/08/23</p>
	</div>
	<header class="entry-header p-2">
		<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
	</header><!-- .entry-header -->
	<!-- <div class="entry-content">
			<?php
			//the_excerpt();

			/*wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'universome-theme'),
					'after'  => '</div>',
				)
			);*/
			?>
		</div>--><!-- .entry-content -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer p-2">
			<p class="article-header__author">Redazione UniVersoMe</p>
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'universome-theme'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->