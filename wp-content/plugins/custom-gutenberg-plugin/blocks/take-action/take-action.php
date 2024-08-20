<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="take-action" <?= blockStyling( $block ) ?>>
        <h4><?php the_field('title'); ?></h4>

        <div class="tns-outer" id="tns2-ow">
            <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span
                        class="current">1</span> of 1
            </div>
            <div id="tns2-mw" class="tns-ovh">
                <div class="tns-inner" id="tns2-iw">
                    <div class="take-action__listing" id="tns2">
                        <article class="tns-item tns-slide-active" id="tns2-item0">
                            <div class="wrapper">
                                <div class="thumbnail">
                                    <a href="<?php the_field('link') ?>">
                                        <img src="<?php the_field('image') ?>">
                                    </a>
                                </div>

                                <div class="content">
                                    <div class="excerpt">
                                        <a href="<?php the_field('link') ?>" target="_blank"><?php the_field('excerpt_text') ?></a>
                                    </div>
                                </div>
                                <div class="cta">
                                    <a class="btn btn-secondary ml-auto"
                                       href="<?php the_field('link') ?>"><?php the_field('btn_name') ?></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>