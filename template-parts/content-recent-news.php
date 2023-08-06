<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UniVersoMe_Theme
 */

?>
<div class="box-border h-32 w-32 p-4 border-4">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="article-thumbnail">
			<figure>
				<?php //universome_theme_post_thumbnail('poster-thumbail'); 
				$thumbnail_attr = array('class' => 'object-contain');
				the_post_thumbnail($size = 'post-thumbail', $attr = $thumbnail_attr); ?>
			</figure>
		</div>
		<header class="entry-header">
			<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_excerpt();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'universome-theme'),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if (get_edit_post_link()) : ?>
			<footer class="entry-footer">
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
</div>