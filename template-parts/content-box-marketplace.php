<?php
/**
 *  Template part for displaying results in market list
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/

	$postCat = get_field( 'type' );
	$location = get_field('location');

	$terms = get_field('tags_marketplace');
	$listTags = "";
	if( $terms ): 
		foreach( $terms as $term ):
					$listTags .= ' <a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>,';
		endforeach;
	endif; 
?>

	<div class="box-marketplace">
		<div class="flag-box">
			<p class="tag"><?php echo $postCat->name; ?></p>
			<?php if( get_field('feathured_post')  ){ echo '<p class="tag tag-black">FEATHURED</p>'; } ?>
			
		</div>

		<div class="row">
			<div class="column-title">
				<a href="<?php echo get_the_permalink(); ?>"><h4 class="box-title"><?php the_title(); ?></h4></a>
				<a href="<?php echo get_the_permalink(); ?>"><p><strong><?php echo get_field('company_name'); ?></strong></p></a>
			</div>
			<div class="column-logo">
				<a href="<?php echo get_the_permalink(); ?>"><div class="company-logo-box" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>) ;"></div></a>
			</div>
		</div>

		
		<a href="<?php echo get_the_permalink(); ?>"><p class="box-excerpt"><?php echo get_field('front_excerpt'); ?></p></a>
		<div class="line-box"></div>

		<div class="more-info-box">
			<?php if( $location ){
				 echo '<p><strong>Location:</strong> ';
				 if( get_field('city') ){
				 	echo get_field('city').', ';
				 }
				 echo $location->name.'</p>'; } ?>
			<p><strong>Posted: </strong><?php echo get_the_date( 'j F, Y' ); ?></p>
			<p><strong>Tags: </strong> <?php echo  rtrim($listTags, ","); ?></p>
		</div>
	</div>