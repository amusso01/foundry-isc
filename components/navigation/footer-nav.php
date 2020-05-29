<?php
/**
 * Primary Nav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

if ( has_nav_menu( 'footernav' ) ) :
    wp_nav_menu([
        'theme_location'    => 'footernav',
        'menu_class'        => 'footer-menu',
        'container'         => 'nav',
        'container_class'   => 'footer-menu-breadcrumb',
        'depth'             => 1
    ]);
endif;
