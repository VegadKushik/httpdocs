<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="row">
        <div class="col-sm-6">
            <h4><?php the_field('title1') ?></h4>

            <div class="responsive-wrapper">
                <div class="youtube_iframe">
                    <iframe allowfullscreen="allowfullscreen" frameborder="0"
                            height="150" src="<?= get_field('video_link1'); ?>"
                            width="300"></iframe>
                </div>
            </div>

            <p><a class="btn btn-primary btn-lg" href="<?php the_field('video_link1') ?>" target="_blank">Download</a></p>
        </div>

        <div class="col-sm-6">
            <h4><?php the_field('title2') ?></h4>

            <div class="responsive-wrapper">
                <div class="youtube_iframe">
                    <iframe allowfullscreen="allowfullscreen" frameborder="0"
                            height="150" src="<?= get_field('video_link2'); ?>"
                            width="300"></iframe>
                </div>
            </div>

            <p>
                <a class="btn btn-primary btn-lg" href="<?php the_field('video_link2') ?>" target="_blank">Download</a>
            </p>
        </div>
    </div>
<?php endif; ?>