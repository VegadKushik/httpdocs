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
					<?php echo do_shortcode( '[searchandfilter id="1275"]' ); ?>
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
                            <!-- Start repeatable template block of 8 items -->

							<?php echo do_shortcode( '[searchandfilter id="1275" show="results"]' ); ?>

                        </div>
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
