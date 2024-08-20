<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	$youtubeurl = get_field( 'link_to_youtube' );
	$vimeourl = get_field( 'link_to_vimeo' );
	$second_column = false;

	if ( get_field( 'image' ) ) {

	} elseif ( $youtubeurl ) {
		$query_str = parse_url( $youtubeurl, PHP_URL_QUERY );
		parse_str( $query_str, $query_params );
		$youtube_id = $query_params['v'];
		$embedurl   = 'https://www.youtube.com/embed/' . $youtube_id . '?enablejsapi=1&amp';
	} elseif ( $vimeourl ) {
		$vimeoid  = str_replace( '/', '', parse_url( $vimeourl, PHP_URL_PATH ) );
		$embedurl = 'https://player.vimeo.com/video/' . $vimeoid;
	}
	?>
    <section class="standard-page" role="document">
        <div class="container">
			<?php if ( get_field( 'toptitle' ) ) : ?>
                <div class="features-block__heading">
                    <div class="features-block__heading-contents">
                        <h3><?php the_field( 'toptitle' ) ?></h3>
                    </div>
                </div>
			<?php endif; ?>

            <div class="row <?php if ( get_field( 'reverse' ) ) {
				echo 'flex-row-reverse';
			} ?>">
                <div class=" <?php if ( get_field( 'reverse' ) ) {
	                echo 'col-xl-6 ml-auto';
                }else {
                    echo 'col-xl-5';
                } ?>">
					<?php
//                    var_dump($block);
                    if ( get_field( 'lefttitle' ) ) : ?>
                        <h3><?php the_field( 'lefttitle' ) ?></h3>
					<?php endif; ?>
					<?php the_field( 'content' ); ?>
					<?php if ( get_field( 'button_link1' ) ) : ?>
                        <p>
                            <a class="btn btn-primary btn-lg"
                               href="<?php the_field( 'button_link1' ) ?>"><?php the_field( 'button_text1' ) ?></a>
							<?php if ( get_field( 'button_link2' ) ) : ?>
                                <a class="btn btn-primary btn-lg"
                                   href="<?php the_field( 'button_link2' ) ?>"><?php the_field( 'button_text2' ) ?></a>
							<?php endif; ?>
                        </p>
					<?php endif; ?>
                </div>
                <div class="<?php if ( get_field( 'reverse' ) ) {
	                echo 'col-xl-5';
                }else {
	                echo 'col-xl-6 ml-auto';
                } ?>">
					<?php if ( get_field( 'image' ) ) : ?>
                        <figure>
							<?php if ( get_field( 'button_link1' ) ) : ?>
                                <a href="<?php the_field( 'button_link1' ) ?>">
                            <?php endif; ?>
                                <img src="<?php the_field( 'image' ) ?>" alt="">

                            <?php if ( get_field( 'button_link1' ) ) : ?>
                                </a>
						    <?php endif; ?>

                            <?php if ( get_field( 'figcaption' ) ) : ?>
                                <figcaption><?php the_field( 'figcaption' ) ?></figcaption>
							<?php endif; ?>
                        </figure>
					<?php elseif ( get_field( 'embed_frame' ) ) : ?>
                        <div class="responsive-wrapper">
							<?php the_field( 'embed_frame' ) ?>
                        </div>
					<?php else: ?>
                        <div class="responsive-wrapper">
                            <iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen="" frameborder="0" height="315"
                                    src="<?= $embedurl ?>"
                                    data-gtm-yt-inspected-7530309_41="true" id="15261753"></iframe>
                        </div>
					<?php endif; ?>

					<?php if ( get_field( 'button_link1r' ) ) : ?>
                        <p class="text-center">
                            <a class="btn btn-primary btn-lg"
                               href="<?php the_field( 'button_link1r' ) ?>"><?php the_field( 'button_text1r' ) ?></a>
                        </p>
					<?php endif; ?>
                </div>
            </div>
    </section>
<?php endif; ?>
