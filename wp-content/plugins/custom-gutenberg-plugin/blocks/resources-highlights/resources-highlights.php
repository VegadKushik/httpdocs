<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
//    die();
	// Your block html goes here
	?>
    <div class="purple <?php if (get_field('add_border_radius')) echo 'add-border-radius'; ?>" <?= blockStyling( $block ) ?>>
        <div class="container">
            <div class="row">
                <div class="features-block__heading-contents">
                    <h2 class="text-center">
                        <span class="white"><?php the_field( 'title' ); ?></span>
                    </h2>
                </div>
            </div>

            <div class="row justify-content-md-center">
				<?php if ( have_rows( 'items' ) ): ?>
					<?php while ( have_rows( 'items' ) ): the_row(); ?>
                        <div class="col-md-2">
                            <a href="<?= get_sub_field( 'link' ) ?>">
                                <img src="<?= get_sub_field( 'image' ) ?>">
                            </a>
                            <p>
                                <a href="<?= get_sub_field( 'link' ) ?>">
                                    <span class="white"><?= get_sub_field( 'title' ) ?></span>
                                </a>
                            </p>
                        </div>
					<?php endwhile; ?>
				<?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>
