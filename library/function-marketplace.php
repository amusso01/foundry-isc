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



$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if( $_POST['filter'] == 'no'){
	$args = array( 'post_type' => 'marketplaces',
			        'posts_per_page' => 60,
			        'paged'          => $paged
				) ;

}else{

	$pila = array( 'relation'		=> 'AND' );

	if($_POST['type'] != ''){
		$pila[] = array(
							'taxonomy' => 'marketplace_categorie',
			                'field' => 'term_id',
			                'terms' => $_POST['type'],

						);
	}
	if($_POST['location'] != ''){
		$pila[] = array(
							'taxonomy' 	=> 'marketplace_location',
			                'field' => 'term_id',
							'terms'	  	=> $_POST['location'],
						);
	}
	if($_POST['tag'] != ''){
		$pila[] = array(
							'taxonomy' 	=> 'marketplace_tags',
			                'field' => 'term_id',
							'terms'	  	=> $_POST['tag'],
						);
		
	}

	

	$args = array( 'post_type' => 'marketplaces',
			        'posts_per_page' => 60,
			        'paged'          => $paged,
					'tax_query'	=> array( $pila ), 
				) ;

		

}

	if( $_POST['ser'] != ''){
		$args['s'] =   $_POST['ser'];
	}


			$loop = new WP_Query( $args  );
			if ( $loop->have_posts() ): ?>

			<h4>Showing results (<?php echo $loop->post_count; ?>)</h4>
			<div class="white-line-box"></div>
			<?php
			    while ( $loop->have_posts() ) : $loop->the_post(); 

					get_template_part( 'template-parts/content', 'box-marketplace' );
			   	endwhile; ?>
			    <nav class="pagination">
			        <?php pagination_bar( $loop  ); ?>
			    </nav>
			<?php wp_reset_postdata();
			endif;
		
