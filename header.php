<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section, <header> content and start of <main> content.
 *
 * @package tink-2014
 */
?><!DOCTYPE html>
<!--[if lt IE 8]><html class="oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
    <head>
        <title><?php wp_title( '-', true, 'right' ); ?></title>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <?php if ( is_front_page() && is_home() ) : ?>
            <meta content="<?php echo get_bloginfo( 'description' ); ?>" name="description" />
        <?php endif; // is_front_page() && is_home() ?>
        <meta content="Léonie Watson" name="author" />

        <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,900%7CMontserrat:400,700" rel="stylesheet" />
        <link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />
        <link href="<?php bloginfo( 'template_directory' ); ?>/css/normalize.css/normalize.min.css" media="screen" rel="stylesheet" />
        <link href="<?php bloginfo( 'template_directory' ); ?>/css/just-another-grid-system/jags.min.css" media="screen" rel="stylesheet" />
        <link href="<?php bloginfo( 'template_directory' ); ?>/css/theme.css" media="screen" rel="stylesheet" />
        <link href="<?php bloginfo( 'template_directory' ); ?>/css/print.css" media="print" rel="stylesheet" />

        <script src="<?php bloginfo( 'template_directory' ); ?>/js/modernizr/modernizr.custom.min.js"></script>
        <script>var siteTheme=document.cookie.replace(/(?:(?:^|.*;\s*)siteTheme\s*\=\s*([^;]*).*$)|^.*$/,'$1');if(''!==siteTheme){var el=document.getElementsByTagName('html')[0];el.className=el.className+' '+siteTheme};
        </script>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header class="header" role="banner">
            <?php if ( is_front_page() && is_home() ) : ?>
                <span class="header_logo"><img alt="Tink.UK" src="<?php bloginfo( 'template_directory' ); ?>/assets/img/logo.gif" /></span>
            <?php else : ?>
                <a class="header_logo" href="<?php echo get_option('siteurl'); ?>"><img alt="Tink.UK" src="<?php bloginfo( 'template_directory' ); ?>/assets/img/logo.gif" /></a>
            <?php endif; // is_front_page() && is_home() ?>

            <ul class="skip-links">
                <li class="skip-links_item"><a href="#s">Skip to search</a></li>
                <li class="skip-links_item"><a href="#anchor-navigation">Skip to navigation</a></li>
            </ul><!-- .skip-links -->
        </header><!-- .header -->

        <div class="grid--66">
            <div class="grid_col--1 grid_col--fr-66">
                <main class="grid_box main" role="main">
                    <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="hide"><?php echo get_bloginfo( 'name' ); ?></h1>
                    <?php endif; // is_front_page() && is_home() ?>