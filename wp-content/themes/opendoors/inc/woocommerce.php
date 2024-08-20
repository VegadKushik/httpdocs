<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package test
 */

// WooCommerce setup function
function test_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'test_woocommerce_setup' );

// WooCommerce specific scripts & stylesheets
function test_woocommerce_scripts() {
	wp_enqueue_style( 'test-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );
}

add_action( 'wp_enqueue_scripts', 'test_woocommerce_scripts' );

// Disable the default WooCommerce stylesheet.
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'test_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function test_woocommerce_wrapper_before() {
		?>
        <main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'test_woocommerce_wrapper_before' );

if ( ! function_exists( 'test_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function test_woocommerce_wrapper_after() {
		?>
        </main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'test_woocommerce_wrapper_after' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_filter( 'woocommerce_locate_template', array( WPMultiStepCheckoutPro(), 'woocommerce_locate_template' ), 30, 3 );
add_filter( 'woocommerce_locate_template', 'woocommerce1_locate_template', 30, 3 );

function woocommerce1_locate_template( $template, $template_name, $template_path ) {
	if ( 'checkout/form-checkout.php' !== $template_name ) {
		return $template;
	}

	$template = get_template_directory() . '/woocommerce/checkout/form-checkout.php';

	return $template;
}

add_filter( 'woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields( $fields ) {
	foreach ( $fields as &$fieldset ) {
		foreach ( $fieldset as &$field ) {
			// if you want to add the form-group class around the label and the input
            if (!isset($field['type'])) continue;
            if ($field['type'] == 'checkbox') {
	            $field['class'][] = 'form-check';
            }else {
	            $field['class'][] = 'form-group';
            }
		}
	}

	return $fields;
}

add_filter( 'woocommerce_form_field_args', 'wc_form_field_args', 10, 3 );
function wc_form_field_args( $args, $key, $value ) {
	$args['input_class'] = array( 'form-control form-control-lg' );

	return $args;
}

/**
 * Add custom field to the checkout page
 */

//add_action( 'woocommerce_after_order_notes', 'custom_checkout_field' );

function custom_checkout_field( $checkout ) {

	echo '<div id="custom_checkout_field"><h2>' . __( 'Details' ) . '</h2>';

	woocommerce_form_field( 'user_title', array(
		'type'    => 'select',
		'required'    => true,
		'options' => [
			'Mr',
			'Mrs',
			'Ms',
			'Miss',
			'Dr',
			'Rev',
			'Archdeacon',
			'Baroness',
			'Bishop',
			'Brigadier',
			'Brother',
			'Canon',
			'Cllr',
			'Colonel',
			'Commanender',
			'Deacon',
			'Deaconess',
			'Earl',
			'Father',
			'Mother',
			'Lady',
			'Laird',
			'Lieutenant',
			'Lord',
			'Lt',
			'Lt Col',
			'Major',
			'Minister',
			'Mme',
			'Mother',
			'Pastor',
			'Prince',
			'Prof',
			'Rev Canon',
			'Rev Dr',
			'Rt. Rev',
			'Sister',
			'The Rt Rev\'d Dr',
			'Venerable',
			'Viscountess',
			'Master',
			'Sir',
			'Dame',
		],
		'class'   => array(
			'form-control-lg'
		),
		'label'   => __( 'Title' ),
	),
		$checkout->get_value( 'user_title' ) );

	woocommerce_form_field( 'under21', array(
		'type'    => 'checkbox',
		'class'   => array(
			'form-check'
		),
		'label'   => __( 'Under 21?' ),
	), $checkout->get_value( 'under21' ) );

	woocommerce_form_field( 'birth_date', array(
		'type'    => 'date',
		'class'   => array(
			'form-control-lg form-check'
		),
	), $checkout->get_value( 'birth_date' ) );
	echo '</div>';
}

/**
 * Checkout Process
 */

//add_action( 'woocommerce_checkout_process', 'customised_checkout_field_process' );

function customised_checkout_field_process() {

// Show an error message if the field is not set.

	if ( ! $_POST['customised_field_name'] ) {
		wc_add_notice( __( 'Please enter value!' ), 'error' );
	}

}

/**
 * Update the value given in custom field
 */

add_action( 'woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta' );

function custom_checkout_field_update_order_meta( $order_id ) {

	if ( ! empty( $_POST['customised_field_name'] ) ) {

		update_post_meta( $order_id, 'Some Field', sanitize_text_field( $_POST['customised_field_name'] ) );

	}

}

add_action( 'template_redirect', 'wc_redirect_non_logged_to_login_access');
function wc_redirect_non_logged_to_login_access() {

	if ( !is_user_logged_in() && ( is_account_page() ) ) {
		wp_redirect('/signin' );
		exit();
	}
}

// Add a custom function to send data to the third-party API after order placement
function send_data_to_third_party_api_after_order_placement( $order_id ) {
    opendoorsCreateOrder($order_id);
}
add_action( 'woocommerce_checkout_order_processed', 'send_data_to_third_party_api_after_order_placement' );