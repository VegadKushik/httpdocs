<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	$enable_form = get_field( 'enable_form' );
	?>

<div class="wwl-subscribe-form" <?= blockStyling( $block ) ?>>
    <div class="container">
        <div class="row">
			<?php if ( $enable_form ) : ?>
            <div class="wwl-subscribe-form__intro col-md-6 col-xl-6 offset-xl-1">
				<?php else: ?>
                <div class="wwl-subscribe-form__intro col-xl-8 offset-xl-2">
					<?php endif; ?>
                    <div class="large-label">
                        <span>subscribe</span>
                    </div>
                    <div class="mb-4"><?php the_field( 'title' ) ?></div>
					<?php if ( get_field( 'button_link' ) ) : ?>
                        <p>
                            <a class="btn btn-primary col-md-9" href="<?php the_field( 'button_link' ) ?>"
                               target="_blank"><?php the_field( 'btn_text' ) ?></a>
                        </p>
					<?php endif; ?>
                </div>
				<?php if ( $enable_form ) : ?>
                    <div class="wwl-subscribe-form__form-container col-md-5 col-xl-4">
                        <?php echo do_shortcode('[contact-form-7 id="3445" html_class="od-subscribe-form" title="Subscribe promo form" ajax="true"]')?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>