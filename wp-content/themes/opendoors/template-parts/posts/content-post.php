<div class="latest-stories__item" style="display: block;">
	<?php the_post_thumbnail(); ?>
    <div class="latest-stories__contents" style="display: block;">
        <div class="meta" style="display: block;">
			<?php $post_format = wp_get_post_terms( get_the_ID(), 'post_formats' ); ?>
			<?php if ( count( $post_format ) ) : ?>
                <span class="label"><?= $post_format[0]->name; ?></span>
			<?php endif; ?>
			<?php $category = wp_get_post_terms( get_the_ID() ); ?>
            <span class="summary-details">
                    <?php if ( count( $category ) ) : ?>
	                    <?= $category[0]->name; ?><?php elseif (count( $post_format )) : ?>
	                    <?= $post_format[0]->name; ?>
                    <?php endif; ?> | <?= get_the_date( 'd F Y' ) ?></span>
        </div>
        <div class="title" style="display: block;">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
    </div>
</div>