<?php
function custom_gutenberg_load_style() {
//	 Add support for editor styles.
	add_theme_support( 'editor-styles' );

//	 Enqueue editor styles.

	add_editor_style( get_template_directory_uri() . '/assets/css/default.bundle.css' );
	add_editor_style( get_template_directory_uri() . '/assets/css/font-awesome-4.7.0/css/font-awesome.min.css' );
	add_editor_style( get_template_directory_uri() . '/assets/css/app.min.css' );
	add_editor_style( custom_gutenberg_URL . 'assets/build/css/admin/editor-css.css' );
}

function custom_gutenberg_pallete_script() {
	?>
    <script type="text/javascript">
        (function ($) {

            acf.add_filter('color_picker_args', function (args, $field) {
                
                // Example to change default colors of color picker
                // args.palettes = ['#EFF7FC', '#3A618D', '#578D3A', '#82AC51', '#f2b24f', '#50575F'];

                return args;
            });

        })(jQuery);
    </script>
	<?php
}

function custom_gutenberg_load_script() {
    wp_register_style( 'adminfrontcss', custom_gutenberg_URL . 'assets/build/css/admin/admin.css' );
    wp_enqueue_style('adminfrontcss');
}

if (CUSTOM_GUTENBERG_ADMIN_STYLES) {
    add_action( 'after_setup_theme', 'custom_gutenberg_load_style' );
    add_action( 'acf/input/admin_footer', 'custom_gutenberg_pallete_script' );
//    add_action( 'admin_enqueue_scripts', 'custom_gutenberg_load_script');
}
