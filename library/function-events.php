<?php
/**
 *	Author: jonathan Soto
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */

// WordPress environment
require( dirname(__FILE__) . '/../../../../wp-load.php' );

global $post;
global $montEvent;



	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	if( $_POST['filter'] == 'no'){
				$args = array( 'post_type' => 'event',
					'posts_per_page' => 60,
					'meta_key'			=> 'start_date',
					'orderby'			=> 'meta_value',
					'order'				=> 'DESC',
			        'paged'          => $paged
				) ;
	}else{
		$pila = array( 'relation'		=> 'AND' );

				if($_POST['category'] != ''){
					$pila[] = array(
										'key'	 	=> 'category',
										'value'	  	=> $_POST['category'],
										'compare' 	=> 'IN',
									);
				}
				if($_POST['location'] != ''){
					$pila[] = array(
										'key'	 	=> 'location',
										'value'	  	=> $_POST['location'],
										'compare' 	=> 'IN',
									);
				}
 
				

				$args = array( 'post_type' => 'event',
						        'posts_per_page' => 60,
								'meta_key'			=> 'start_date',
								'orderby'			=> 'meta_value',
								'order'				=> 'DESC',
						        'paged'          => $paged,
								'meta_query'	=> array( $pila ), 
				) ;
	}

	if( $_POST['ser'] != ''){
		$args['s'] =   $_POST['ser'];
	}


			$loop = new WP_Query( $args  );
			if ( $loop->have_posts() ): $montEvent = ""; ?>

			<h4>Showing results (<?php echo $loop->post_count; ?>)</h4>
			<div class="white-line-box"></div>
			<?php

			    while ( $loop->have_posts() ) : $loop->the_post(); 
			    	$unixtimestamp = strtotime( get_field('start_date') );
				    if($montEvent !=  date_i18n( "F Y", $unixtimestamp )){

				        $montEvent =  date_i18n( "F Y", $unixtimestamp );
				        echo '<h3>'.$montEvent.'</h3>';
				    }

					get_template_part( 'template-parts/content', 'box-event' );
			   	endwhile; ?>
			    <nav class="pagination">
			        <?php pagination_bar( $loop  ); ?>
			    </nav>
			<?php wp_reset_postdata();
			endif;
		
