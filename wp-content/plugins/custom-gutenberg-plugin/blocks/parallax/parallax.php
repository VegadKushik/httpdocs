<?php
/**
 * Parallax block
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */
// Image preview when the block is in the list of blocks
if ( $is_preview ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
    $random = rand(11111, 99999);
	// Your block html goes here
	?>
    <div id="id<?=$random?>" class="parallax-container <?php the_field( 'mode' ) ?>" data-parallax="scroll" data-position="top"
         data-image-src="<?php the_field( 'parallax_image' ) ?>"
    <?php if (is_admin()) echo 'style="padding: 30px 0; background: #ccc"';?>
    >
		<?php if ( get_field( 'title' ) || get_field('content') ) : ?>
            <section class="standard-page" role="document">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 ml-auto mr-auto">
                            <h1 class="white"><?php the_field( 'title' ) ?></h1>
							<?php if ( get_field( 'image' ) ) : ?>
                                <div class="float-right-wrapper">
                                    <img alt="<?php the_field( 'title' ) ?>" src="<?php the_field( 'image' ) ?>">
                                </div>
							<?php endif; ?>
                            <div class="white">
								<?php the_field( 'content' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		<?php endif; ?>
    </div>
    <?php if(get_field('enable_overlay')) { ?>
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
            z-index:-1;
        }
    </style>
<?php   } ?>
<?php endif; ?>
