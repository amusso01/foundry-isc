<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Events page
*Template Post Type: page
 */
 

get_header();

?>

<?php get_template_part( 'components/page/hero-events' ) ?>

<?php get_template_part( 'components/page/events-landing-card' ) ?>

<?php get_template_part( 'components/page/events-landing-post' ) ?>

<main role="main" class="site-main events-main">
	
	<?php 
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				the_content( );

			endwhile; // End of the loop.

		endif;
	?>

	<div class="events-testimonials" id="testimonials" >

		<div id="testimonials"  class="row row-block testimonials-video-section">
	
			<div class="col-xs-12">
				<h2>Events Testimonials</h2>
			</div>
	
		<?php get_template_part( 'components/page/video-loop' ) ?>
		
		</div>
	
		<div  class="content-block">
			<?php get_template_part( 'components/carousel/testimonial-carousel' ) ?>
	
		</div>

	</div>
</main>


<?php
get_footer();
