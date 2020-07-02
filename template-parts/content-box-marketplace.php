<?php
/**
 *  Template part for displaying results in market list
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/

	$terms = get_the_terms( get_the_ID(), 'marketplace_categorie' );
	if( $terms ): 
		foreach( $terms as $term ):
					$postCat= $term;
		endforeach;
	endif;

	$terms = get_the_terms( get_the_ID(), 'marketplace_location' );
	if( $terms ): 
		foreach( $terms as $term ):
					$location = $term;
		endforeach;
	endif;

	$terms = get_the_terms( get_the_ID(), 'marketplace_tags' );
	$listTags = "";
	if( $terms ): 
		foreach( $terms as $term ):
					$listTags .= ' <a href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a>,';
		endforeach;
	endif; 

	if( get_the_post_thumbnail_url() ){
		$back =get_the_post_thumbnail_url();
	}else{
		$back =  get_template_directory_uri().'/dist/images/logo-header.svg';
	}
?>

	<div class="box-marketplace">
		<div class="flag-box">
			<p class="tag"><?php echo $postCat->name; ?></p>
			<?php if( get_field('feathured_post')  ){ echo '<p class="tag tag-black">FEATURED</p>'; } ?>
			
		</div>

		<div class="row">
			<div class="column-title">
				<a href="<?php echo get_the_permalink(); ?>"><h4 class="box-title"><?php echo wp_trim_words( get_the_title(), 6 ); ?></h4></a>
				<a href="<?php echo get_the_permalink(); ?>"><p><strong><?php echo get_field('company_name'); ?></strong></p></a>
			</div>
			<div class="column-logo">
				<a href="<?php echo get_the_permalink(); ?>"><div class="company-logo-box" style="background-image: url(<?php echo $back ; ?>) ;"></div></a>
			</div>
		</div>

		
		<a href="<?php echo get_the_permalink(); ?>">
			<p class="box-excerpt">
				<?php if(get_field('front_excerpt')){
						echo get_field('front_excerpt'); 
					}else{
									echo wp_trim_words( get_the_content(), 40 );
					}
				?>
					
			</p>
		</a>
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