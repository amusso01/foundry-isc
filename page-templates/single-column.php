<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Single column centered
*Template Post Type: page, post, videos
 */

get_header();
?>

<?php get_template_part( 'components/page/hero-simple' ) ?>

<main role="main" class="site-main single-column-main content-block">
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
