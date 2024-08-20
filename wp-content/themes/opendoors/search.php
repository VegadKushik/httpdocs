<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package test
 */

get_header();
?>

    <section class="alternative-page" role="document">
        <div class="container alternative-page__wrapper">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <ul class="list-unstyled">
						<?php if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'search' );

							endwhile;

                            the_posts_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
                    </ul>
                </div>


            </div>
        </div>
    </section>

<?php
get_footer();
