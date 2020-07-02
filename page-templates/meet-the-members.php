<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Meet the members
*Template Post Type: page
 */


get_header();


?>

<?php get_template_part( 'components/page/hero-image-title' ) ?>

<main role="main" class="site-main meet-the-members-main">

<div class="row row-block">

	<?php

	$post_list = get_posts( array(
  		'post_type'   => 'leadership_team',
        'posts_per_page' => -1,
	) );

	// check if the repeater field has rows of data
	if( $post_list ):

	 	// loop through the rows of data
	    foreach ( $post_list as $post ) {  setup_postdata( $post );
	    	
			get_template_part( 'template-parts/content', 'meet-member' ); 
	    }

	endif;

	?>
</div>




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
