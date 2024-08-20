<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
//	var_dump(get_field('background'));
	?>

    <div class="wwl-trends__section" id="<?= $block['id'] ?>" <?= blockStyling( $block ) ?>>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php the_field('title') ?></h2>
                </div>

                <div class="col-md-9 ml-auto">
                    <?php the_field('content') ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
