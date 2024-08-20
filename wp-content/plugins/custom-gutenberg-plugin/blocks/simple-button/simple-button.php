<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
	<?php if ( get_field( 'center_button' ) ) : ?>
        <p class="text-center">
    <?php endif; ?>

    <a class="btn btn-lg btn-<?php the_field('style_button') ?>" href="<?php the_field( 'btn_link' ) ?>"><?php the_field( 'btn_text' ) ?></a>

    <?php if ( get_field( 'center_button' ) ) : ?>
        </p>
    <?php endif; ?>

<?php endif; ?>