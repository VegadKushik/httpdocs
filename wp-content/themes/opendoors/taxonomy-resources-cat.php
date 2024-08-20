<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

get_header();
$default_category = get_queried_object();
$content_of_page  = get_field( 'use_content_of', $default_category );
?>
    <main>
		<?php if ( $content_of_page ) : ?>
			<?php
			$blocks = parse_blocks(get_the_content(null, false, $content_of_page));
			foreach ( $blocks as $block ) {
				echo render_block( $block );
			}
            ?>
		<?php else: ?>
                    <section class="standard-page press" role="document">
                        <div class="container">
                            <div class="row">
                                <div class="col">
									<?php if ( get_field( 'thumbnail', $default_category ) ) : ?>
                                        <figure>
                                            <img alt="<?= $default_category->name ?>"
                                                 src="<?php the_field( 'thumbnail', $default_category ) ?>">
                                        </figure>
									<?php endif; ?>
									<?php if ( have_rows( 'resources_categories', 'option' ) ): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="filter-buttons">
													<?php while ( have_rows( 'resources_categories', 'option' ) ): the_row(); ?>
                                                        <a class="btn"
                                                           href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'name' ) ?></a>
													<?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
									<?php endif; ?>
                                    <hr>
                                    <h2><?= $default_category->name ?> resources</h2>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="features-block__listing container">
						<?php if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post(); ?>
								<?php
                                get_template_part( 'template-parts/content', 'item' );
                                ?>
							<?php
							endwhile;

						else :

							echo '<div class="no-found">No posts found</div>';

						endif;
						?>
                    </div>
		<?php endif; ?>
    </main><!-- #main -->
<?php
get_footer();