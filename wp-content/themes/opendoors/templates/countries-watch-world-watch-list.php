<?php
/**
 * Template name: watchlist
 *  Template Post Type: post, countries-watch
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

get_header();
?>

    <main>

        <?php
        while (have_posts()) :
            the_post();

            the_content();

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->

<?php
get_footer();

