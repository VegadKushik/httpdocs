<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:

	$youtubeurl = get_field( 'link_to_youtube' );
	$vimeourl = get_field( 'link_to_vimeo' );
	$second_column = false;

	if ( $youtubeurl ) {
		$embedurl = parseYoutube( $youtubeurl );
	} elseif ( $vimeourl ) {
		$embedurl = parseVimeo( $vimeourl );
	}
	?>
    <div class="responsive-wrapper">
		<?php if ( get_field( 'embed_frame' ) ) : ?>
			<?php the_field( 'embed_frame' ) ?>
		<?php else : ?>
            <iframe
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""
                    src="<?= $embedurl ?>"
                    frameborder="0" height="315"
                    data-gtm-yt-inspected-7530309_41="true" id="15261753"></iframe>
		<?php endif; ?>
    </div>
<?php endif; ?>