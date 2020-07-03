<?php
/**
 * Template part for simple member box
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */

 $term = get_the_category( $post->ID );

 
?>

 <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
	<a href="<?php echo get_the_permalink(  ) ?>">
		<div class="card__inner">
			<div class="card__image" style="background-image:url(<?php echo get_the_post_thumbnail_url(  null , 'full') ?>)"> 
				
			</div>
			<div class="card__body">
				<div class="card__body-header">
					<p class="tag"><?php echo $term[0]->name ?></p>
					<h4><?php echo get_the_title($post->ID); ?></h4>
				</div>
			</div>
		</div>	
	</a>
</article>