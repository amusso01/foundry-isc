<?php
/**
 * Page Hero image and title
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$tax = $wp_query->get_queried_object();
	$args = array( 'post_type' => 'post',
					'category_name'        => $tax->slug,
			        'orderby'          => 'date',
			        'order'            => 'DESC',
			        'posts_per_page' => 1,
			        'meta_query'	=> array(
																				array(
																					'key'	  	=> 'featured',
																					'value'	  	=> '1',
																					'compare' 	=> '=',
																				)
																        	)
				) ;

	$loop = new WP_Query( $args  );
			if ( $loop->have_posts() ): 

				 while ( $loop->have_posts() ) : $loop->the_post(); 
				 	if( get_the_post_thumbnail_url() ){
					$back =get_the_post_thumbnail_url(get_the_ID(),'full');
				}else{
					$back =  get_template_directory_uri().'/dist/images/event-hero.jpg';
				}

?>

				<section class="section hero-image-title post-head-cat" >
				    <div class="title content-block">
				    	<p class="tags-list"><span><?php echo $tax->name; ?></span></p>
				        <h1> <?php echo wp_trim_words( get_the_title(), 15 );  ?></h1>
				        <p><?php echo wp_trim_words( get_the_content(), 15 );  ?></p>
				        <p><a href="<?php echo get_the_permalink(); ?>" class="btn">read <?php echo  $tax->name; ?></a></p>
				    </div>
				    <div class="bg-image" style="background-image:url(<?php echo $back; ?>);">

				    </div>
				</section>


<?php
				endwhile; 

			else:

				$args = array( 'post_type' => 'post',
					'category_name'        => $tax->slug,
			        'posts_per_page' => 1,
			        'orderby'          => 'date',
			        'order'            => 'DESC',
			        
				) ;

				$loop = new WP_Query( $args  );
						if ( $loop->have_posts() ): 

							 while ( $loop->have_posts() ) : $loop->the_post(); 
							 	if( get_the_post_thumbnail_url() ){
									$back =get_the_post_thumbnail_url(get_the_ID(),'full');
								}else{
									$back =  get_template_directory_uri().'/dist/images/event-hero.jpg';
								}

			?>

									<section class="section hero-image-title post-head-cat" >
									    <div class="title content-block">
									    	<p class="tags-list"><span><?php echo $tax->name; ?></span></p>
									        <h1> <?php echo wp_trim_words( get_the_title(), 15 );  ?></h1>
									        <p><?php echo wp_trim_words( get_the_content(), 15 );  ?></p>
									        <p><a href="<?php echo get_the_permalink(); ?>" class="btn">read <?php echo  $tax->name; ?></a></p>
									    </div>
									    <div class="bg-image" style="background-image:url(<?php echo $back; ?>);">

									    </div>
									</section>


			<?php
								endwhile; 
							endif;
			endif;
?>