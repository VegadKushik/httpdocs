<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="sign-up" <?= blockStyling( $block ) ?>>
        <h4><?php the_field( 'title' ) ?></h4>

        <div class="sign-up__inner">
			<?php the_field( 'content' ) ?>
            <a class="btn btn-primary" href="<?php the_field( 'btn_link' ) ?>"
               target="_blank"><?php the_field( 'btn_text' ) ?></a>
        </div>
    </div>
    <hr>
<?php endif; ?>