<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
	<img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <section class="tagline" <?= blockStyling( $block ) ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <h1><?php the_field('tagline') ?></h1>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>