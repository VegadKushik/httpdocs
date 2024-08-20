    <?php
    // Image preview when the block is in the list of blocks
    if ( @$block['data']['preview_image_help'] ) : ?>
        <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
    <?php else:
        // Your block html goes here
       
        ?>
        <section class="get-involved" <?= blockStyling( $block ) ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto section-intro">
                        <h2><?php the_field( 'title' ) ?></h2>
                        <p><?php the_field( 'content' ) ?></p>
                    </div>
                </div>
            </div>
            <div class="slider-meet">
                <?php if ( have_rows( 'items' ) ): ?>
                    <?php while ( have_rows( 'items' ) ): the_row();
                        ?>
                        <div class="meet-slider__slide <?=!get_sub_field( 'enable_overlay')?'disabled':''?>">
                            <a href="<?= get_sub_field( 'link' ) ?>">
                                <img src="<?= get_sub_field( 'image' ) ?>">
                            </a>
							<div class="meet-slider__details">
                                <span style="background-color:<?=get_sub_field( 'button_bg_color' ) ?>" class="name  <?= get_sub_field( 'location' ) ? get_field( 'color', get_sub_field( 'location' )->ID ) : '' ?>"><?= get_sub_field( 'title' ) ?></span>
                                <span class="location"><?= get_sub_field( 'location' ) ? get_sub_field( 'location' )->post_title : '' ?></span>
                                <div class="extra"><?= get_sub_field( 'content' ); ?><br><br>
                                    <?php if(get_sub_field( 'link' ) && get_sub_field( 'link_title' )) { ?>
                                    <a href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'link_title' ) ?></a>
                                    <?php   } ?>
                                </div>
                            </div>
                            <div class="meet-slider__gradient">&nbsp;</div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>