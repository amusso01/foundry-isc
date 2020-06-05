<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Single column centered
*Template Post Type: page
 */

get_header();
?>

<main role="main" class="site-main single-main content-block">
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
