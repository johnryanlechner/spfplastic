<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="dns-prefetch" href="https://www.googletagmanager.com">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ba0c2f">
    <meta name="msapplication-TileColor" content="#ba0c2f">
    <meta name="theme-color" content="#ffffff"> 

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5WL8L85');</script>
    <!-- End Google Tag Manager -->
<?php wp_head(); ?> 
    
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WL8L85"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>

    <?php
        if (is_front_page()) {
            //echo get_template_part('template-parts/loading-animation');
        } 
    ?>  

    <a class="skip-content" href="#primary-wrap" title="Skip to main content of page" tabindex="0">Skip to Content</a>

    <?= get_template_part('template-parts/navigation-mobile') ?> 
	
    <div id="main">
        <header id="header" role="banner"> 
            <p class="site-title">
                <a href="<?php bloginfo('url'); ?>/">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" alt="<?php echo bloginfo('name'); ?> logo" />
                </a>
                <span><?php echo bloginfo('name'); ?></span>
            </p>   
            <nav class="primary-nav">
                <?php 
                    wp_nav_menu( array(
                        'container'       => 'ul', 
                        'menu_class'      => 'sf-menu', 
                        'menu_id'         => 'topnav',
                        'depth'           => 0,
                        'theme_location' => 'header_menu' 
                    )); 
                ?>
            </nav> 
            <nav class="secondary-nav">
                <div class="phone-number">
                    <?= do_shortcode('[contact-phone]') ?>
                </div>
                <?php 
                    wp_nav_menu( array(
                        'container'       => 'ul', 
                        'menu_class'      => 'sf-menu', 
                        'menu_id'         => 'secondnav',
                        'depth'           => 0,
                        'theme_location' => 'secondary_menu' 
                    )); 
                ?>
            </nav>
        </header>
