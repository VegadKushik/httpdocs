<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	$side = get_field( 'side' );
	?>
    <div class="float-<?= $side ?>-wrapper">
        <img alt="<?php the_title(); ?>" src="<?php the_field( 'image' ) ?>">
		<?php if ( get_field( 'button_link' ) ) : ?>
            <p class="text-center">
                <a class="btn btn-lg btn-primary" href="<?php the_field( 'button_link' ) ?>"><?php the_field( 'button_text' ) ?></a>
            </p>
		<?php endif; ?>
    </div>
<?php endif; ?>