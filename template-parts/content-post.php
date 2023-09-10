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
    <!-- Breadcrumb -->
    <div class="post-breadcrumb__box">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            //yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
    </div>
    <div class="post-breadcrumb__box my-2">
        <?php
        $args = array(
            'orderby' => 'term_id',
            'fields' => 'ids'
        );
        $post_categories = wp_get_post_categories(get_the_ID(), $args);
        ?>
        <ul class="post-breadcrumb__box-list list-none">
            <?php
            $args = array(
                'include' => $post_categories,
                'style' => 'list',
                'orderby' => 'term_id',
                'hierarchical' => false,
                'title_li' => ''
            );
            wp_list_categories($args);
            ?>
        </ul>
    </div>
    <!-- Title -->
    <h1 class="post__title mb-2"> <?php the_title(); ?> </h1>

    <!-- Post thumbnail -->
    <?php
    $args = array('class' => 'w-full h-96');
    universome_theme_post_thumbnail('post-standard-thumbnail', $args); ?>
</article><!-- #post-<?php the_ID(); ?> -->