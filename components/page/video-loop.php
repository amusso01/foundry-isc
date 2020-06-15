<?php
/**
 * Video loop
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$args = array(
	'post_type'     => 'videos',
	'post_status'   => 'published',
);
$videos = new WP_Query( $args );
?>

<?php 
		// The Loop
	if ( $videos->have_posts() ) :
		while ( $videos->have_posts() ) : $videos->the_post();
		?>
		
		<article class="video-loop col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
		    <a href="<?php  the_permalink()?>">
		    	<div class="video-loop__inner" style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>')">
				
			    </div>	
		    </a>
        </article>

		<?php
		endwhile;
	endif;
	
	// Reset Post Data
	wp_reset_postdata();
	?>

