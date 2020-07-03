<?php
/**
 * @author Jonathan Soto
*
* @package Foundry
*
*Template Name: Single Marketplace
*Template Post Type: marketplace
 */

get_header();
$category = get_field('category');
$event_tags = get_field('event_tags');
$eventCta = get_field('event_cta');

?>

<?php get_template_part( 'components/page/hero-image-title-post-btn' ) ?>

<main role="main" class="site-main  single-event-main">
	<div class="row row-block">
		<div class="col-xs-1">
			<?php get_template_part( 'components/page/share' ) ?>
		</div>
		<div class="col-xs-11 col-sm-10 col-md-10 content-event">
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					the_content( );

				endwhile; // End of the loop.

			endif;
		?>
		<br>
		<?php if( $eventCta ){ ?>

			<a href="<?php echo $eventCta['url'] ?>" class="btn" id="countdown-cta"><?php echo $eventCta['title'] ?></a>

		<?php } ?>

		</div>

		<div class="col-xs-1"></div>
		
	</div>

	<?php if( get_field('video') ){ ?>
	<section class="blue-section">

		<div class="row row-block">
		<div class="col-xs-1"></div>
		<div class="col-xs-11 col-sm-10 col-md-10 box-guest">

			<div class="row center-xs between-sm around-md between-lg">
			
		
				<?php the_field('video'); ?>
		
			</div>		

		</div>

		<div class="col-xs-1"></div>
		
	</section>
	<?php } ?>

	<h3>Guest Speakers</h3>
	<section class="blue-section">

		<div class="row row-block">
		<div class="col-xs-1"></div>
		<div class="col-xs-11 col-sm-10 col-md-10 box-guest">

			<div class="row center-xs between-sm around-md">
			
		
				<?php
				if( have_rows('guest_speakers') ):
					while ( have_rows('guest_speakers') ) : the_row(); ?>

						<div class="speaker-card" style="background-image: url(<?php echo get_sub_field('image'); ?>); margin-bottom:30px;">
				
							<p><?php echo get_sub_field('name'); ?></p>
							<p class="text-small"><?php echo get_sub_field('description'); ?></p>
							
							<?php if( get_sub_field('card_logo') ){ ?>
								<div class="speaker-card__logo">
									<img src="<?php echo get_sub_field('card_logo'); ?>">
								</div>

							<?php } ?>
							
						</div>

				<?php

					endwhile;
				endif;
				?>
		
			</div>		

		</div>

		<div class="col-xs-1"></div>
		
	</section>

	<section class="more-information">
		<div class="row row-block">
			<div class="col-xs-1"></div>
			<div class="col-xs-11 col-sm-4 col-md-4 ">
				<h4>The Agenda</h4>
				<?php  the_field('the_agenda'); ?>
				<?php if(get_field('agenda_pdf') ){ echo '<a href="'. get_field('agenda_pdf').'" target="_blank" class="btn">Download full agenda</a>'; } ?>
			</div>
			<div class="col-xs-1"></div>
			<div class="col-xs-11 col-sm-4 col-md-4">
				<h4>The Location</h4>
				<?php  the_field('the_location'); ?>

				<?php if(get_field('view_map_link') ){ echo '<a href="'. get_field('view_map_link').'" target="_blank" class="btn">Show on map</a>'; } ?>

			</div>

			<div class="col-xs-1"></div>
		
		</div>

	</section>


	<section class="consultancy__clients">
		<div class="row row-block ">
			<div class="col-xs-12"><h2>Partners</h2></div>

			<?php
				if( have_rows('partners') ):
					while ( have_rows('partners') ) : the_row(); ?>

					    	<div class="col-xs-6 col-sm-4 col-md-3 client__logo	">
								<img src="<?php echo get_sub_field('logo'); ?>" alt="client logo">
							</div>		
			<?php
					endwhile;
				endif;
			?>



					
	</section>

	<?php if( get_field('quote') ){ ?>

	<section class="quote-box">	
		<div class="quote-box-cell">
			<div class="row row-block">
				<div class="col-xs-1">
				</div>
				<div class="col-xs-1">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/quote-mark.svg" />
				</div>
				<div class="col-xs-11 col-sm-9 col-md-9">
					<h3><?php the_field('quote'); ?></h3>
					<p><?php the_field('quote_author'); ?></p>

				</div>

				<div class="col-xs-1"></div>
				
			</div>

		</div>
	</section>
	<?php } ?>





	<section class="extra-details">
		<div class="row row-block">
			<div class="col-xs-1">

			</div>
			<div class="col-xs-11 col-sm-6 col-md-6">
			
					<?php the_field('extra_content'); ?>
			</div>

			<div class="col-xs-11 col-xs-offset-1 col-sm-4 col-md-4">
						
				<div class="widget-area ">
					<div class="sidebar_marketblace">
						<h3>Details<br></h3>
						<p><strong>Start Date</strong><br><?php echo get_field('start_date'); ?></p>					
						<p><strong>End Date</strong><br><?php echo get_field('end_date'); ?></p>
						<p><strong>Event Category</strong><br><?php echo $category->name; ?></p>
						<p class="tags-list"><strong>Tags</strong><br>
							<?php foreach ($event_tags as $value) { ?>
								<span><?php echo  $value->name; ?></span>
							<?php } ?>
							    
						</p>
					</div>
				</div>
			
			</div>
			
		</div>
	</section>


	
	<?php get_template_part( 'components/page/tab-ticket' ) ?>
	
	<?php get_template_part( 'components/carousel/full-carousel' ) ?>


	<?php 	
		if ( is_active_sidebar( 'ads-landscape' ) ) : ?>
			
			<div  class="widget-area ">
			<?php dynamic_sidebar( 'ads-landscape' ); ?>
			</div>
	
		<?php endif; ?>


	<?php get_template_part( 'components/page/countdown' ) ?>
</main>
<?php
get_footer();
