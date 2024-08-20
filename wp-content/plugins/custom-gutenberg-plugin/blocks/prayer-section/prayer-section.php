<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="wwl-country__feature-box" <?= blockStyling( $block ) ?>>
        <div class="small-label"><span>please pray</span></div>

		<?php the_field( 'content' ) ?>
    </div>
<?php endif; ?>