<?php
/**
 * Hamburger
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

$menuLocations = get_nav_menu_locations(); 
$menuID = $menuLocations['loginmenu'];
$menu = wp_get_nav_menu_items($menuID);

?>

<div class="site-header__item site-header__login hidden_mobile-login" >
    <nav class="login-nav">
        <ul>
            <li class="login-nav__item">
                <a href="<?php echo $menu[0]->url ?>"><span><i><?php get_template_part( 'svg-template/svg', 'marketplace' ) ?></i></span>Marketplace</a>   
            </li>
            <li class="login-nav__item">
                <div class="btn__wrapper">
                    <a href="#" class="btn btn__transparent-green">Login</a>
                </div>
            </li>
            <li class="login-nav__item">
                <div class="btn__wrapper">
                    <a href="#" class="btn ">BECOME A MEMBER</a>
                </div>
            </li>
        </ul>
    </nav>
</div>