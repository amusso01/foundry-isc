<?php
/**
 * @author Jonathan Soto
*
* @package Foundry
*
*Template Name: Intro Marketplace
*
 */

get_header(); 
session_start();
$tax = $wp_query->get_queried_object();
$_SESSION["category"]=$tax->slug;
$_SESSION["category-name"]=$tax->name;

?>

<?php get_template_part( 'components/page/hero-tax-image-title' ) ?>


<?php get_template_part( 'template-parts/content', 'post-cat' ); ?>


<?php
get_footer();
