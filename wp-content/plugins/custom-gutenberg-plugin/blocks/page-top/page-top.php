<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	$title = get_field( 'title' ) ?: get_the_title();
    $random = rand(11111,99999);
	?>
        <section id="id<?=$random?>" class="home-hero alt-hero">
            <div class="page-hero__banner-contents alt-hero__banner-contents">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-6 mr-auto">
                            <div class="page-hero__banner-title"><?= $title ?></div>
                            <?php echo str_replace('<p>','<p class="home-hero__banner-description">',get_field( 'content' )); ?></p>
							<?php if ( get_field( 'button_link2' ) && get_field( 'button_text2' ) ) : ?>
                                <div class="row btns-row-withcol">
                                    <div class="col-sm-6">
                                        <a class="btn btn-primary" href="<?php the_field( 'button_link' ) ?>">
											<?php the_field( 'button_text' ) ?>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn btn-primary" href="<?php the_field( 'button_link2' ) ?>">
											<?php the_field( 'button_text2' ) ?>
                                        </a>
                                    </div>
                                </div>
							<?php elseif ( get_field( 'button_link' ) && get_field( 'button_text' ) ) : ?>
                                <p>
                                    <a class="btn btn-primary" href="<?php the_field( 'button_link' ) ?>">
										<?php the_field( 'button_text' ) ?>
                                    </a>
                                </p>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

			<?php if ( get_field( 'bg' ) && is_array( get_field( 'bg' ) ) ) : ?>
            <div class="img-wrap">
                <img src="<?= wp_get_attachment_image_url( get_field( 'bg' )['id'], 'full' ) ?>"
                     style="object-position: <?= get_field( 'bg' )['left'] ?>% <?= get_field( 'bg' )['top'] ?>%;"
                     alt="">
            </div>
			<?php else: ?>
                <video autoplay muted loop>
                    <source src="<?php the_field( 'video' ) ?>" type="video/mp4">
                </video>
			<?php endif; ?>
        </section>
    <?php if(get_field('page_top_enable_overlay')) { ?>
    <style>
        #id<?=$random?> {
            position: relative;
        }
        #id<?=$random?>::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index:1;
        }
    </style>
    <?php   } ?>
<?php endif; ?>
