<?php
/**
 * @author JOnathan Soto
*
* @package Foundry
*
*Template Name: Single Ranking
*Template Post Type: page, post, videos
 */

get_header();
?>

<?php 
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single-ranking' );


	endwhile; // End of the loop.

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>


<?php
get_footer();
