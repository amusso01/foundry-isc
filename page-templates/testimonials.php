<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Testimonials
*Template Post Type: page
 */


get_header();
?>

<?php get_template_part( 'components/page/hero-simple' ) ?>

<main role="main" class="site-main testimonials-main">

<div id="testimonials"  class="row row-block testimonials-video-section">

    <div class="col-xs-12">
        <h2>Videos</h2>
    </div>

   <?php get_template_part( 'components/page/video-loop' ) ?>
 
</div>

<div  class="content-block">
	<?php get_template_part( 'components/carousel/testimonial-carousel' ) ?>
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
