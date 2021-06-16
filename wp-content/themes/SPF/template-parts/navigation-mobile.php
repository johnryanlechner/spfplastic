<?php
/**
 * If you need to add additional menu items, just add another wp_get_nav_menu_items function and pass menu title as string
 */
$primary_navigation = wp_get_nav_menu_items('primary-menu'); 
?> 

    <div id="mobile-header" class="mobile-nav__header mobile-header"> 
        <div class="mobile-header__inner">
            <p class="mobile-header__logo">
                <a href="<?php bloginfo('url'); ?>/">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo.svg" alt="<?php echo bloginfo('name'); ?> logo" />
                </a>
                <span class="sr-only"><?php echo bloginfo('name'); ?></span>
            </p> 
            <a href="/product/" class="product-button">View Product</a> 
            <button id="mobile-trigger" type="button" class="mobile-header__button button">
                <span class="mobile-header__button__text">Menu</span>
            </button>
            <nav class="scrolled-desktop-nav">
                <?php 
                    wp_nav_menu( array(
                        'container'       => 'ul', 
                        'menu_class'      => 'sf-menu clearfix', 
                        'menu_id'         => 'primary-nav',
                        'depth'           => 0,
                        'theme_location' => 'header_menu' 
                    )); 
                ?>
            </nav> 
        </div>
    </div>

    <div id="mobile-navigation" class="mobile-nav__menu mobile-menu">
        <div class="mobile-menu__wrap menu-center force">
            <div id="mobile-menu" class="mobile-menu__panel">
                <div id="mobile-menu-primary" class="mobile-menu__group mobile-menu-primary">
                    <?php invision_mobile_nav_build_primary($primary_navigation); ?>
                </div> 
            </div>
        </div>
    </div>


<?php
/**
 * Build out primary-menu 
 */
function invision_mobile_nav_build_primary($nav){
    if( empty($nav) ) {
        return false;
    }

    // Create parent arrays
    $menu_items = [];
    foreach( $nav as $item ) {
        $isParent = $item->menu_item_parent;

        if( $isParent === '0'){
            $sub_menu_items[$item->ID] = []; // Create sub_menu reference w/ key
            $menu_items[] = $item; // Push object into menu_item array
        }
    }

    // Build out sub-menu array
    $sub_menu_items = [];
    foreach( $nav as $item ) {
        $parent = $item->menu_item_parent;

        if( $parent !== '0'){
            $sub_menu_items[$parent][] = $item;
        }
    }

    // Now, begin building the HTML
    ob_start();
    ?>
    <ul class="mobile-menu__list mobile-menu-primary__parent" data-level="1">
    <?php
    foreach( $menu_items as $item ) {
        $id = $item->ID;
        $title = $item->title;
        $url = $item->url;
        $isNewTab = $item->target !== '' ? 'target="_blank"' : '';
        $secondary = isset($sub_menu_items[$id]) ? $sub_menu_items[$id] : false;

        // Remove secondary sub menu items & leave tertiary menu items
        unset($sub_menu_items[$id]);
        ?>
        <li id="mobile-item-<?= $id; ?>" class="mobile-menu__list-item mobile-menu-primary__parent__item">
            <a class="mobile-menu__list-item_link mobile-menu-primary__parent__item_link" href="<?= $url; ?>" <?= $isNewTab; ?>>
                <?= $title; ?>
            </a>
            <?php // Secondary menu level
            if( $secondary !== false ) :
                invision_mobile_nav_build_sub_menu( $id, $title, $secondary );
            endif;
            ?>
        </li>
        <?php
    }
    ?>
    </ul>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;	
}

/**
 * Build out sub-menu 
 * 
 * @param String $id Parent id
 * @param String $title Parent title
 * @param Array $secondary Pass array reference to object
 * 
 */
function invision_mobile_nav_build_sub_menu( $id, $title, $secondary ) {
    ?>
    <button type="button" class="mobile-menu-primary__toggle mobile-menu-primary__parent__toggle" data-open="sub-menu-<?= $id; ?>">
        <span class="mobile-menu-primary__toggle_icon no-touch" aria-hidden="true"></span>
        <span class="mobile-menu-primary__toggle_text sr-only no-touch">Open <?= $title; ?></span>
    </button>

    <ul id="sub-menu-<?= $id; ?>" class="mobile-menu__list mobile-menu-primary__sub-menu" data-level="2" aria-hidden="true">
        <li class="mobile-menu__list-item mobile-menu-primary__sub-menu__close">
            <button type="button" class="mobile-menu-primary__toggle mobile-menu-primary__sub-menu__toggle button--back" data-close="mobile-item-<?= $id; ?>">
                <span class="mobile-menu-primary__toggle_icon button--back__icon no-touch" aria-hidden="true"></span>
                <span class="mobile-menu-primary__sub-menu__close_text button--back__label no-touch">Back to <?= $title; ?></span>
            </button>
        </li>
        <?php
        foreach( $secondary as $item ) :
            $id = $item->ID;
            $title = $item->title;
            $url = $item->url;
            $isNewTab = $item->target !== '' ? 'target="_blank"' : '';
            ?>
            <li id="mobile-item-<?= $id; ?>" class="mobile-menu__list-item mobile-menu-primary__sub-menu__item">
                <a class="mobile-menu__list-item_link mobile-menu-primary__sub-menu__item_link" href="<?= $url; ?>" <?= $isNewTab; ?>>
                    <?= $title; ?>
                </a>
            </li>
            <?php
        endforeach;
        ?>
    </ul>
    <?php
}

/**
 * Build secondary navigation
 * 
 * @param Array $nav Pass array reference to object
 * 
 */
function invision_mobile_nav_build_secondary($nav){
    if( empty($nav) ) {
        return false;
    }

    ob_start();
    ?>
    <ul class="mobile-menu__list mobile-menu-secondary__parent">
    <?php
    foreach( $nav as $item ) :
        $id = $item->ID;
        $title = $item->title;
        $url = $item->url;
        ?>
        <li id="menu-item-<?= $id; ?>" class="mobile-menu__list-item mobile-menu-secondary__parent__item">
            <a class="mobile-menu__list-item_link mobile-menu-secondary__parent__item_link" href="<?= $url; ?>">
                <?= $title; ?>
            </a>
        </li>
        <?php
    endforeach;
    ?>
    </ul>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;	
}