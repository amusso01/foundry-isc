<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Team leader
*Template Post Type: leadership_team
 */

get_header();
?>

<?php get_template_part( 'components/page/hero-leader' ) ?>

<main role="main" class="site-main teamleader-main">
	<div class="row row-block">
	<div class="col-xs-1">
		<?php get_template_part( 'components/page/share' ) ?>
	</div>
	<div class="col-xs-11 col-sm-11 col-md-7">
	<?php 
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				the_content( );


			endwhile; // End of the loop.

		endif;
	?>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4">

	</div>
	</div>


</main>

<?php
get_footer();
