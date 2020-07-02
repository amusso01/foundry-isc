<?php
/**
 * Page Hero leader
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$excerpt = get_field('banner_intro');
 if(!$excerpt){
	 $excerpt = get_the_excerpt(); 
 }
 $role = get_field('member_role');
 $bannerImage = get_field('image');
 $company = get_field('company');

	$catRnking = get_the_terms( get_the_ID(), 'ranking_categorie' );
	$listTags = "";
	if( $terms ): 
		foreach( $terms as $term ):
									$listTags .= ' <span>'.esc_html( $term->name ).'</span>';
		endforeach;
	endif; 

 ?>

	<section class="section hero-leader">
		<div class="hero-leader__content" style="<?php echo is_singular( 'leadership_team' ) ? '' : 'display: flex;
flex-direction: column;
justify-content: center;'?>">
			<p class="header-display"></p>
			<h1><?php echo  is_page('consultancy') ? 'iSportConnect - A Digital Community' : the_title(); ?></h1>
			<p><?php echo $excerpt ?></p>
			<?php if($role){ ?>
				<p><span>Role:</span> <?php echo $role ?></p>
			<?php } ?>
			<?php if($company){ ?>
				<p><span>Company:</span> <?php echo $company ?></p>
			<?php } ?>
			<?php get_template_part( 'svg-template/svg', 'green-down-arrow' ); ?>
		</div>
		<?php if($bannerImage) :?>
		<img class="hero-leader__image img-fluid" src="<?php echo $bannerImage['url'] ?>" alt="<?php echo $bannerImage['alt'] ?>">
		<?php else :  ?>
			<img class="hero-leader__image img-fluid" src="<?php echo get_the_post_thumbnail_url( )?>">
		<?php endif; ?>
	</section>
