<?php
/**
 * @author Jonathan Soto
*
* @package Foundry
*
*Template Name: Intro Marketplace
*
 */

get_header(); ?>

<?php get_template_part( 'components/page/hero-image-title-btn' ) ?>


<?php get_template_part( 'template-parts/content', 'search-marketplace' ); ?>

<main role="main" class="site-main marketplace-main">
	<div class="row row-block">
		<div class="col-xs-10 col-sm-1 col-md-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10">

			<div class="row row-block">
					<?php
							$output ="";
							$taxonomies = get_terms( array(
							    'taxonomy' => 'marketplace_categorie',
							    'hide_empty' => false
							) );
	 
							if ( !empty($taxonomies) ) :
							    foreach( $taxonomies as $category ) {

					?>

								<article class="card marketplace-tax  col-xs-10 col-sm-6 col-md-6">
											<a href="<?php echo esc_url( get_term_link( $category ) ) ; ?>">
												<div class="card__inner">
													<div class="card__image">
														<?php
														if ( get_field('hero_image', $category)	) {
															echo '<img src="'. get_field('hero_image', $category).'" alt="Picture of team">';
														}
														?>
														
														<div class="card_title">
															<h2><?php echo $category->name; ?></h2>
														</div>
													</div>
													<div class="card__body">
														<div class="card__body-header">
															<p class="text-large"><?php  echo term_description(  $category->term_id ); ?></p>
														</div>
														<div class="btn__wrapper">
																<span class="btn">Browse <?php echo $category->name; ?></span>
														</div>
													</div>
												</div>	
											</a>
								</article>

					<?php       
							    }
							endif;
					?>
			</div>
				
				
		</div>
		<div class="col-xs-10 col-sm-1 col-md-1"></div>
	</div>
	
		

</main>

<?php
get_footer();
