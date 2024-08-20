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
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="robots" content="index, nofollow"/>
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php bloginfo( 'template_url' ); ?>/assets/images/favicon-32x32.png">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="banner">
    <div class="top-navigation">
        <div class="navbar">
            <ul class="nav ml-auto">
                <li class="shopping-cart-status nav-item" data-href="">
                    <?php woocommerce_mini_cart(); ?>
                </li>
                <ul class="nav ml-auto">
                    <?php if ( ! is_user_logged_in() ) : ?>
                        <li class="nav-item">
                            <a href="<?=get_field('singin_link','option')?>" class="nav-link">
                                <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                Sign In
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=get_field('register_link','option')?>" class="nav-link">
                                <span class="fas fa-user-circle" aria-hidden="true"></span>
                                Register
                            </a>
                        </li>
                    <?php else :
                        ?>
                        <li class="nav-item">
                            <a href="<?=get_field('myaccount_link','option')?>" class="nav-link">
                                <span class="fas fa-user-circle" aria-hidden="true"></span>
                                <?= wp_get_current_user()->display_name ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl main-navigation">
        <a class="navbar-brand" href="<?= home_url() ?>">
            <img src="<?php the_field( 'logo', 'options' ) ?>" alt="" class="logo">
        </a>
        <a href="<?=get_field('donate_link','option')?>"
           class="btn btn-primary  btn-primary1 tablet-donate-search ml-auto">Donate</a>
        <button type="submit" class="btn btn-outline-secondary toggle-search tablet-donate-search"
                data-toggle="collapse" data-target="#header-search-form-tablet" aria-expanded="false"
                aria-controls="header-search-form">
            <i class="fas fa-search" aria-hidden="true"></i>
            <span class="sr-only">Search</span>
        </button>
        <form class="form-inline header-search-form" method="GET" action="<?= home_url() ?>" role="search">
            <div class="collapse" id="header-search-form-tablet">
                <input class="form-control search-field" id="qs" name="qs" value="" type="search" placeholder="Search"
                       aria-label="Search">
                <button class="btn btn-primary btn-submit-search" type="submit">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </button>
                <button class="btn toggle-search">
                    <i class="fas fa-envelope fa-2x" aria-hidden="true"></i>
                    <span class="sr-only">Subscription</span>
                </button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'container'      => false,
                'menu_class'     => 'weblinks-depth-1 navbar-nav ml-auto',
                'walker'         => new Opendoors_Nav_Menu_Walker(),
            ) ); ?>
            <div class="collapse" id="header-search-form">
                <form class="form-inline header-search-form" method="GET" action="/" role="search">
                    <input class="form-control search-field" id="s" name="s" type="search" placeholder="Search"
                           aria-label="Search">
                    <button class="btn btn-primary btn-submit-search" type="submit"><i class="fas fa-search"></i><span
                                class="sr-only">Search</span>
                    </button>
                    <a href="<?=get_field('susbcription_link','option')?>" type="button" class="btn toggle-search d-lg-none d-xl-none signup"><i
                                class="fas fa-envelope fa-2x"></i><span class="sr-only">Subscription</span></a>
                </form>
            </div>
            <a href="<?=get_field('donate_link','option')?>"
               class="btn btn-primary btn-nav-donate text-decoration-none">Donate</a>
            <button class="btn btn-outline-secondary btn-nav-search toggle-search" data-toggle="collapse"
                    data-target="#header-search-form" aria-expanded="false"
                    aria-controls="header-search-form"><i class="fas fa-search"></i><span
                        class="sr-only">Search</span>
            </button>
            <a href="<?=get_field('subscription_link','option')?>"
               class="btn toggle-search d-none d-xs-none d-sm-none d-md-none d-lg-none d-xl-block signup">
                <i class="fas fa-envelope fa-2x"></i><span class="sr-only">Subscription</span></a>
        </div>
    </nav>
</header>