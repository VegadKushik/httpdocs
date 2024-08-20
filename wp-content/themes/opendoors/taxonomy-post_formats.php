<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

get_header();
$term = get_queried_object();
?>

    <main>
        <div class="container">
            <h1><?=$term->name?></h1>
        <?php if ( have_posts() ) : ?>

            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                echo '<h3><a href="'.get_the_permalink().'">';
                the_title();
                echo '</a></h3>';
                echo '<p>';
                the_excerpt();
                echo '</p><hr>';
            endwhile;

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
        </div>
    </main><!-- #main -->

<?php
get_footer();
