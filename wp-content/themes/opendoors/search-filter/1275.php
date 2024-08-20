<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/* @var $query WP_Query */
if ( $query->have_posts() ) {
	$i = 0;
	/* Start the Loop */
	while ( $query->have_posts() ) {
		$query->the_post();
        $i++;
		if ( $i === 1 ) {
			echo '<section class="latest-stories__row">';
			get_template_part( 'template-parts/church-resources/content', 'post', array(
				'size' => 'large'
			) );
		} elseif ( $i === 2 ) {
			echo '<div class="latest-stories__column small-stack">';
			get_template_part( 'template-parts/church-resources/content', 'post', array(
				'size'      => '',
				'nowrapper' => true,
			) );
		} elseif ( $i === 3 ) {
			get_template_part( 'template-parts/church-resources/content', 'post', array(
				'size'      => '',
				'nowrapper' => true,
			) );
			echo '</div>';
		} elseif ( $i > 5 ) {
			get_template_part( 'template-parts/church-resources/content', 'post', array(
				'size' => 'small'
			) );
		} elseif ( $i === 8 ) {
			get_template_part( 'template-parts/church-resources/content', 'post', array(
				'size' => 'medium'
			) );
		} else {
			get_template_part( 'template-parts/church-resources/content', 'post', array(
				'size' => 'medium'
			) );
		}
	}

	?>

    </section>
    <div class="pagination">
		<?php
		echo "<br />";
		wp_pagenavi( array( 'query' => $query ) );
		?>
    </div>
	<?php
} else {
	echo "No Results Found";
}
?>
