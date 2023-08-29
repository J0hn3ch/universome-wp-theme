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
    <div class="max-w-md my-4 bg-white">
        <div class="article-thumbnail mx-auto relative rounded-lg overflow-hidden">
            <?php //universome_theme_post_thumbnail('poster-thumbail'); 
            $thumbnail_attr = array('class' => 'object-cover h-64');
            the_post_thumbnail($size = 'post-thumbnail', $attr = $thumbnail_attr); ?>
        </div>
        <div class="article-header p-2 flex justify-between">
            <p class="article-header__category">Attualità</p>
            <p class="article-header__date"><?php the_date() ?></p>
        </div>

        <header class="entry-header p-2">
            <?php the_title('<h2 class="entry-title text-xl font-semibold"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
        </header>
        <footer class="entry-footer px-2">
            <p class="article-header__author"><?php the_author() ?></p>
        </footer>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->