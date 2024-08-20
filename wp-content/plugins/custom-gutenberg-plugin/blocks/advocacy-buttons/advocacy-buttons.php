<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="link-buttons" <?= blockStyling( $block ) ?>>
		<?php while ( have_rows( 'btns' ) ): the_row(); ?>
            <a class="button" href="<?= get_sub_field('link') ?>"><?= get_sub_field('text') ?></a>
		<?php endwhile; ?>
    </div>
<?php endif; ?>