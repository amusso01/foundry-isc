<?php
/**
 * @author Jontahan Soto 
*
* @package Foundry
*
*Template Name: insight
*Template Post Type: page
 */
$args = array( 
		'post_type' => 'post',
		'posts_per_page' => 6,
		) ;

$loop = new WP_Query( $args  );


get_header();

?>

<?php get_template_part('components/page/hero-carousel') ?>

<main role="main" class="site-main insight-main">
	<div class="row row-block latest-post">



<?php
			if ( $loop->have_posts() ): 
				while ( $loop->have_posts() ) : $loop->the_post(); setup_postdata( $post );
					
			  get_template_part( 'template-parts/content', 'insight-cat' ); 
  ?>
			
			

			<?php
						   endwhile; 
						wp_reset_postdata();
					endif;
		?>
	</div>	
	<!-- ADS Landscape -->
<?php 	
		if ( is_active_sidebar( 'ads-landscape' ) ) : ?>
			
			<div  class="widget-area ">
			<?php dynamic_sidebar( 'ads-landscape' ); ?>
			</div>
	
		<?php endif; ?>

		<div class="row row-block explore-cat">
			<h2 class="col-xs-12">Explore by category</h2>
		<?php
// Get the current queried object


// $term_id = ( isset( $term->term_id ) ) ? (int) $term->term_id : 0;

$categories = get_categories( array(
    'taxonomy'   => 'category', // Taxonomy to retrieve terms for. We want 'category'. Note that this parameter is default to 'category', so you can omit it
    'orderby'    => 'name',
	'parent'     => 0,
	'exclude'	 => '4299 , 4293, 4269, 4290,555',
    'hide_empty' => 1, // change to 1 to hide categores not having a single post
) );
?>


    <?php
	foreach ( $categories as $category ) 

	
    {
        $cat_ID        = (int) $category->term_id;
		$category_name = $category->name;

		$image = get_field('hero_image', $category->taxonomy . '_' . $category->term_id);


        if ( strtolower( $category_name ) != 'uncategorized' )
        {
?>
			<a class="col-xs-6 col-sm-3" href="<?php echo  get_category_link( $category->term_id ) ?>"><p  style="background-image:url(<?php echo $image ?>)"><span><?php echo $category_name ?></span></p></a>
          <?php   
        }
    }
    ?>



	</div>


	<div class="row row-block caseStudy">
		<?php
	$args = array( 'post_type' => 'post',
					'posts_per_page' => 1,
					'category_name' => 'case-studies',
						'tax_query'	=> array( 
								array(
								'taxonomy' => 'category',
								'field' => 'term_id',
								'terms' => '4292',
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
			
			<article class="case col-xs-12 col-md-10 col-md-offset-1 ">
				<a href="<?php echo get_the_permalink() ?>">
					<div class="case__inner">
						<div class="case__image" style="background-image:url(<?php echo $image; ?>);">
							<div class="case__body">
								<div class="case__body-header">
									<p class="tag"><span>case studies</span></p>
									<h2><?php echo get_the_title($post->ID); ?></h2>
									<p class="text-small"><?php echo get_the_excerpt(  ); ?></p>
									<div class="btn__wrapper"><a href="<?php echo get_the_permalink() ?>" class="btn">READ MORE</a></div>
								</div>
							</div>
						</div>
					</div>	
				</a>
			</article>

			<?php
						   endwhile; 
						wp_reset_postdata();
					endif;
		?>
	
	</div>

</main>

<?php
get_footer();
