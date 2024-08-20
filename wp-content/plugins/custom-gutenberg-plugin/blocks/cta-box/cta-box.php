<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="pull-<?=get_field('side')?get_field('side'):'right'?>-wrapper">
        <div class="cta-box">
            <div class="stat"><?php the_field('title') ?></div>

            <div class="description"><?php the_field('description') ?></div>
            <a class="btn btn-secondary btn-lg view-more"
               href="<?php the_field('btn_link') ?>"><?php the_field('btn_text') ?></a>
        </div>
    </div>
<?php endif; ?>