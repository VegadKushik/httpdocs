<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <section class="standard-page" role="document">
        <div class="container">
            <div class="row">
                <h1><?php the_field( 'title' ) ?></h1>
				<?php the_field( 'content' ); ?>
				<?php if ( get_field( 'button_link' ) && get_field( 'button_text' ) ) : ?>
                    <a class="btn btn-lg btn-primary"
                       href="<?php the_field( 'button_link' ) ?>"><?php the_field( 'button_text' ) ?></a>
				<?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>