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
<footer id="colophon" class="site-footer bg-blue-950 h-[500px]">
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'universome-theme')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'universome-theme'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'universome-theme'), 'universome-theme', '<a href="https://gianlucarbone.it">Gianluca Carbone</a>');
		?>
		<div class="site-footer-menu flex flex-row">
			<div class="basis-1/4">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer-1',
						'menu_class'	 => ''
					)
				);
				?>
			</div>
			<div class="basis-1/4">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer-2',
						'menu_class'	 => ''
					)
				);
				?>
			</div>
			<div class="basis-1/2">03</div>
		</div>
		<div class="site-bottom-menu flex">
			<div class="flex-none w-14 h-14">&copy; UniVersoMe <?php echo date("Y"); ?> Licenze: SIAE n. 6195/I/8746, SCF n. XXX/17, LEA n. RL_2020_81</div>
			<div class="grow h-14">2</div>
			<div class="flex-none w-14 h-14">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-legal',
						'menu_id'        => 'legal-menu',
						'menu_class'	 => 'flex justify-end space-x-4'
					)
				);
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