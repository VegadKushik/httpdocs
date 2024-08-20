<?php
// Image preview when the block is in the list of blocks
if ( @$block['data']['preview_image_help'] ) : ?>
    <img src="<?= @$block['data']['preview_image_help'] ?>" alt="">
<?php else:
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
    <div class="col-xl-5 offset-xl-2 wwl__dropdown-nav">
        <div class="od-dropdown dropdown">
            <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown"
                    id="dropdown-menu-btn" type="button">Jump to a country profile
            </button>
            <div aria-labelledby="dropdown-menu-btn" class="dropdown-menu scrollable-menu" role="menu">
				<?php foreach ( $new_countries as $country => $key ) : ?>
                    <a class="dropdown-item"
                       href="<?php the_permalink( $key ); ?>"><?=$country?></a>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>