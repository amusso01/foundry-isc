<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foundry
 */

get_header();

?>



<?php

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

			get_template_part( 'template-parts/content', 'single' );
			get_template_part( 'components/carousel/single-post-carousel' ); 
		



	endwhile; // End of the loop.

else :

	get_template_part( 'template-parts/content', 'none' );

endif;

?>



<?php
get_footer();
