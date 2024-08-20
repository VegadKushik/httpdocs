<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php bloginfo('template_url'); ?>/assets/images/favicon-32x32.png">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="banner">
    <nav class="navbar navbar-expand-xl main-navigation">
        <a class="navbar-brand" href="<?= home_url() ?>">
            <img src="<?php the_field('logo', 'options') ?>" alt="" class="logo">
        </a>
        <?= wp_get_attachment_image(1247, 'full', false, ['class' => "fr-logo"]) ?>
    </nav>
</header>