<?php
/**
 * The buttons under the steps
 *
 * @package WPMultiStepCheckoutPro
 */

defined( 'ABSPATH' ) || exit;

$buttons_class = ( isset( $options['wpmc_buttons'] ) && '1' === $options['wpmc_buttons'] ) ? 'wpmc-button' : 'button alt';
$buttons_class = apply_filters( 'wmsc_buttons_class', $buttons_class );
$wrapper_class = apply_filters( 'wmsc_buttons_wrapper_class', 'wpmc-nav-wrapper' );
$back_to_cart  = ( isset( $options['show_back_to_cart_button'] ) && $options['show_back_to_cart_button'] ) ? true : false;
if ( ! $back_to_cart ) {
	$wrapper_class .= ' wpmc-no-back-to-cart';
}

?>

<!-- The steps buttons -->
<div class="<?php echo $wrapper_class; // phpcs:ignore ?>">
	<?php if ( $back_to_cart ) : ?>
		  <button data-href="<?php echo wc_get_cart_url(); ?>" id="wpmc-back-to-cart" class="<?php echo $buttons_class; // phpcs:ignore ?> btn btn-secondary" type="button"><?php echo $options['t_back_to_cart']; // phpcs:ignore ?></button>
	<?php endif; ?>
	<button id="wpmc-prev" class="<?php echo $buttons_class; // phpcs:ignore ?> button-inactive wpmc-nav-button btn btn-primary" type="button"><?php echo $options['t_previous']; // phpcs:ignore ?></button>
	<?php if ( $show_login_step ) : ?>
		<button id="wpmc-next" class="<?php echo $buttons_class; // phpcs:ignore ?> button-active wpmc-nav-button btn btn-primary" type="button"><?php echo $options['t_next']; // phpcs:ignore ?></button>
		<button id="wpmc-skip-login" class="<?php echo $buttons_class; // phpcs:ignore ?> button-active current wpmc-nav-button btn btn-primary" type="button"><?php echo $options['t_skip_login']; // phpcs:ignore ?></button>
	<?php else : ?>
		<button id="wpmc-next" class="<?php echo $buttons_class; // phpcs:ignore ?> button-active current wpmc-nav-button btn btn-primary" type="button"><?php echo $options['t_next']; // phpcs:ignore ?></button>
	<?php endif; ?>
</div>

<div style="clear: both;"></div>
