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
	$linked_page      = findLinkedPage($countryterm[0], $country);
	$linked_page_link = get_the_permalink( $linked_page );

	$query = new WP_Query(
		array(
			'post_type'    => 'post',
			'tag_id'       => $countryid,
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
							<?php if ( get_field( 'resource_theme' ) ) : ?>
                                <span><?php the_field( 'resource_theme' ) ?></span>
							<?php endif; ?>
							<?php if ( get_field( 'resource_type' ) ) : ?>
                                <span><?php the_field( 'resource_type' ) ?></span>
							<?php endif; ?>
							<?php if ( get_field( 'resource_file_type' ) ) : ?>
                                <span><?php the_field( 'resource_file_type' ) ?></span>
							<?php endif; ?>
                        </div>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <hr>
					<?php the_content(); ?>
                    <p class="text-center"><a href="<?= get_term_link(78) ?>">Back to resources</a></p>
                </div>

            </div>
        </div>
    </section>

<?php
get_footer();
