<?php
/**
 * Template part for simple member box
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
  $image = get_field('image',$post->ID);
	    	if( get_field('has_its_own_page')){
	    		$link = get_the_permalink( $post->ID );
	    	}else{
	    		$link = 'javascript:void(0);';
	    	}
?>

 <article class="card col-xs-12 col-sm-6 col-md-3 col-lg-3   ">
				<a href="<?php echo $link; ?>">
					<div class="card__inner">
						<div class="card__image">
							<img src="<?php echo $image['url']; ?>" alt="Picture of team">
						</div>
						<div class="card__body">
							<div class="card__body-header">
								<p class="tag">Meet the member</p>
								<h4>Meet: <?php echo get_the_title($post->ID); ?></h4>
								<p class="text-large"><?php echo get_field('member_role',$post->ID); ?></p>
							</div>
						</div>
					</div>	
				</a>
			</article>