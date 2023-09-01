<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UniVersoMe_Theme
 */

?>
<!-- Footer -->
<footer id="colophon" class="site-footer py-6 bg-blue-900">
	<div class="site-footer__wrapper max-w-7xl mx-auto px-6">

		<a href="<?php echo esc_url(__('https://wordpress.org/', 'universome-theme')); ?>" class="" target="_self">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/uvm-medallion.png" alt="UniVersoMe Logo Medallion" width="100px" height="100px" class="mb-4">
		</a>

		<div class="site-footer__content grid gap-4 grid-cols-2 md:grid-cols-4">
			<div class="site-footer__description mb-10 col-span-2 text-sm">
				<p class="mb-4 text-opacity-80 font-semibold">UniVersoMe - Testata multiforme degli studenti UniMe</p>
				<p class="mb-4 text-opacity-80">
					UniVersoMe è la testata giornalistica dell'Università degli Studi di Messina registrata presso il Tribunale di Messina n. 11 del 2015.
				</p>

			</div>

			<div>
				<?php
				$args_menu_footer1 = array(
					'theme_location' => 'menu-footer-1',
					'menu_class'	 => '',
					'container' => 'div',
					'container_class' => '',
					'container_aria_label' => '',
					'before' => '*',
					'after' => '*',
					'link_before' => '>',
					'link_after' => '<',
					'depth' => '2',
					//'items_wrap' => '',
					'items_spacing' => 'preserve'
				);
				echo wp_get_nav_menu_name($args_menu_footer1['theme_location']);
				wp_nav_menu($args_menu_footer1);
				?>
			</div>
			<div>
				<?php
				$args_menu_footer2 = array(
					'theme_location' => 'menu-footer-2',
					'menu_class'	 => ''
				);
				wp_nav_menu($args_menu_footer2);
				?>
			</div>
		</div>
		<div class="site-bottom-menu flex justify-between">
			<div class="">
				<span>&copy; UniVersoMe 2015-<?php echo date("Y"); ?> Licenze: SIAE n. 6195/I/8746, SCF n. XXX/17, LEA n. RL_2020_81</span>
				<p><?php printf(esc_html__('Proudly powered by %s', 'universome-theme'), 'WordPress');	?>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf(esc_html__('Theme: %1$s by %2$s.', 'universome-theme'), 'universome-theme', '<a href="https://gianlucarbone.it">Gianluca Carbone</a>');
					?>
				</p>
			</div>
			<div class="">
				<?php
				$args_menu_legal = array(
					'theme_location' => 'menu-legal',
					'menu_id'        => 'legal-menu',
					'menu_class'	 => 'flex justify-end space-x-4 text-sm'
				);
				wp_nav_menu($args_menu_legal);
				?>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- .theme-container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>