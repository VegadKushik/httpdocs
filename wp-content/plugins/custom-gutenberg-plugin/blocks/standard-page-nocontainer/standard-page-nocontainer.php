<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <section class="standard-page <?= $block['className'] ?>"
             role="document" <?php if ( is_admin() && ! isset($block['backgroundColor']) ) {
		echo 'style="padding: 30px 0; background: #ccc"';
	} else {
		echo blockStyling( $block );
	} ?>>
        <InnerBlocks/>
    </section>
<?php endif; ?>