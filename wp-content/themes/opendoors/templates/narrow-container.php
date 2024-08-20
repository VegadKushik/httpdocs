<?php
/*
 * Template Name: Narrow Container
 * Template Post Type: page
 * */

get_header();
global $post;
?>

    <main>
        <section class="standard-page" role="document">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 ml-auto mr-auto">
						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								?>
								<?php if ( has_post_thumbnail() ) : ?>
                                <figure class="<?php if ( get_the_ID() === 276 )
									echo 'is-style-with-overlay' ?>">
									<?php the_post_thumbnail(); ?>
                                </figure>
							<?php endif; ?>

                                <h1><?php the_title(); ?></h1>

								<?php
								the_content();

							endwhile;

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->

<?php
get_footer();
