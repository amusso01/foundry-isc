<?php
/**
 *  Template part for displaying results in post
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/
$tax = $wp_query->get_queried_object();
?>


<main role="main" class="site-main category-main">
	<div class="row row-block">

				<?php 
				if( isset($_GET['active']) ){
					$slugtax = $_GET['active'];
				}else{
					$slugtax = $tax->slug;
				}

				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args = array( 'post_type' => 'post',
					'posts_per_page' => 12,
					'paged' => $paged,
					'category_name' => $slugtax,
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
					
			  get_template_part( 'template-parts/content', 'insight-cat' ); 
  ?>
			
			

			<?php
						   endwhile; 
						   echo foundry_pagination($loop);
						wp_reset_postdata();
					endif;
		?>

	</div>
	
		

</main>
