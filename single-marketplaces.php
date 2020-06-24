<?php
/**
 * @author Jonathan Soto
*
* @package Foundry
*
*Template Name: Single Marketplace
*Template Post Type: marketplace
 */

get_header();
$postCat = get_field( 'type' );
$location = get_field( 'location' );
?>

<?php get_template_part( 'components/page/hero-marketplace' ) ?>

<main role="main" class="site-main teamleader-main">
	<div class="row row-block">
		<div class="col-xs-1">
			<?php get_template_part( 'components/page/share' ) ?>
		</div>
		<div class="col-xs-11 col-sm-6 col-md-6">
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					the_content( );




				endwhile; // End of the loop.

			endif;
		?>

		<br><br>
			<?php if( get_field('apply_link') ){ ?>
		    	<a href="<?php echo get_field('apply_link'); ?>" class="btn" target="_blanck">Apply</a> 
			<?php } ?>
		    <a href="#" class="btn btn__transparent alignright ">back to <?php echo $postCat->name; ?> listings</a>

		</div>

		<div class="col-xs-11 col-xs-offset-1 col-sm-4 col-md-4">
		<?php 	
			if ( is_active_sidebar( 'ads-portrait' ) ) : ?>
			
			<div  class="widget-area ">
				<div class="sidebar_marketblace">
					<h3>Details<br></h3>
					<?php if( $location ){
				 echo '<p><strong>Location</strong><br>';
				 if( get_field('city') ){
				 	echo get_field('city').', ';
				 }
				 echo $location->name.'</p>'; } ?>
					
					<p><strong>Posted</strong><br><?php echo get_the_date( 'j F, Y' ); ?></p>
					<p class="tags-list"><strong>Tags</strong><br>

						<?php 
						$terms = get_field('tags_marketplace');
						if( $terms ): 
						 foreach( $terms as $term ): ?>
						        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
						    <?php endforeach;
						endif; ?>

					</p>
				</div>
			</div>
		
		<?php endif; ?>
		</div>
		
	</div>


</main>

<?php
get_footer();
