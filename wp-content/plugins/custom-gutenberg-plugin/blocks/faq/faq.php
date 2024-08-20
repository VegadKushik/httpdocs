<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="faqs">
        <?php if(get_field('title')) { ?>
        <h2 class="text-center"><?=get_field('title')?></h2>
        <?php   } ?>
        <div class="accordion" id="AccordionStandingStrong">
			<?php if ( have_rows( 'question-answer' ) ):
				$i = 0;
				?>
				<?php while ( have_rows( 'question-answer' ) ): the_row();
				$i ++;
				?>
                <div class="card">
                    <div class="card-header" id="heading<?= $i ?>">
                        <h2 class="mb-0">
                            <button aria-controls="collapse<?= $i ?>" aria-expanded="false"
                                    class="btn btn-link collapsed" data-target="#collapse<?= $i ?>"
                                    data-toggle="collapse"
                                    type="button"><?= get_sub_field( 'question' ) ?></button>
                        </h2>
                    </div>
                    <div aria-labelledby="heading<?= $i ?>" class="collapse"
                         data-parent="#AccordionStandingStrong" id="collapse<?= $i ?>">
                        <div class="card-body">
                            <p><?= get_sub_field( 'answer' ) ?></p>
                        </div>
                    </div>
                </div>
			<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>

<?php endif; ?>