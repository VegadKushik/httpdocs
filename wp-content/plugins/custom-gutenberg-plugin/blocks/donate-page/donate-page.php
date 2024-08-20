<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <section class="alternative-page donate-step-one" role="document">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center text-uppercase"><?php the_field( 'title' ) ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="donate-banner position-relative">
						<?php if ( get_field( 'banner_video' ) ) : ?>
                            <video autoplay muted loop class="_absolute-image">
                                <source type="video/mp4" src="<?php the_field( 'banner_video' ) ?>">
                            </video>
						<?php else: ?>
                            <img class="_absolute-image" src="<?php the_field( 'banner' ) ?>" alt="">
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <style>
                .temp-head {
                    margin-top: 30px
                }

                .hidden {
                    display: none;
                }
            </style>
            <div class="row hidden" style="display: none">
                <div class="col-lg-8 ml-auto mr-auto">
                    <div class="donate-step-one__form-wrapper">
                        <div class="donate-step-one__form">
                            <div class="donate-step-one__donation-type btn-group" role="group">
                                <a href="?period=monthly" id="monthly"
                                   class="btn btn-secondary <?php if ( ! isset( $_GET['period'] ) || $_GET['period'] == 'monthly' ) {
									   echo 'active';
								   } ?>">
                                    Monthly
                                </>
                                <a href="?period=once" id="once"
                                   class="btn btn-secondary <?php if ( isset( $_GET['period'] ) && $_GET['period'] == 'once' ) {
									   echo 'active';
								   } ?>">Once
                                </a>
                            </div>
                            <select name="" id="SelectedFund" class="form-control valid" aria-invalid="false"
								<?php if ( isset( $_GET['period'] ) && $_GET['period'] !== 'once' ) : ?> disabled="" style="appearance: none" <?php endif; ?>>
                                <option value="Where Most Needed">Where Most Needed</option>
								<?php
								$posts = get_posts( array(
									'post_type'      => 'donations',
									'posts_per_page' => - 1
								) );
								?>
								<?php foreach ( $posts as $post ) : ?>
                                    <option value="<?= $post->post_title ?>"><?= $post->post_title ?></option>
								<?php endforeach; ?>
                            </select>
                            <div class="donate-step-one__options">
								<?php if ( have_rows( 'items' ) ): ?>
									<?php while ( have_rows( 'items' ) ): the_row();
										?>
                                        <div class="option">
                                            <div class="thumbnail one">
                                                <span class="header">£<?= get_sub_field( 'amount' ) ?></span>
                                                <img class="_absolute-image"
                                                     src="<?= get_sub_field( 'image' ) ?>"
                                                     alt="">
                                            </div>
                                            <span><?= get_sub_field( 'text' ) ?></span>
                                        </div>
									<?php endwhile; ?>
								<?php endif; ?>
                            </div>
                            <div id="PurchaseSummary" class="donate-step-one__amount-box">
                                <label id="amount" for="amount">Enter amount</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input name="" type="text" value="" id="" class="form-control" placeholder="0.00">
                                </div>
                            </div>
                            <input type="button" value="Next" id="NextButton"
                                   class="btn btn-primary button next submit-btn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
