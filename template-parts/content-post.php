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
    <!-- Breadcumb -->
    <div class="post-breadcumb__box">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
    </div>
    <div class="post-breadcumb__box">
        <?php
        the_category(' &gt; ');
        ?>
    </div>
    <div class="post-breadcumb__box">
        <?php
        $args = array(
            'orderby' => 'term_id',
            'fields' => 'ids'
        );
        $post_categories = wp_get_post_categories(get_the_ID(), $args);

        $args = array(
            'include' => $post_categories,
            'style' => 'list',
            'title_li' => ''
        );
        wp_list_categories($args);
        //var_dump($post_categories);
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->