<?php
/**
 * @author Jonathan Soto
*
* @package Foundry
*
*Template Name: Intro Marketplace
*
 */

get_header(); 

session_start();
$tax = $wp_query->get_queried_object();
$_SESSION["category"]=$tax->slug;
$_SESSION["category-name"]=$tax->name;
?>

<?php get_template_part( 'components/page/hero-tax-image-title' ) ?>


<main role="main" class="site-main video-category-main">
<section>
		<div class="row row-block">
			<?php if ( is_active_sidebar( 'ads-landscape' ) ) :
	        	 dynamic_sidebar( 'ads-landscape' );
	    	 endif; ?>
	   	</div>


	</section>


	<div class="row row-block">

		<?php 
		 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = array( 'post_type' => 'post',
									'posts_per_page' => 12,
									'paged' => $paged,
								        'tax_query'	=> array( 
								        	 array(
												'taxonomy' => 'category',
								                'field' => 'term_id',
								                'terms' => $tax->term_id,
											)

								         ),
									) ;

					$loop = new WP_Query( $args  );
					if ( $loop->have_posts() ): 
					    while ( $loop->have_posts() ) : $loop->the_post(); setup_postdata( $post );
					    	
						if(  get_the_post_thumbnail_url() ){
							$image =get_the_post_thumbnail_url(null,'full'); 
					  }else{
							$image =  get_template_directory_uri().'/dist/images/iSC.jpg';
					  }
					  $tax = $wp_query->get_queried_object();
		  ?>
		  
					   <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
						  <a href="<?php echo get_the_permalink() ?>">
							  <div class="card__inner">
								  <div class="card__image">
									  <img src="<?php echo $image; ?>" alt=" <?php echo get_the_title($post->ID); ?>">
								  </div>
								  <div class="card__body"> 
									  <div class="card__body-header">
										  <p class="tag tag-light"><span><?php echo $tax->name; ?></span></p>
										  <h4><?php echo get_the_title($post->ID); ?></h4>
									  </div>
								  </div>
							  </div>	
						  </a>
					  </article>
					  <?php
						   endwhile; 
						   echo foundry_pagination($loop);
						wp_reset_postdata();
					endif;
		?>


	</div>


	



	<div class="row row-block">
		<?php get_template_part( 'components/page/featured-post' ) ?>
	</div>

</main>




<?php
get_footer();
