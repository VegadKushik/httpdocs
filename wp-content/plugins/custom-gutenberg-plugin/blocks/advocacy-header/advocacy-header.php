<?php
/**
 * Advocacy header
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
	// Your block html goes here
	?>
    <div class="advocacy__header container mt-3" <?php if ( $is_preview && !isset($block['backgroundColor']) ) {
         echo 'style="padding: 30px 0; background: #ccc"';
    } ?>>
        <InnerBlocks/>
    </div>
<?php endif; ?>
