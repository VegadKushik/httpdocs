<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="row" <?= blockStyling( $block ) ?>>
		<?php
        if ( have_rows( 'btns' ) ): ?>
			<?php while ( have_rows( 'btns' ) ): the_row();
				?>
                <div class="col-md-6">
                    <p class="text-center">
                        <a class="btn btn-<?= get_sub_field('style_button') ?> btn-lg" href="<?= get_sub_field( 'button_link' ) ?>"
                           target="_blank"><?= get_sub_field( 'button_text' ) ?></a>
                    </p>
                </div>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
<?php endif; ?>
