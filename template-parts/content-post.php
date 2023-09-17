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
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'post-standard-thumbnail');
    //$args = array('class' => 'w-full h-96 md:max-h-80 sm:max-h-72');
    //universome_theme_post_thumbnail('post-standard-thumbnail', $args); 
    ?>
    <div class="bg-cover bg-center bg-no-repeat w-full h-96 md:max-h-80 sm:max-h-72" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')"></div>

    <!-- Author -->
    <section class="post-author__box my-2 p-6 bg-blue-100 rounded-md shadow-md flex items-center space-x-4 border-t-2 border-b-2 border-grey-darker-400">
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

    <!-- Date -->
    <section class="post-date__box my-2 p-6 bg-red-100 rounded-md shadow-md flex items-center space-x-4 border-t-2 border-b-2 border-grey-darker-400">
        <div class="text-xl font-medium text-black inline-block">
            <?php
            if ('post' === get_post_type()) :
            ?>
                <div class="entry-meta">
                    <?php
                    universome_theme_posted_on();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </div>
    </section>

    <!-- Share buttons -->

    <!-- Content -->
    <section class="post-content__box my-2">
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
    </section>

    <!-- Tags -->
</article><!-- #post-<?php the_ID(); ?> -->