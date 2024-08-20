<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>

    <div class="container">
        <div class="row" <?= blockStyling( $block ) ?>>
            <div class="col-md-12">
                <h2><?php the_field( 'title' ) ?></h2>
            </div>

            <div class="col-md-9 ml-auto wwl-trends__brief"><!-- trends brief - articles -->

				<?php if ( have_rows( 'items' ) ): ?>
					<?php while ( have_rows( 'items' ) ): the_row();
						?>
                        <article>
                            <h6 class="title">
								<?= get_sub_field( 'title' ) ?> <?php if ( get_sub_field( 'number' ) ) : ?>
                                (<span <?php if (get_sub_field('color')) echo 'style="color: '.get_sub_field('color').'"'?>><?= get_sub_field( 'number' ) ?></span>)<?php endif; ?>
                            </h6>

							<?= get_sub_field( 'content' ); ?>
                        </article>
					<?php endwhile; ?>
				<?php endif; ?>


            </div>
        </div>
    </div>
<?php endif; ?>
