<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */

?>
<?php if (
        (get_field('show_resources_in_resource_item', 'option')&&is_singular('resources')) ||
        (get_field('show_resources_in_country_item', 'option')&&is_singular('countries-watch'))
        ) : ?>
	<?php get_template_part( 'template-parts/block', 'resources' ) ?>
<?php endif; ?>
<?php if (
        get_field( 'show_get_involved' ) ||
        (get_field('show_get_involved_in_resource_item', 'option')&&is_singular('resources')) ||
        (get_field('show_get_involved_in_country_item', 'option')&&is_singular('countries-watch'))
        ) : ?>
	<?php get_template_part( 'template-parts/block', 'getinvolved' ) ?>
<?php endif; ?>
<footer class="content-info">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-2">
                <h5>Quick links</h5>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'footer-quicklinks',
						'menu_class'     => 'weblinks-depth-1 footer-menu',
					)
				); ?>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <h5>Social media</h5>
				<?php wp_nav_menu( array(
					'theme_location' => 'footer-socials',
					'menu_class'     => 'footer-menu'
				) ); ?>
            </div>
            <div class="col-12 col-md-4 col-lg-5">
                <h5>Get involved</h5>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'footer-involved',
						'menu_class'     => 'weblinks-depth-1 footer-menu',
					)
				); ?>
            </div>
            <div class="col-lg-3 charity-details">
                <p>
                    <a href="<?= home_url(); ?>">
                        <img alt="Open Doors Logo" class="footer-logo"
                             src="<?php the_field( 'footer_logo', 'option' ); ?>">
                    </a>
                </p>
                <p><?php the_field( 'footer_contact_text', 'option' ) ?></p>
                <p>
                    <a href="<?php the_permalink( 72 ) ?>">Contact Details</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="content-info__socials d-flex justify-content-lg-end flex-wrap">
					<?php if ( get_field( 'instagram_link', 'option'  ) ) : ?>
                        <li>
                            <a href="<?php the_field( 'instagram_link', 'option' ) ?>" class="button-social">
                                <i class="icon-social icon-social__instagram"></i>
                            </a>
                        </li>
					<?php endif; ?>
					<?php if ( get_field( 'facebook_link', 'option' ) ) : ?>
                        <li>
                            <a href="<?php the_field( 'facebook_link', 'option'  ) ?>" class="button-social">
                                <i class="icon-social icon-social__facebook"></i>
                            </a>
                        </li>
					<?php endif; ?>
					<?php if ( get_field( 'twitter_link', 'option' ) ) : ?>
                        <li>
                            <a href="<?php the_field( 'twitter_link', 'option'  ) ?>" class="button-social">
                                <i class="icon-social icon-social__twitter"></i>
                            </a>
                        </li>
					<?php endif; ?>
					<?php if ( get_field( 'youtube_link', 'option' ) ) : ?>
                        <li>
                            <a href="<?php the_field( 'youtube_link', 'option'  ) ?>" class="button-social">
                                <i class="icon-social icon-social__youtube"></i>
                            </a>
                        </li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-6">© Copyright <?= date( 'Y' ) ?>&nbsp;Open Doors UK &amp; Ireland</div>
            <div class="col-6 text-right">
                <a href="<?php the_permalink( 43 ) ?>">Safeguarding Policy</a>&nbsp;|&nbsp;<a
                        href="<?php the_permalink( 3 ) ?>">Privacy Policy</a>&nbsp;
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<script>
for (var links = document.links, i = 0, a; a = links[i]; i++) {
        if (a.host !== location.host) {
                a.target = '_blank';
        }
}
</script>
<script src="https://cdn.getaddress.io/scripts/getaddress-autocomplete-1.1.3.min.js">
</script>

<!-- after your form -->
<script>
    getAddress.autocomplete('formatted_address_0','WkhSjr43n0-e2SjfLxEIyw41835');
</script>
</body>
</html>