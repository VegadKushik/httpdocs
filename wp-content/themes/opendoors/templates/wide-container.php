<?php
/**
 * Template Name: Wide container
 * Template Post Type: post, resources
 */

get_header();
?>

    <main>

		<?php
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile; // End of the loop.
		?>

    </main><!-- #main -->

<?php
get_footer();
