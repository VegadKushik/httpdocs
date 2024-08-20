<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="row mb-5" <?php if ( is_admin() && !isset($block['backgroundColor']) ) {
		echo 'style="padding: 30px 0; background: #ccc"';
	} ?>>
		<?php the_field( 'squarechart_html' ) ?>

		<?php the_field( 'squarechart_js' ); ?>
    </div>
<?php endif; ?>