<?php
/**
 * Template Name: Page
 * Template Post Type: post, news, resources
 */

get_header();
?>

    <main>
        <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php
        while (have_posts()) :
            the_post();

            the_content();

        endwhile; // End of the loop.
        ?>
        </div>
    </main><!-- #main -->

<?php
get_footer();
