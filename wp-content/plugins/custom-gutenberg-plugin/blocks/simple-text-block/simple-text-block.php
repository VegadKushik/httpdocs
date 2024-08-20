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
                <div class="col-xl-10 mr-auto ml-auto">
				<?php the_field( 'content' ); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>