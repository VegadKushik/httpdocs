<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="col-lg-12 latest__prayer pl-3" <?= blockStyling( $block ) ?>>
        <div class="row"><!--<div class="col-md-6">
            <p><strong>Post a prayer.</strong>&nbsp;In response to what you've seen and heard post a prayer to stand with Christians living where faith really costs. Pick a story or a place to pray for - please add your name and town/city at the end of your
              prayer.</p>

            <div class="cta-box">
              <iframe frameborder="0" height="223" scrolling="yes" seamless="seamless" src="https://www.cognitoforms.com/f/JNNK9dLOYUCDB0W6M0DV9w?id=69" style="position:relative;width:1px;min-width:100%;" width="100%"></iframe>
              <script src="https://www.cognitoforms.com/scripts/embed.js"></script>
            </div>
          </div>-->
            <div class="col-lg-12 pl-5 pr-5">
				<?php the_field( 'content' ) ?>
				<?php echo do_shortcode( '[contact-form-7 id="879" title="Newsletter form" html_class="od-subscribe-form"]' ) ?>
            </div>
        </div>
    </div>
<?php endif; ?>