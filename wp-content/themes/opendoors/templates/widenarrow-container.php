<?php
/*
 * Template Name: Wide Narrow Container
 * */

get_header();
?>

    <main>
        <section class="standard-page advocacy" role="document">
            <div class="container">

                <h1><?php the_title(); ?></h1>
				<?php if ( get_queried_object_id() == 264 ) : ?>
                <section class="page-hero">
					<?php endif; ?>
                    <img <?php if ( get_queried_object_id() == 264 ) : ?> class="_absolute-image" <?php endif; ?>
                            src="<?php the_post_thumbnail_url( 'full' ); ?>"
                            alt="<?php the_title(); ?>">
					<?php if ( get_queried_object_id() == 264 ) : ?>
                </section>
			<?php endif; ?>
                <div class="row">
                    <div class="col-xl-8 ml-auto mr-auto">
						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								?>
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
