<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Meet the members
*Template Post Type: page
 */


get_header();
?>

<?php get_template_part( 'components/page/hero-image-title' ) ?>

<main role="main" class="site-main meet-the-members-main">

<div class="row row-block">
    <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Meet: Andrea Musso</h4>
						<p class="text-large">Web developer at Foundry Digital</p>
					</div>
				</div>
			</div>	
		</a>
	</article>
    <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Meet: Andrea Musso</h4>
						<p class="text-large">Web developer at Foundry Digital</p>
					</div>
				</div>
			</div>	
		</a>
	</article>
    <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Meet: Andrea Musso</h4>
						<p class="text-large">Web developer at Foundry Digital</p>
					</div>
				</div>
			</div>	
		</a>
	</article>
    <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Meet: Andrea Musso</h4>
						<p class="text-large">Web developer at Foundry Digital</p>
					</div>
				</div>
			</div>	
		</a>
	</article>
    <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3  col-lg-3 ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Meet: Andrea Musso</h4>
						<p class="text-large">Web developer at Foundry Digital</p>
					</div>
				</div>
			</div>	
		</a>
	</article>
    <article class="card col-xs-12 col-sm-6 col-md-4 col-lg-3   ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Meet: Andrea Musso</h4>
						<p class="text-large">Web developer at Foundry Digital</p>
					</div>
				</div>
			</div>	
		</a>
	</article>
</div>




<?php 
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		the_content( );


	endwhile; // End of the loop.

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main>

<?php
get_footer();
