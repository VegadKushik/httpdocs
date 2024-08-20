<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

get_header();
$term = get_queried_object();
?>

    <main>
        <section class="standard-page latest-stories" role="document">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1><?= $term->name ?></h1>
                    </div>
                </div>

                <!-- form filtering -->
                <div class="row latest-stories__filter">
					<?php
					echo do_shortcode( '[searchandfilter id="615"]' );
					?>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="latest-stories__header">
                            <h6><?= $term->name ?></h6>
                        </div>
                    </div>
                </div>

                <div id="main">

                    <div class="latest-stories__listing">
                        <div class="latest-stories__row">
                            <!-- Start repeatable template block of 8 items -->

							<?php
							if ( have_posts() ) :
								$i = 0;
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									$i ++;
									ob_start();
									if ( $i === 1 ) {
										$size = 'large';
										get_template_part( 'template-parts/posts/content', 'post' );
									} elseif ( $i === 2 ) {
										echo '<div class="latest-stories__column small-stack">';
										get_template_part( 'template-parts/posts/content', 'post' );
									} elseif ( $i === 3 ) {
										get_template_part( 'template-parts/posts/content', 'post' );
										echo '</div>';
									} elseif ( $i > 5 ) {
										$size = 'small';
										get_template_part( 'template-parts/posts/content', 'post' );
									} else {
										$size = 'medium';
										get_template_part( 'template-parts/posts/content', 'post' );
									}

									$contents = ob_get_contents();
									ob_end_clean();
									if ( $i === 1 || $i > 3 ) {
										echo '<div class="latest-stories__column ' . $size . '">' . $contents . '</div>';
									} else {
										echo $contents;
									}
								endwhile;
							else:
								echo 'No results found';
							endif;
							?>

                        </div>
                    </div>

                    <div class="pagination">
						<?php wp_pagenavi(); ?>
                    </div>

                </div>
                <!-- Load more indicator -->
<!--                <div class="row">-->
<!--                    <div class="col text-center">-->
<!--                        <div id="load-more" class="btn btn-secondary">Load more stories</div>-->
<!--                        <p class="to-top"><a class="btn btn-secondary" href="#top">Top</a></p>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </section>

    </main><!-- #main -->

<?php
get_footer();
