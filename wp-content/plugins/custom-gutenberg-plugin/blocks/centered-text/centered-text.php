<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="features-block__heading" >
        <div class="features-block__heading-contents">
            <?php the_field('content'); ?>
        </div>
    </div>
<?php endif; ?>