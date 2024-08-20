<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	$title = get_field( 'title' ) ?: 'Handy Resources';
	?>

    <div class="resource-downloads">
        <h2 class="text-center"><?= $title ?></h2>

        <div class="resource-downloads__listing">

			<?php if ( have_rows( 'items' ) ): ?>
				<?php while ( have_rows( 'items' ) ): the_row();
					?>
                    <div class="resource-downloads__item">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?= get_sub_field( 'file' ) ?>"><?= get_sub_field( 'label' ) ?></a>
                            </div>
                        </div>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>

        </div>
    </div>

<?php endif; ?>
