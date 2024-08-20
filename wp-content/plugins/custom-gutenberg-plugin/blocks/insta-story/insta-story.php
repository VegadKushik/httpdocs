<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="row">
        <div class="ml-auto mr-auto overflow-hidden">
            <h3 class="text-center"><?php the_field( 'title' ); ?></h3>
			<?php if ( get_field( 'subtitle' ) ) : ?>
                <p class="text-center"><?php the_field( 'subtitle' ) ?></p>
			<?php endif; ?>
            <ul class="insta-story d-flex">
				<?php
                $query = new WP_Query(
					array(
						'post_type'      => 'insta-stories',
						'posts_per_page' => 5,
                        'post__in' => get_field('stories')
					)
				) ?>
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <span><?php the_title(); ?></span>
                        </a>
                    </li>
				<?php endwhile; ?>
				<?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>