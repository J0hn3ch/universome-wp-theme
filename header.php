<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UniVersoMe_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="/dist/output.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- Page -->
	<div id="page" class="site wrapper mt-16 px-8">
		<div class="theme-container container mx-auto shadow-md bg-white">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'universome-theme'); ?></a>
			<!-- Header -->
			<header id="masthead" class="site-header block mb-2 py-4 px-2 bg-gray-50 shadow justify-between items-center border-t-4 border-purple">
				<!-- Location, Date, Time, Last Update -->
				<div class="site-date flex flex-col text-center">
					<span id="site-date__date-content w-full">
						<?php
						echo do_shortcode('[date-today format="l, d F Y"]');
						?>
					</span>
					<span id="site-date__last-update"> Ultimo aggiornamento: 12:30 </span>
				</div>
				<!-- Navigation -->
				<div class="site-navigation flex items-center">
					<div id="menu-dropdown" class="site-navigation__buttons-left">
						<button aria-label="Menu" class="site-navigation__button border-none">
							<div class="site-navigation__button-icon">
								<svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5 12H18" stroke="#000000" stroke-width="2" stroke-linecap="round" />
									<path d="M5 17H11" stroke="#000000" stroke-width="2" stroke-linecap="round" />
									<path d="M5 7H15" stroke="#000000" stroke-width="2" stroke-linecap="round" />
								</svg>
							</div>
						</button>
					</div>
					<div class="site-branding">
						<a href="/" aria-label="UniVersoMe" class="site-branding__logo-container">
							<?php
							if (function_exists('the_custom_logo')) {
								the_custom_logo();
							} ?>
						</a>
						<?php
						if (is_front_page() && is_home()) :
						?>
							<h1 class="site-title mb-2"><a href="<?php echo esc_url(home_url('/'));  ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php
						else :
						?>
							<h2 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h2>
						<?php
						endif;
						$universome_theme_description = get_bloginfo('description', 'display');
						if ($universome_theme_description || is_customize_preview()) :
						?>
							<p class="site-description"><?php echo $universome_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
														?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
					<nav id="site-navigation" class="main-navigation justify-center space-x-4">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'universome-theme'); ?></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</header><!-- #masthead -->