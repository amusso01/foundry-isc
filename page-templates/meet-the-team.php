<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Meet the team
*Template Post Type: page
 */

get_header();
?>

<?php get_template_part( 'components/page/hero-simple' ) ?>

<main role="main" class="site-main meet-the-team-main content-block">
<?php 
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		the_content( );


	endwhile; // End of the loop.

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main>

<?php
get_footer();
