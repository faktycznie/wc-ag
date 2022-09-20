<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part('template-parts/header/offcanvas'); ?>
    <header class="header">
        <div class="top-bar">
            <div class="container top-bar__container">
                <div class="top-bar__slogan slogan">
                    <?= __('Autoryzowany dystrybutor grupy Azoty', 'foreto') ?>
                </div>
                <div class="top-bar__menu topbar-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'topbar-menu',
                            'menu_class'      => 'topbar-menu__list',
                            'container_class' => 'topbar-menu__container',
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
        </div>
        <div class="brand-bar">
            <div class="container brand-bar__container">

                <button class="brand-bar__hamburger offcanvas-btn hamburger" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"><span class="hamburger__inner"></span></button>

                <div class="brand-bar__logo logo">
                    <a class="logo__link" href="<?= get_site_url(); ?>"><img class="logo__image" src="<?= get_template_directory_uri() ?>/assets/img/logo.svg" alt="<?= get_bloginfo('name'); ?>" /></a>
                </div>

                <div class="brand-bar__search">
                    <?php get_search_form(); ?>
                </div>

                <div class="brand-bar__bok bok">
                    <div class="bok__text">
                        <div class="bok__label"><?= __('Biuro Obsługi Klienta:', 'foreto') ?></div>
                        <a class="bok__email" href="mailto:"><?= __('sklepwww@agrochem.com.pl', 'foreto') ?></a>
                    </div>
                    <a class="bok__icon" href="#">
                        <svg id="person-circle" xmlns="http://www.w3.org/2000/svg" width="19.913" height="19.913" viewBox="0 0 19.913 19.913">
                            <path d="M12.467,6.734A3.734,3.734,0,1,1,8.734,3,3.734,3.734,0,0,1,12.467,6.734Z" transform="translate(1.223 0.734)" />
                            <path d="M0,9.956a9.956,9.956,0,1,1,9.956,9.956A9.956,9.956,0,0,1,0,9.956ZM9.956,1.245a8.712,8.712,0,0,0-6.805,14.15c.884-1.424,2.829-2.95,6.805-2.95s5.92,1.525,6.805,2.95A8.712,8.712,0,0,0,9.956,1.245Z" fill-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="brand-bar__cart">
                    <?php get_template_part('template-parts/header/cart'); ?>
                </div>
            </div>
        </div>
        <div class="nav-bar">
            <div class="container nav-bar__container">
                <nav class="nav-bar__menu nav-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'nav-menu',
                            'menu_class'      => 'nav-menu__list',
                            'container_class' => 'nav-menu__container',
                            'before'          => '<span>',
                            'after'           => '</span>',
                        )
                    );
                    ?>
                </nav>
                <div class="nav-bar__social">
                    <?php get_template_part('template-parts/header/social'); ?>
                </div>
            </div>
        </div>
    </header>

    <?php
    if (!is_front_page() && !is_shop() && !is_product() && !is_product_category() && !is_404()) {
        get_template_part('template-parts/content/breadcrumbs');
    }
    ?>