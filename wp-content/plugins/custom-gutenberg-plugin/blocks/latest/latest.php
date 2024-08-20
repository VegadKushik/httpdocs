<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <section class="latest">
        <div <?= blockStyling($block); ?>">
            <div class="container">
                <div class="features-block__heading">
                    <div class="features-block__heading-contents">
                        <?php if(get_field('title')) { ?>
                        <h3 style="text-align: center;"><?=get_field('title')?></h3>
                        <?php } ?>
                        <?=str_replace('<p>','<p style="text-align: center;">',get_field('text'))?>
                        <?php if (!empty(get_field('button'))) { ?>
                            <a class="btn btn-primary" <?=(get_field('button')['target']?'target="'.get_field('button')['target'].'"':'')?> href="<?=get_field('button')['url']?>"><?=get_field('button')['title']?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>