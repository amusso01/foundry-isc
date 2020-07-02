<?php
/**
 * Template part for simple member box
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
	    	if(  get_the_post_thumbnail_url() ){
  				$image = get_the_post_thumbnail_url(  );
	    	}else{
  				$image =  get_template_directory_uri().'/dist/images/iSC.jpg';
	    	}
	    	$tax = $wp_query->get_queried_object();
?>

 			<article class="card col-xs-12 col-sm-6 col-md-3 col-lg-3   ">
				<a href="<?php echo $link; ?>">
					<div class="card__inner">
						<div class="card__image">
							<img src="<?php echo $image; ?>" alt=" <?php echo get_the_title($post->ID); ?>">
						</div>
						<div class="card__body">
							<div class="card__body-header">
								<p class="tags-list"><span><?php echo $tax->name; ?></span></p>
								<h4><?php echo get_the_title($post->ID); ?></h4>
							</div>
						</div>
					</div>	
				</a>
			</article>