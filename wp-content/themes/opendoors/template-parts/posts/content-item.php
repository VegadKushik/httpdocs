<div class="features-block__item">
	<div class="features-block__thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
		<div class="features-block__label">
			<span><?php the_title(); ?></span>
		</div>
	</div>
	<div class="features-block__contents">
		<a class="title" href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
		<?php
        if ( get_field( 'btn_text2' ) ) : ?>
			<div class="row">
				<div class="col-sm-6">
					<a class="btn btn-secondary"
					   href="<?= get_field( 'btn_link1' ) ?>"><?= get_field( 'btn_text1' ) ?></a>
				</div>
				<a class="btn btn-secondary"
				   href="<?= get_field( 'btn_link2' ) ?>"><?= get_field( 'btn_text2' ) ?></a>
			</div>
		<?php elseif ( get_field( 'btn_text1' ) ) : ?>
			<a class="btn btn-secondary"
			   href="<?= get_field( 'btn_link1' ) ?>"><?= get_field( 'btn_text1' ) ?></a>
		<?php endif; ?>
	</div>
</div>
