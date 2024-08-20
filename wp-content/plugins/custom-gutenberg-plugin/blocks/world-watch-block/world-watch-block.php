<?php
//Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
	// Your block html goes here
	?>
    <section class="home-wwl" <?= blockStyling( $block ) ?>>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto section-intro">
                    <h2><?php the_field( 'title' ) ?></h2>
                    <p><?php the_field( 'content' ); ?></p>
                </div>
            </div>
            <div class="mobile-map">
                <?php if(get_field( 'mobile_map' )) { ?>
                <img alt="World Watch List Map" src="<?php the_field( 'mobile_map' ) ?>">
                <?php   } ?>
                <div class="map mobile">
                    <?php
                    $countries = get_countries();
                    $code_countries = [];
                    foreach($countries as $country) $code_countries[$country['code']] = ['path' => $country['path'], 'title' => isset($country['title'])?$country['title']:'' ];
                    $countries = countries_data($code_countries);
                    ?>
                    <svg viewBox="0 0 1009 652">
                        <?php foreach($countries as $code=>$country) { ?>
                            <a href="<?php mapLink( $code ); ?>">
                                <?php mapTitle( $code ); ?>
                                <?php
                                if(!empty($country['color'])) echo str_replace('<path','<path class="'.$country['color'].'"',$country['path']);
                                else echo $country['path'];
                                ?>
                            </a>
                        <?php   } ?>
                    </svg>
                </div>

            </div>
            <div class="row">
				<?php if ( get_field( 'interactive_map' ) ) {
					$size1 = 'col-lg-8';
					$size2 = 'col-lg-4';
				} else {
					$size1 = 'col-md-6 col-lg-8';
					$size2 = 'col-md-6 col-lg-4';
				} ?>
                <style>
                    <?php global $wpdb;
                    $request = "SELECT menu_order, ID FROM wp_posts WHERE post_type = 'countries-watch' AND menu_order <= 30 ORDER BY menu_order";
                    $res = $wpdb->get_results($request);
                    $arr1 = []; $arr2 = []; $arr3 = [];

                    foreach ($res as $item) {
                        if (!get_field('country_code', (int )$item->ID)) {continue;}

                        if ($item->menu_order <= 10) {
                            $arr1[] = '.map .'.get_field('country_code', (int )$item->ID).':hover';
                        }elseif ($item->menu_order <= 20) {
                            $arr2[] = '.map .'.get_field('country_code', (int )$item->ID).':hover';
                        }elseif ($item->menu_order <= 30) {
                            $arr3[] = '.map .'.get_field('country_code', (int )$item->ID).':hover';
                        }
                    }

                    if (count($arr1)) {
                    echo implode(', ', $arr1)?>
                    {
                        fill: var(--wp--preset--color--red)
                    }
                    <?php
                    }

                    if (count($arr2)) {
					echo implode(', ', $arr2) ?>
                    {
                        fill: #e05c16
                    }
                    <?php
                        }

                    if (count($arr3)) {
				   echo implode(', ', $arr3) ?>
                    {
                        fill: #eba500
                    ;
                    }
                    <?php } ?>
                </style>
                <div class="<?= $size1 ?> persecution-levels-stats order-md-1 order-2">
                    <div class="row">
						<?php if ( get_field( 'interactive_map' ) ) { ?>
                            <div class="map desktop">
                                <?php
                                $countries = get_countries();
                                $code_countries = [];
                                foreach($countries as $country) $code_countries[$country['code']] = ['path' => $country['path'], 'title' => isset($country['title'])?$country['title']:'' ];
                                $countries = countries_data($code_countries);
                                ?>
                                <svg viewBox="0 0 1009 652">
                                    <?php foreach(countries_data($countries) as $code=>$country) { ?>
                                    <a href="<?php mapLink( $code ); ?>">
                                        <?=$country['title']?'<title>'.$country['title'].'</title>':''?>
                                        <?php
                                        if(!empty($country['color'])) echo str_replace('<path','<path class="'.$country['color'].'"',$country['path']);
                                        else echo $country['path'];
                                        ?>
                                    </a>
                                    <?php   } ?>
                                </svg>
                            </div>
						<?php } else { ?>
                            <div class="desktop-map">
                                <img alt="World Watch List Map" src="<?php the_field( 'desktop_map' ) ?>">
                            </div>
						<?php } ?>
                        <div class="col-6 col-md-12 col-lg-6 levels-of-persecution">
                            <div class="map-key">
                                <h5>Levels of persecution:</h5>
                                <ul>
                                    <li class="extreme"><span>&nbsp;</span> Extreme</li>
                                    <li class="very-high"><span>&nbsp;</span> Very High</li>
                                    <li class="high"><span>&nbsp;</span> High</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-lg-6 stats-carousel">
                            <div class="carousel slide" data-ride="carousel" id="wwl-stats-carousel">
                                <div class="carousel-inner">
									<?php if ( have_rows( 'items' ) ) {
										$i = 0;
										?>
										<?php while ( have_rows( 'items' ) ): the_row();
											$i ++
											?>
                                            <div class="carousel-item <?php if ( $i == 1 ) {
												echo 'active';
											} ?>">
                                                <div class="stat"><?= get_sub_field( 'red_text' ) ?></div>
                                                <div class="description"><?= get_sub_field( 'black_text' ) ?></div>
                                            </div>
										<?php endwhile; ?>
									<?php } ?>
                                </div>
                                <ol class="carousel-indicators">
									<?php foreach ( range( 0, $i - 1 ) as $item ) : ?>
                                        <li class="<?php if ( $item == 0 ) {
											echo 'active ';
										} ?>" data-slide-to="<?= $item ?>" data-target="#wwl-stats-carousel">&nbsp;
                                        </li>
									<?php endforeach; ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="<?= $size2 ?> country-profiles order-xs-1 order-md-2 order-1">
                    <div class="homeF-wwl__filter">
                        <div class="filter-control">
                            <h5>View country profiles</h5>
							<?php
                            // Your block html goes here
                            $countries = get_posts( array(
                                'post_type'      => 'countries-watch',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                            ) );
                            $new_countries = [];
                            foreach($countries as $country) {
                                $new_countries[$country->post_title] = $country->ID;
                            }
                            ksort($new_countries);
                            ?>
                            <select class="country-select" id="selectCountry">
                                <option selected="selected">Choose country</option>
                                <?php foreach ( $new_countries as $country => $key ) : ?>
                                    <option value="<?php the_permalink( $key ); ?>"><?= $country ?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                        <div class="filter-control">
                            <h5><?php echo date('Y');?> &nbsp;ranking</h5>
                            <ol>
								<?php
								$countries = array_slice( $countries, 0, 5 );
								foreach ( $countries as $country ) : ?>
                                    <li><?= $country->post_title ?></li>
								<?php endforeach; ?>
                            </ol>
                        </div>
                        <a class="btn btn-primary"
                           href="<?php the_field( 'button_link' ) ?>"><?php the_field( 'button_text' ) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>