<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

?>


<li>

    <h4><?php the_title() ?></h4>
	<?php the_excerpt(); ?>
    <div>
        <a href="<?php the_permalink(); ?>" target="_blank"><?php the_permalink(); ?></a>
    </div>
    <hr>
</li>