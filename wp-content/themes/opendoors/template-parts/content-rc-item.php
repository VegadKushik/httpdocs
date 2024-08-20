<?php $post = $args['post']; ?>
<div class="features-block__item">
	<div class="features-block__thumbnail class">
		<a>
			<?php the_post_thumbnail($post->ID); ?>
		</a>
		<div class="features-block__label">
			<span><?php echo get_the_title($post->ID); ?></span>
		</div>
	</div>
	<div class="features-block__contents">
		<a class="title" href="<?php the_permalink($post->ID); ?>"><?php the_excerpt($post->ID); ?></a>
		<?php if ( get_field( 'btn_text2', $post->ID ) ) : ?>
			<div class="row">
				<div class="col-sm-6">
					<a class="btn btn-secondary"
					   href="<?= get_field( 'btn_link2', $post->ID ) ?>"><?= get_field( 'btn_text1', $post->ID ) ?></a>
				</div>
				<a class="btn btn-secondary"
				   href="<?= get_field( 'btn_link2', $post->ID ) ?>"><?= get_field( 'btn_text2',$post->ID ) ?></a>
			</div>
		<?php elseif ( get_field( 'btn_text1', $post->ID ) ) : ?>
			<a class="btn btn-secondary"
			   href="<?= get_field( 'btn_link1', $post->ID ) ?>"><?= get_field( 'btn_text1', $post->ID ) ?></a>
		<?php endif; ?>
	</div>
</div>