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

 ?>

	<section class="section hero-leader">
		<div class="hero-leader__content" style="<?php echo is_singular( 'leadership_team' ) ? '' : 'display: flex;
flex-direction: column;
justify-content: center;'?>">
			<p class="header-display"><?php echo is_singular( 'leadership_team' ) ? 'leadership team' : the_title(); ?></p>
			<h1><?php echo  is_page('consultancy') ? 'iSportConnect - A Digital Community' : the_title(); ?></h1>
			<p><?php echo $excerpt ?></p>
			<?php if (is_singular( 'leadership_team' )) : ?>
			<p><span>Role:</span> <?php echo $role ?></p>
			<?php endif; ?>
			<?php get_template_part( 'svg-template/svg', 'green-down-arrow' ); ?>
		</div>
		<?php if($bannerImage) :?>
		<img class="hero-leader__image img-fluid" src="<?php echo $bannerImage['url'] ?>" alt="<?php echo $bannerImage['alt'] ?>">
		<?php else :  ?>
			<img class="hero-leader__image img-fluid" src="<?php echo get_the_post_thumbnail_url( )?>">
		<?php endif; ?>
	</section>
