<div class="d-flex">
    <div class="story__author-avatar class">
		<?php $author = get_the_author(); ?>
		<?php echo substr( $author, 0, 1 ); ?>
    </div>
    <div class="story__author"><strong><?php the_author(); ?></strong><br>Open Doors Team</div>
    <div class="story__sharing ml-auto">
		<?php share_btns( $post ); ?>
    </div>
</div>
