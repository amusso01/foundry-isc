<?php
/**
 * Page Hero carousel
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$carousel = get_field('banner_posts');


 ?>
 



	<section class="section hero_carousel">

		<div class="hero_carousel-swiper">
			<!-- Swiper -->
			<div id="swiperBanner" class="swiper-container banner-swiper">
				<div class="swiper-wrapper">

					<?php foreach($carousel as $article) : ?>
						<div class="swiper-slide" >
							<div class="hero-carousel__content">
								<div class="hero-carousel__content-inner">	
								<?php
								$term = get_the_category( $article->ID ) ;?>
								<div class="tag__wrapper">
								<?php foreach($term as $key => $cat) :?>

								
									<p class="tag <?php echo $key !== 0 ? 'tag-light' : '' ?>"><?php echo $cat->name?></p>
								
								<?php endforeach; ?>
								</div>
								<h2><?php echo $article->post_title ?></h2>
								
								<div class="btn__wrapper"><a href="<?php echo get_the_permalink($article->ID) ?>" class="btn">READ INSIGHT</a></div>
								</div>
							</div>
							<div class="hero-carousel__image" style="background-image:url(<?php echo get_the_post_thumbnail_url( $article->ID , 'full' ) ?>)" >
									
									<div class="carousel-mobile">
										<div class="hero-carousel__content-inner-mobile">	
										<?php
										$term = get_the_category( $article->ID ) ;?>
										<div class="tag__wrapper">
										<?php foreach($term as $key => $cat) :?>

										
											<p class="tag <?php echo $key !== 0 ? 'tag-light' : '' ?>"><?php echo $cat->name?></p>
										
										<?php endforeach; ?>
										</div>
										<h2><?php echo $article->post_title ?></h2>
										
										<div class="btn__wrapper"><a href="<?php echo get_the_permalink($article->ID) ?>" class="btn">READ INSIGHT</a></div>
										</div>
									</div>

							</div>
						</div>

					
					<?php endforeach; ?>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
				<!-- Add Arrows -->
				<div class="arrow-container">
					<div class="swiper-button-prev slider  slider__left"> <?php get_template_part( 'svg-template/svg', 'chevron' ) ?></div>
					<div class="swiper-button-next slider slider__right">	<?php get_template_part( 'svg-template/svg', 'chevron' ) ?></div>
				</div>
			</div>


		</div>
		
	
	</section>
