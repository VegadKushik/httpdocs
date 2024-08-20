<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	$title = get_field( 'title' ) ?: get_the_title();
	// Your block html goes here
	?>
    <div class="container">
        <div class="row" <?= blockStyling( $block ) ?>>
            <div class="col-lg-8 ml-auto mr-auto">
                <h1><?= $title ?></h1>
            </div>
        </div>

        <div class="row wwl-trends__banner">
            <div class="col">
				<?php the_post_thumbnail(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>