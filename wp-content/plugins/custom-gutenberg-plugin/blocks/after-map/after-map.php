<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <div class="container-fluid wwl__map-related-content" <?= blockStyling( $block ) ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 wwl__map-index">
                    <h2><?php the_field( 'title' ); ?></h2>
					<?php
					$countries1 = get_posts( array(
						'post_type'      => 'countries-watch',
						'posts_per_page' => 10
					) );
					$countries2 = get_posts( array(
						'post_type'      => 'countries-watch',
						'posts_per_page' => 20,
						'offset'         => 10
					) );
					$countries3 = get_posts( array(
						'post_type'      => 'countries-watch',
						'posts_per_page' => 20,
						'offset'         => 30
					) );
                    $countries = get_posts( array(
                        'post_type'      => 'countries-watch',
                        'posts_per_page' => - 1
                    ) );
					?>
                    <div class="row wwl__rankings">
                        <div class="col-md-4">
                            <ol class="wwl__rankings-list first-column js-apply-links-list">
								<?php foreach ( $countries1 as $country ) : ?>
                                    <li class="<?php echo get_field('number_color', $country->ID); ?>">
                                        <a href="<?php the_permalink( $country->ID ); ?>"><?= $country->post_title ?></a>
                                    </li>
								<?php endforeach; ?>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <ol class="wwl__rankings-list second-column js-apply-links-list">
								<?php foreach ( $countries2 as $country ) : ?>
                                    <li class="<?= get_field( 'persecution_level', $country->ID ); ?> <?php echo get_field('number_color', $country->ID); ?>">
                                        <a href="<?php the_permalink( $country->ID ); ?>"><?= $country->post_title ?></a>
                                    </li>
								<?php endforeach; ?>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <ol class="wwl__rankings-list third-column js-apply-links-list">
								<?php foreach ( $countries3 as $country ) : ?>
                                    <li class="<?= get_field( 'persecution_level', $country->ID ); ?> <?php echo get_field('number_color', $country->ID); ?>">
                                        <a href="<?php the_permalink( $country->ID ); ?>"><?= $country->post_title ?></a>
                                    </li>
								<?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                    <div class="wwl__map-key">
                        <p>
                            <strong>Levels of persecution:</strong>
                        </p>
                        <ul>
                            <li class="extreme"><span>&nbsp;</span> Extreme</li>
                            <li class="very-high"><span>&nbsp;</span> Very High</li>
                        </ul>
                    </div>
                    <div class="d-md-none od-dropdown dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle"
                                data-toggle="dropdown" id="dropdown-menu-btn" type="button">Jump to a country profile
                        </button>
                        <div aria-labelledby="dropdown-menu-btn" class="dropdown-menu scrollable-menu" role="menu">
                            <?php foreach ( $countries as $country ) : ?>
                                <a class="dropdown-item"
                                   href="<?php the_permalink( $country->ID ); ?>"><?= get_the_title( $country->ID ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3  offset-xl-1 wwl__map-side">
                    <div class="wwl__highlighted-stat-box">
                        <div class="stat"><?php the_field( 'trends_number' ) ?></div>
                        <div class="description"><?php the_field( 'trends_text' ); ?></div>
                        <a class="link view-more"
                           href="<?php the_field( 'trends_button_link' ) ?>"><?php the_field( 'trends_button_text' ) ?></a>
                    </div>
					<?php if ( have_rows( 'products' ) ): ?>
						<?php while ( have_rows( 'products' ) ): the_row();
							?>
                            <div class="wwl__order-resources-box">
                                <div class="thumbnail d-flex">
                                    <a href="<?= get_sub_field( 'link' ) ?>">
                                        <img src="<?= get_sub_field( 'image' ) ?>">
                                    </a>
                                    <span><?= get_sub_field( 'title' ); ?></span>
                                </div>

								<?php if ( get_sub_field( 'btn_text' ) ) : ?>
                                    <a class="btn btn-lg btn-secondary"
                                       href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'btn_text' ) ?></a>
								<?php endif; ?>

								<?php if ( get_sub_field( 'link_text' ) ) : ?>
                                    <a class="link view-more"
                                       href="<?= get_sub_field( 'link' ) ?>"><?= get_sub_field( 'link_text' ) ?></a>
								<?php endif; ?>
                            </div>
						<?php endwhile; ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>