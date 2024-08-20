<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	$cat = get_field( 'category_to_display' );
	if ( $cat ) {
		$query = new WP_Query( array(
			'tax_query' => array(
				array(
					'taxonomy' => 'resources-cat',
					'field'    => 'id',
					'terms'    => $cat
				)
			),
			'posts_per_page' => - 1
		) );
	}
	// Your block html goes here
	?>
    <section class="features-block" <?= blockStyling( $block ) ?>>
        <div class="container">
			<?php if ( get_field( 'title' ) ) : ?>
                <div class="features-block__heading">
                    <div class="features-block__heading-contents">
                        <h3><?php the_field( 'title' ); ?></h3>
                    </div>
                </div>
			<?php endif; ?>
            <?php if ( get_field( 'text' ) ) : ?>
                <div class="features-block__text">
                    <?php the_field( 'text' ); ?>
                    <br><br>
                </div>
			<?php endif; ?>

            <div class="features-block__listing">
				<?php
				if ( isset( $query ) ) {
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
						?>
                    <?php   if(!empty(get_the_post_thumbnail_url())) { ?>
                        <div class="features-block__item">
                            <div class="features-block__thumbnail">
                                <!-- <a class="title"
                                   href="<?php //the_permalink(); ?>"> -->
									<?php the_post_thumbnail(); ?>
                                <!-- </a> -->
                                <div class="features-block__label">
                                    <span><?php the_title(); ?></span>
                                </div>
                            </div>
                            <div class="features-block__contents">
                                <!-- <a class="title"
                                   href="<?php //the_permalink(); ?>"> -->
                                    <?php the_excerpt(); ?>
                                <!-- </a> -->
								<?php
                                if ( get_field( 'btn_text2', get_the_ID() ) ) : ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a class="btn btn-secondary"
                                               href="<?= get_field( 'btn_link1', get_the_ID() ) ?>"><?= get_field( 'btn_text1', get_the_ID() ) ?>
                                            </a>
                                        </div>
                                        <a class="btn btn-secondary"
                                           href="<?= get_field( 'btn_link2', get_the_ID() ) ?>"><?= get_field( 'btn_text2', get_the_ID() ) ?>
                                        </a>
                                    </div>
								<?php elseif ( get_field( 'btn_text1', get_the_ID() ) ) : ?>
                                    <a class="btn btn-secondary"
                                       href="<?= get_field( 'btn_link1', get_the_ID() ) ?>"><?= get_field( 'btn_text1', get_the_ID() ) ?></a>
								<?php endif; ?>
                            </div>
                        </div>
                    <?php   } ?>
					<?php endwhile; endif;
				} else {
					// Check rows exists.
					if ( have_rows( 'items' ) ):

						// Loop through rows.
						while ( have_rows( 'items' ) ) : the_row(); ?>

                            <div class="features-block__item">
                                <div class="features-block__thumbnail">
                                    <a href="<?= get_sub_field( 'link' ) ?>">
                                        <img alt="<?= get_sub_field( 'title' ) ?>"
                                             src="<?= get_sub_field( 'image' ) ?>">
                                    </a>
                                    <div class="features-block__label">
                                        <span><?= get_sub_field( 'title' ) ?></span>
                                    </div>
                                </div>
                                <div class="features-block__contents">
                                    <a class="title"
                                       href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'excerpt' ) ?></a>
									<?php if ( get_sub_field( 'btn_text2', get_the_ID() ) ) : ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a class="btn btn-secondary"
                                                   href="<?= get_sub_field( 'btn_link1' ) ?>"><?= get_sub_field( 'btn_text1', get_the_ID() ) ?></a>
                                            </div>
                                            <a class="btn btn-secondary"
                                               href="<?= get_sub_field( 'btn_link2' ) ?>"><?= get_sub_field( 'btn_text2', get_the_ID() ) ?></a>
                                        </div>
									<?php elseif ( get_sub_field( 'btn_text1', get_the_ID() ) ) : ?>
                                        <a class="btn btn-secondary"
                                           href="<?= get_sub_field( 'btn_link1' ) ?>"><?= get_sub_field( 'btn_text1', get_the_ID() ) ?></a>
									<?php endif; ?>
                                </div>
                            </div>

						<?php
						endwhile;
					endif;
				}
				?>
            </div>
        </div>
    </section>

<?php endif; ?>