<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

get_header();
?>

    <main>
        <section class="standard-page" role="document">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 ml-auto mr-auto">
                        <h1>Open Doors magazine</h1>

						<?php if ( have_posts() ) : ?>

							<?php
							$i = 0;
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								$i ++;
								?>

                                <div class="float-left-wrapper">
                                    <a href="<?php the_field( 'link_to_magazine' ) ?>"
                                       target="_blank">
										<?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                                <h3><?php the_title() ?></h3>
								<?php the_content(); ?>
                                <p>
                                    <a href="<?php the_field( 'link_to_magazine' ) ?>"
                                       target="_blank">View the Magazine</a> | <a
                                            href="<?php the_field( 'link_to_prayer_diary' ) ?>"
                                            target="_blank">View Prayer Diary</a>.
                                </p>
                                <hr>
                                <p>&nbsp;</p>
								<?php if ( $i == 1 ) : ?>
                                <h4>Previous Issues</h4>
							<?php endif; ?>

							<?php

							endwhile;

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
                    </div>
                </div>
            </div>

    </main><!-- #main -->

<?php
get_footer();
