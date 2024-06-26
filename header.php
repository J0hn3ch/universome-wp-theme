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
	<div id="page" class="site-wrapper px-8">
		<div class="theme-container container mx-auto shadow-md bg-white">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'universome-theme'); ?></a>

			<!-- Header -->
			<header id="masthead" class="site-header block mt-1 mb-2 py-4 bg-gray-50 shadow justify-between items-center border-t-4 border-yellow-500">

				<!-- Location, Date, Time, Last Update -->
				<div class="site-date flex flex-col font-sans text-center">
					<span id="site-date__date-content" class="bg-inherit w-full">
						<?php
						echo do_shortcode('[date-today format="l, d F Y"]');
						?>
					</span>
					<span id="site-date__last-update" class="bg-red-700 w-full text-white font-medium"> Ultimo aggiornamento: 12:30 </span>
				</div>

				<!-- Navigation -->
				<div class="site-navigation p-2 container flex justify-between items-center">

					<!-- Side Menu -->
					<aside id="side-menu" class="widget-area w-[90%] h-screen mr-4 bg-pink-50 absolute top-0 left-0 invisible">
						<?php dynamic_sidebar('sidebar-2'); ?>
					</aside><!-- #side-menu -->

					<!-- 1: Login button -->
					<div class="site-login bg-yellow-50 flex-none w-14 h-14">
						<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/assets/user.svg">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/user.svg" />
						</object>
					</div>

					<!-- 2: Site brand -->
					<div class="site-branding bg-orange-50 grow flex items-center justify-center">
						<a href="<?php echo esc_url(home_url('/'));  ?>" aria-label="UniVersoMe" class="site-branding__logo-container" rel="home">
							<?php universome_the_custom_logo(); ?>
						</a>
						<?php
						$universome_theme_description = get_bloginfo('description', 'display');
						if ($universome_theme_description || is_customize_preview()) :
						?>
							<p class="site-description"><?php echo $universome_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
														?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->

					<!-- 3: Main Menu -->
					<div class="site-navigation__menu bg-green-50 flex-none w-14 h-14">
						<nav id="main-menu" class="main-navigation">
							<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Menu</button> -->
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'	 => 'flex justify-start space-x-4'
								)
							);
							?>
						</nav><!-- #site-navigation -->
						<div id="mobile-menu-dropdown" class="site-navigation__button-right lg:invisible">
							<button class="site-navigation__button border-none" aria-label="Mobile Menu Button" aria-controls="side-menu" aria-expanded="false">
								<div class="site-navigation__button-icon">
									<svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5 12H18" stroke="#000000" stroke-width="2" stroke-linecap="round" />
										<path d="M5 17H11" stroke="#000000" stroke-width="2" stroke-linecap="round" />
										<path d="M5 7H15" stroke="#000000" stroke-width="2" stroke-linecap="round" />
									</svg>
								</div>
							</button>
						</div>
					</div>
				</div> <!-- #navigation -->
				<?php if (!is_single()) : ?>
					<div id="header-image-container" class="bg-blue-50 w-full h-auto grid place-items-center">
						<?php get_template_part('./template-parts/components/boxes/box', 'article'); ?>
						<!-- <span class="box-decoration-clone hover:box-decoration-slice bg-gradient-to-r from-indigo-600 to-pink-500 text-white px-2 text-xl font-semibold">
							Radio<br />UniVersoMe
						</span> -->
						<?php if (get_header_image()) : ?>
							<div id="header-image-wrapper">
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
									<img src="<?php header_image(); ?>" width="<?php echo absint(get_custom_header()->width); ?>" height="<?php echo absint(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
								</a>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</header><!-- #masthead -->
			<div id="mobile-menu-header">
				<nav id="mobile-menu" class="contaner grid hidden" aria-label="Mobile Menu">
					<div id="social-list"></div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-mobile',
							'menu_id'        => 'mobile-menu-list',
							'menu_class'	 => 'grid grid-cols-2 gap-4 text-xl font-bold text-black',
							'container_id'	 => 'mobile-menu-wrapper',
							'container_class'	 => 'mx-4 px-2 py-4',
						)
					);
					?>
				</nav>
			</div>