<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
    // Your block html goes here
    ?>
    <div class="features-block__heading" <?= blockStyling( $block ) ?>>
        <div class="features-block__heading-contents">
            <h3><?php the_field('title') ?></h3>

            <p><strong><?php the_field('subtitle') ?></strong></p>
        </div>
    </div>
<?php endif; ?>