<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
// Your block html goes here
	$rows = get_field( 'section' );
	$length = count( $rows );
	?>

	<?php if ( have_rows( 'section' ) ):
	$c = 0;
	?>
	<?php while ( have_rows( 'section' ) ):
	the_row();
    $c++;
	?>
	<?php if ( $c % 2 == 1 ) : ?>
    <div class="row" <?= blockStyling( $block ) ?>>
<?php endif; ?>

    <div class="col-sm-6">
        <h4><?= get_sub_field( 'title' ) ?></h4>
		<?php if ( get_sub_field( 'image' ) ) { ?>
            <figure>
                <img alt="<?= get_sub_field( 'title' ) ?>" src="<?= get_sub_field( 'image' ) ?>">
            </figure>
		<?php } ?>
        <ul>

			<?php
			// Loop over sub repeater rows.
			if ( have_rows( 'items' ) ):
				while ( have_rows( 'items' ) ) : the_row(); ?>

                    <li>
                        <a href="<?= get_sub_field( 'link' ) ?>" target="_blank"><?= get_sub_field( 'label' ) ?></a>
                    </li>

				<?php endwhile;
			endif;
			?>

        </ul>
    </div>

	<?php if ( $c % 2 == 0 ) : ?>
    </div>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<?php endif; ?>
