<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Consultancy
*Template Post Type: page
 */


 $pillars = get_field('strategic_pillars');
 $clients = get_field('our_clients');
 

get_header();

?>

<?php get_template_part( 'components/page/hero-leader' ) ?>

<main role="main" class="site-main consultancy-main">
	<div class="row row-block">
	
		<div class="consultancy-editor  col-xs-12 col-sm-10  col-sm-offset-1">
			<?php 
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();

						the_content( );

					endwhile; // End of the loop.

				endif;
			?>

			<section class="strategic-pillars">
				<div class="row row-block">	
					<?php foreach($pillars as $pillar) : ?>	
						<div class="col-xs-12 col-sm-6 pillar">
							<div class="pillar__header">
								<h4><?php echo $pillar['strategy_title'] ?> <span><?php echo acfFile_toSvg($pillar['strategy_icon']) ?></span> </h4>
								<div class="pillar__line-green"></div>

							</div>
							<div class="pillar__body">
								<p><?php echo $pillar['strategy_text'] ?></p>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</section>
			
		</div>
	
	</div>


	<section class="consultancy-numbers content-block">
		<div class="row row-block">
			<div class="col-xs-12 col-sm-6 numbers__column numbers__text">
				<div class="numbers__header">
					<h2>iSportConnect <br> Consultancy</h2>
					<div class="number__line-green"></div>
				</div>
				<div class="numbers__body">
					<p><strong>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</strong></p>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 numbers__column numbers__rolling">
				<div class="numbers__cell">
					<p class="numbers__big">24</p>
					<p class="numbers__relative">Global Clients</p>
				</div>
				<div class="numbers__cell">
					<p class="numbers__big">28</p>
					<p class="numbers__relative">Global Clients</p>
				</div>
				<div class="numbers__cell">
					<p class="numbers__big">100%</p>
					<p class="numbers__relative">Global Clients</p>
				</div>
				<div class="numbers__cell">
					<p class="numbers__big">82+</p>
					<p class="numbers__relative">Global Clients</p>
				</div>
				<div class="numbers__cell">
					<p class="numbers__big">80+</p>
					<p class="numbers__relative">Global Clients</p>
				</div>
				<div class="numbers__cell">
					<p class="numbers__big">500+</p>
					<p class="numbers__relative">qualified introductions based on market intelligence</p>
				</div>
				<div class="numbers__cell">
					<p class="numbers__big">100+</p>
					<p class="numbers__relative">Global Clients</p>
				</div>
				<div class="numbers__cell">
					<p class="numbers__big">24+</p>
					<p class="numbers__relative">Global Clients</p>
				</div>
			</div>
		</div>
	</section>

	<section class="consultancy__clients">
		<div class="row row-block ">
			<div class="col-xs-12"><h2>Clients</h2></div>
			<?php foreach($clients as $client):  ?>
			<div class="col-xs-6 col-sm-4 col-md-3 client__logo	">
				<img src="<?php echo $client['client_logo']?>" alt="client logo">
			</div>			
			<?php endforeach; ?>
		</div>
	</section>

	<section class="row row-block consultancy-video-section">
	<div class="col-xs-12">
        <h2>Testimonials</h2>
    </div>
	<?php get_template_part( 'components/page/video-loop' ) ?>
	<?php get_template_part( 'components/carousel/testimonial-carousel' ) ?>
	</section>
	


</main>

<?php
get_footer();
