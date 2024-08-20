<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package test
 */

get_header();
the_post();
$post_id = get_the_ID();

$countryterm = wp_get_post_tags( get_the_ID() );
if ( count( $countryterm ) ) {
	$country          = $countryterm[0]->name;
	$countryid        = $countryterm[0]->term_id;
	$linked_page      = findLinkedPage( $countryterm[0], $country );
	$linked_page_link = get_the_permalink( $linked_page );

	$query = new WP_Query(
		array(
			'post_type'    => 'post',
			'tag_id'       => $countryid,
			'cat'          => 36,
			'post__not_in' => [ $post_id ]
		)
	);
};
$post_format = wp_get_post_terms( get_the_ID(), 'post_formats' );
global $post;
?>

    <section class="standard-page story" role="document">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 ml-auto mr-auto">
                    <!-- Note the following elements are flexible to use wherever you wish within this container to build a page -->
                    <!--             I've combined both the story variant and story variant 2 and you can use the various elements interchangeably -->
                    <div class="story__header-info">
                        <div class="category small-label">
							<?php if ( count( $post_format ) ) : ?>
                                <span><?= $post_format[0]->name; ?></span>
							<?php endif; ?>
                        </div>
                        <small><?= get_the_date( 'd F Y' ) ?></small>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <hr>
					<?php get_template_part( 'template-parts/content', 'topauthor' ) ?>
					<?php the_content(); ?>
                </div>

            </div>
        </div>
    </section>

<?php if ( get_field( 'write_content' ) && get_field( 'give_content' ) ) : ?>
    <section class="story-action-boxes">
        <div class="container">
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row row-eq-height">
                <div class="col-md-6 d-flex">
                    <div class="story-action-boxes__box flex-grow-1">
                        <div class="small-label"><span><?php the_field( 'write_title' ) ?></span></div>
						<?php the_field( 'write_content' ) ?>
                        <p>
                            <a class="btn btn-lg btn-primary"
                               href="<?php the_field( 'write_button_link' ) ?>">Write today</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="story-action-boxes__box alternative flex-grow-1">
                        <div class="small-label"><span>Please give</span><br>&nbsp;</div>
						<?php the_field( 'give_content' ) ?>
                        <p>
                            <a class="btn btn-lg btn-primary" href="<?php the_field( 'give_button_link' ) ?>">Give
                                today</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <section class="share-this-story">
        <div class="share-this-story__label">Share this story</div>
		<?php share_btns( $post, 'share-this-story__buttons' ); ?>
    </section>

<?php if ( isset( $country ) ) : ?>

	<?php if ( $query->have_posts() ) : ?>
        <section class="more-stories">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>
                <div class="row row-eq-height">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h4>Latest stories from <?= $country ?></h4>
                        <div class="more-stories__listing">

							<?php
							if ( $query ) :
								while ( $query->have_posts() ) : $query->the_post(); ?>

                                    <article>
                                        <div class="summary-details"><?= $country ?>
                                            | <?= get_the_date( 'd F Y' ) ?></div>
                                        <div class="excerpt">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>
                                    </article>

								<?php endwhile;
							endif;
							?>

							<?php if ( isset( $linked_page_link ) ) : ?>
                                <a href="<?= $linked_page_link ?>" class="view-more">View <?= $country ?> country
                                    page</a>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>

<?php endif; ?>
<?php
get_footer();
