<?php
$country = count( wp_get_post_tags( get_the_ID() ) ) ? wp_get_post_tags( get_the_ID() )[0]->name : false;
?>
<?php if ( !isset( $args['nowrapper'] ) ) : ?>
    <div class="latest-stories__column <?= $args['size'] ?>">
<?php endif; ?>
    <div class="latest-stories__item" style="display: block;">
		<?php the_post_thumbnail(); ?>
        <div class="latest-stories__contents">
            <div class="meta" style="display: block;">
				<?php if ( get_field( 'resource_theme' ) ) : ?>
                    <span class="label"><?php the_field( 'resource_theme' ) ?></span>
				<?php endif; ?>
				<?php if ( get_field( 'resource_type' ) ) : ?>
                    <span class="label"><?php the_field( 'resource_type' ) ?></span>
				<?php endif; ?>
				<?php if ( get_field( 'resource_file_type' ) ) : ?>
                    <span class="label"><?php the_field( 'resource_file_type' ) ?></span>
				<?php endif; ?>
                <span class="summary-details">
                <?= $country ?>
            </span>
            </div>
            <div class="title" style="display: block;">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
        </div>
    </div>
<?php if ( !isset( $args['nowrapper'] ) ) : ?>
    </div>
<?php endif; ?>
