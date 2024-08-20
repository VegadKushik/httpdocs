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
            <?php foreach(get_field('list_items') as $item) {?>
            <div class="col-md-5 mr-auto">
                <h4 class="video-header"><?=$item['title']?></h4>

                <div class="responsive-wrapper">
                    <?=$item['video-iframe']?>
                </div>
                <p class="video-button"><a class="btn btn-primary" href="<?=$item['video-link']?>"><?php esc_html_e('Download','opendoors'); ?></a></p>
            </div>
            <?php } ?>
            <div class="col-md-5 mr-auto">
                <h3><?=get_field('last_item_title')?></h3>
                <?=get_field('last_item_text')?>
                <?php if(get_field('last_item_button')['title']&&get_field('last_item_button')['url']) { ?>
                <p><a class="btn btn-primary" target="<?=get_field('last_item_button')['title']?>" href="<?=get_field('last_item_button')['url']?>"><?=get_field('last_item_button')['title']?></a></p>
                <?php   } ?>
            </div>
        </div>
            <hr>
        </div>
    </section>
<?php endif; ?>