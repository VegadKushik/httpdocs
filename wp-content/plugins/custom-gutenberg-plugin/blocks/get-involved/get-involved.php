<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
    ?>
    <section class="home-meet get-involved" <?= blockStyling( $block ) ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto section-intro">
                    <h2 style="color:<?=get_field('get_involved_color','option')?>" id="getinvolved"><?php the_field( 'get_involved_title', 'option' ) ?></h2>
                    <p style="color:<?=get_field('get_involved_color','option')?>"><?php the_field( 'get_involved_content', 'option' ) ?></p>
                </div>
            </div>
        </div>
		<?php
		$inversed = get_field( 'inversed' );
		if ( have_rows( 'get_involved_items' ) ): ?>
        <div class="get-involved-slider slider-get-involved">
<?php while ( have_rows( 'get_involved_items' ) ): the_row();
                    $title_bg = get_field('get_involved_title_bg','option');
                    if(get_sub_field('get_involved_title_bg')) $title_bg = get_sub_field('get_involved_title_bg');
                    ?>
                    <div class="get-involved-slider__slide <?php if ( get_field( 'inversed' ) ) {
						echo "black-and-white";
					} ?>">
                        <img src="<?= get_sub_field( 'image' ) ?>">
                        <div class="title-wrapper" style=";text-align:left;">
                            <a  style="background-color:<?=$title_bg?>;border: 3px solid <?=$title_bg?>" class="title" data-event-action="Click" data-event-category="Homepage Box"
                               data-event-label="Box 1 (text)"
                               href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'title' ) ?></a>
                        </div>
                    </div>
<?php endwhile; ?>
        </div>
		<?php endif; ?>
    </section>
<?php endif; ?>