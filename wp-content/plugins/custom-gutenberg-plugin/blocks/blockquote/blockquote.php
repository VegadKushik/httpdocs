<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
	<img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
    $side = get_field('side');
	?>
    <div class="pull-<?= $side ?>-wrapper">
        <blockquote><p><?php the_field('quote') ?></p> <cite><?php the_field('author') ?></cite></blockquote>
    </div>
<?php endif; ?>