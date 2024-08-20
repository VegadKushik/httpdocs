<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
    $random = rand(11111,99999);
	?>

    <section id="id<?=$random?>" class="home-hero alt-hero">
        <div class="home-hero__banner-contents">
            <div id="carIndi" class="carousel slide" data-ride="carousel" data-interval="10000">
                <ol class="carousel-indicators">
                    <li class="active" data-slide-to="0" data-target="#carIndi"></li>
                    <li data-slide-to="1" data-target="#carIndi" class=""></li>
                </ol>
                <div class="carousel-inner">
					<?php if ( have_rows( 'slides' ) ) {
						$i = 0;
						?>
						<?php while ( have_rows( 'slides' ) ): the_row();
							$i ++;
							?>
                            <div class="carousel-item <?php if ( $i === 1 ) {
								echo 'active';
							} ?>">
                                <div class="carousel-overlay"></div>
                                <?php if ( get_sub_field( 'video' ) ) : ?>
                                    <video autoplay muted loop playsinline>
                                        <source src="<?= get_sub_field( 'video' ) ?>" type="video/mp4">
                                    </video>
								<?php else: ?>
									<?php if ( get_sub_field( 'large_image' ) ) : ?>
                                        <picture>
											<?php if ( get_sub_field( 'medium_image' ) ) : ?>
                                                <source media="(max-width:768px)"
                                                        srcset="<?= get_sub_field( 'medium_image' ) ?>">
											<?php endif; ?>
											<?php if ( get_sub_field( 'small_image' ) ) : ?>
                                                <source media="(max-width:375px)"
                                                        srcset="<?= get_sub_field( 'small_image' ) ?>">
											<?php endif; ?>
                                            <img class="d-block" src="<?= get_sub_field( 'large_image' ) ?>">
                                        </picture>
									<?php endif; ?>
								<?php endif; ?>
                                <div class="carousel-caption <?= get_sub_field( 'text_position' ) ?>">
                                    <div class="page-hero__banner-title"><?= get_sub_field( 'title' ) ?></div>
                                    <p class="home-hero__banner-description"><?= get_sub_field( 'subtitle' ) ?></p>
									<?php if ( get_sub_field( 'button_text' ) && get_sub_field( 'button_link' ) ) : ?>
                                        <p>
                                            <a class="btn btn-primary"
                                               href="<?= get_sub_field( 'button_link' ) ?>"><?= get_sub_field( 'button_text' ) ?></a>
                                        </p>
									<?php endif; ?>
                                </div>
                            </div>
						<?php endwhile; ?>
                        </ul>
					<?php } ?>
                </div>
                <a class="carousel-control-prev" data-slide="prev" href="#carIndi" role="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" data-slide="next" href="#carIndi" role="button">
                    <span class="sr-only">Next</span>
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>
    <?php if(get_field('enable_overlay_image')) { ?>
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
