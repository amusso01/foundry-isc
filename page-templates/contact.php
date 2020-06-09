<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Contact Page
*Template Post Type: page
 */

$ukCards= get_field('uk_contact_card');
$indiaCards= get_field('india_contact_card');
$info= get_field('general_information');

get_header();
?>

<?php get_template_part( 'components/page/hero-simple' ) ?>

<main role="main" class="site-main contact-main">

	<div class="contact-cards row row-block">
		<article class="contact-card contact-card__uk col-xs-12 col-sm-6">
			<div class="contact-card__inner ">
				<div class="contact-card__image">
					<img class="img-fluid" src="<?php echo $ukCards['uk_picture']?>" alt="UK headquarter">
				</div>
				<div class="contact-card__address">
					<p class="h2">UK</p>
					<p><?php echo $ukCards['uk__address'] ?></p>
					<div class="btn__wrapper">
						<a href="<?php echo $ukCards['uk_google_map_url'] ?>" target='_blank' rel="noopener noreferrer" class="btn">View on map</a>
					</div>
				</div>
			</div>
		</article>
		<article class="contact-card contact-card__india col-xs 12 col-sm-6 ">
			<div class="contact-card__inner">
				<div class="contact-card__image">
					<img  class="img-fluid"  src="<?php echo $indiaCards['india_picture']?>" alt="UK headquarter">
				</div>
				<div class="contact-card__address">
					<p class="h2">India</p>
					<p><?php echo $indiaCards['india_address'] ?></p>
					<div class="btn__wrapper">
						<a href="<?php echo $indiaCards['india_google_map_url'] ?>" target='_blank' rel="noopener noreferrer" class="btn">View on map</a>
					</div>
				</div>
			</div>
		</article>

		<section class="contact-information col-xs-12">
			<h2>Contact information</h2>
			<div class="contact-information__inner">
				<div class="info-single">
					<p>telephone</p>
					<p><?php echo $info['telephone'] ?></p>
				</div>
				<div class="info-single">
					<p>Contact</p>
					<p><a href="mailto:<?php echo $info['contact_email'] ?>"><?php echo $info['contact_email'] ?></a></p>
				</div>
				<div class="info-single">
					<p>All press releases</p>
					<p><a href="mailto:<?php echo $info['all_press_releases_email'] ?>"><?php echo $info['all_press_releases_email'] ?></a></p>
				</div>
				<div class="info-single">
					<p>Sponsorship & Partnership</p>
					<p><a href="mailto:<?php echo $info['sponsorship_&_partnership_email'] ?>"><?php echo $info['sponsorship_&_partnership_email'] ?></a></p>
				</div>
			</div>
		</section>
	</div>

	<div class="content-block contact-main__inner">


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
	</div>
</main>

<?php

get_footer();
