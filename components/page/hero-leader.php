<?php
/**
 * Page Hero leader
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

 $excerpt = get_the_excerpt();
 $role = get_field('member_role');
 $bannerImage = get_field('image');
 ?>

	<section class="section hero-leader">
		<div class="hero-leader__content">
			<p class="header-display">leadership team</p>
			<h1><?php the_title(); ?></h1>
			<p><?php echo $excerpt ?></p>
			<p><span>Role:</span> <?php echo $role ?></p>
			<?php get_template_part( 'svg-template/svg', 'green-down-arrow' ) ?>
		</div>
		<img class="hero-leader__image img-fluid" src="<?php echo $bannerImage['url'] ?>" alt="<?php echo $bannerImage['alt'] ?>">
	</section>
