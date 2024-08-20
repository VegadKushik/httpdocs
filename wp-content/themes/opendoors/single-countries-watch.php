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

$countryterm = wp_get_post_categories( get_the_ID() );
$countryname = get_the_title();
$linked_page = findLinkedPage( get_the_ID(), $countryname );
if ( $linked_page ) {
	$linked_page_link = get_the_permalink( $linked_page );
}
$post_id     = get_the_ID();
$linked_term = get_term_by( 'name', get_the_title(), 'post_tag' ) ? get_term_by( 'name', get_the_title(), 'post_tag' )->term_id : false;

if ( $linked_term ) {
	$query = new WP_Query(
		array(
			'post_type'    => 'post',
			'tag_id'       => $linked_term,
			'post__not_in' => [ $post_id ],
			'cat'          => 36
		)
	);
}

global $post;
?>
    <section class="breadcrumbs">
        <div class="container">
            <a href="<?php the_permalink( 308 ); ?>" class="back-link">Back to main list</a>
        </div>
    </section>

    <section class="standard-page wwl-country" role="document">
        <!-- WWL page intro -->
        <div class="container">
            <div class="wwl-country__header">
                <div class="mr-auto">
                    <h1><?php the_title(); ?></h1>
                </div>

                <div class="wwl-country__rank">
                    <span class="wwl-country__ranking-label"> World Watch:</span>
                    <span class="wwl-country__ranking <?php the_field( 'color' ) ?>"><?= $post->menu_order + 1 ?></span>
                </div>
            </div>

            <div class="row">
                <!--- side column -->
                <div class="col-md-4 col-lg-3">

                    <!-- country thumbnail image -->
					<?php if ( get_field( 'sidebar_image' ) ) : ?>
                        <div class="wwl-country__thumbnail">
                            <?=!empty(get_field('map_frame'))?get_field('map_frame'):''?>
                            <!-- <img src="<?php the_field( 'sidebar_image' ); ?>" alt="<?php the_title(); ?>"> -->
                            <div class="bar" data-percent="<?php the_field( 'percent' ) ?>%">
                                <span>100</span>
                                <div class="bar-in">
                                    <p data-percent="<?php the_field( 'percent' ) ?>"
                                       class="<?php the_field( 'color' ) ?>"></p>
                                </div>
                                <span>0</span>
                            </div>
                        </div>
					<?php endif; ?>

					<?php if ( have_rows( 'sidebar_items' ) ): ?>
                        <div class="wwl-country__core-info">

							<?php while ( have_rows( 'sidebar_items' ) ): the_row();
								?>
                                <h6><?= get_sub_field( 'title' ) ?></h6>
								<?= get_sub_field( 'text' ) ?>
                                <hr>
							<?php endwhile; ?>
                        </div>
					<?php endif; ?>

                    <?php
                    if (isset($query) && $query->have_posts()) :
                        $news_count = 0; // Ініціалізуємо лічильник новин
                    ?>
                        <div class="wwl-country__news-listing d-lg-block d-none">
                            <h6>Latest news</h6>
                            <?php while ($query->have_posts() && $news_count < 5) : $query->the_post(); ?>
                                <article>
                                    <div class="summary-details"><?= $countryname ?> | <?= get_the_date('d F Y'); ?></div>
                                    <div class="excerpt">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                </article>
                            <?php
                                $news_count++; // Збільшуємо лічильник після виведення кожної новини
                            endwhile;
                            wp_reset_postdata(); // Скидаємо дані пошуку, щоб не впливати на наступний запит
                            ?>
                            <a href="/category/latest-news/" class="view-more">View more</a>
                        </div>
                    <?php endif;
					wp_reset_postdata();
					?>

					<?php if ( get_field( 'highlighted_title' ) ) : ?>
                        <div class="wwl-country__highlighted-stat-box">
                            <div class="stat"><?php the_field( 'highlighted_title' ) ?></div>
							<?php if ( get_field( 'highlighted_desc' ) ) : ?>
                                <div class="description"><?php the_field( 'highlighted_desc' ) ?></div>
							<?php endif;
							if ( get_field( 'link_to_donate' ) ) : ?>
                                <p><a class="btn btn-secondary btn-lg view-more"
                                      href="<?php the_field( 'link_to_donate' ) ?>">Give a gift</a></p>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
                    <!-- share buttons -->
                    <div class="wwl-country__share-buttons">
                        <h6>Share</h6>
						<?php share_btns( $post ); ?>
                    </div>
                    <!-- // share buttons -->
                </div>
                <!--- // side column -->

                <!-- main column -->
                <div class="col-md-8 ml-auto">
                    <div class="wwl-country__featured-image">
						<?php the_post_thumbnail( 'full' ); ?>
                    </div>

                    <div class="wwl_country__main-content">

						<?php the_content(); ?>
                    </div>

                    <?php if (isset($query) && $query->have_posts()) :
                        $news_count = 0; // Ініціалізуємо лічильник новин
                    ?>
                        <div class="wwl-country__news-listing d-lg-none d-block mt-4">
                            <h6>Latest news</h6>
                            <?php while ($query->have_posts() && $news_count < 5) : $query->the_post(); ?>
                                <article>
                                    <div class="summary-details"><?= $countryname ?> | <?= get_the_date('d F Y'); ?></div>
                                    <div class="excerpt">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                </article>
                            <?php
                                $news_count++; // Збільшуємо лічильник після виведення кожної новини
                            endwhile;
                            wp_reset_postdata(); // Скидаємо дані пошуку, щоб не впливати на наступний запит
                            ?>
                            <a href="/category/latest-news/" class="view-more">View more</a>
                        </div>
                    <?php endif;
					wp_reset_postdata();
					?>
                </div>
                <!-- // main column -->
            </div>
        </div>
    </section>
<?php
get_footer();