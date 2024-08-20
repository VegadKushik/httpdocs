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
pr(have_posts() );
?>

    <main>
        <div class="container">
            <h1><?=$term->name?></h1>
            <?php
            $path = array_keys(array_flip(explode('/', parse_url($_SERVER['SCRIPT_URI'])['path'])));
            if(array_search('page', $path)) $paged = $path[array_search('page', $path)+1];
            else $paged = 1;
            $args = array(
                'post_type' => 'news',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'paged' => $paged,
                'tag'=> [$term->slug]
            );
            $query = new WP_Query($args);
            if ( $query->have_posts() ) : ?>

                <?php
                /* Start the Loop */
                while ( $query->have_posts() ) :
                    $query->the_post();
                    echo '<h3><a href="'.get_the_permalink().'">';
                    the_title();
                    echo '</a></h3>';
                    echo '<p>';
                    the_excerpt();
                    echo '</p><hr>';
                endwhile;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

        </div>

    </main><!-- #main -->

<?php
get_footer();
