<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="dns-prefetch" href="https://www.googletagmanager.com">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

<?php wp_head(); ?> 
    
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div id="loading-delay"></div>

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
