<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
  $author = get_the_author();
?>


<?php get_template_part( 'components/page/hero-leader' ) ?>

<section class="expert-first">
	<div class="row row-block">
			<div class="col-xs-1"> </div>
			<div class="col-xs-10 col-sm-4 col-md-4">
				
				<?php if( have_rows('column_one') ): ?>
				    <?php while( have_rows('column_one') ): the_row();  $image = get_sub_field('logo'); ?>
				    		<div class="logo-space">
					    		<?php if($image){ ?>
					           	 	<img src="<?php echo esc_url( $image ); ?>" />

					    		<?php } ?>
					    	</div>
				            <h2><?php the_sub_field('tittle'); ?></h2>
				            <?php the_sub_field('information'); ?>
				    <?php endwhile; ?>
				<?php endif; ?>

			</div>
			<div class="col-xs-1"> </div>
			<div class="col-xs-10 col-sm-4 col-md-4">
				
				<?php if( have_rows('column_two') ): ?>
				    <?php while( have_rows('column_two') ): the_row();  $image = get_sub_field('logo'); ?>
				    		<div class="logo-space">
					    		<?php if($image){ ?>
					           	 	<img src="<?php echo esc_url( $image ); ?>" />

					    		<?php } ?>
					    	</div>
				            <h2><?php the_sub_field('tittle'); ?></h2>
				            <?php the_sub_field('information'); ?>
				    <?php endwhile; ?>
				<?php endif; ?>
				
			</div>
			<div class="col-xs-1"> </div>
	</div>

</section>


<section class="expert-blue">
	<div class="row row-block">
			<div class="col-xs-1"> </div>
			<div class="col-xs-10 col-sm-5 col-md-5">
				<h2>The results</h2>
				<?php the_field('the_results'); ?>

			</div>
			<div class="col-xs-1"> </div>
			<div class="col-xs-10 col-sm-3 col-md-3 score-column">
				
				<?php if( have_rows('results_scores') ): ?>
				    <?php while( have_rows('results_scores') ): the_row(); ?>
				    		
				            <h3><?php the_sub_field('title'); ?></h3>
				            <p><?php the_sub_field('description'); ?></p>
				    <?php endwhile; ?>
				<?php endif; ?>
				
			</div>
			<div class="col-xs-1"> </div>
	</div>

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
					<p><?php the_field('author_quote'); ?></p>

				</div>

				<div class="col-xs-1"></div>
				
			</div>

		</div>
	</section>
	<?php } ?>



<main role="main" class="site-main page-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(  ); ?>>

		<div class="entry-content">
			<div class="row row-block">
			<div class="col-xs-1">
				<?php get_template_part( 'components/page/share' ) ?>
			</div>
			<div class="col-xs-11 col-sm-6 col-md-6">

				
				<?php  the_content( ); ?>


			</div>

			<div class="col-xs-11 col-xs-offset-1 col-sm-4 col-md-4">
				<?php  if ( is_active_sidebar( 'ads-portrait' ) ) :  dynamic_sidebar( 'ads-portrait' );  endif; ?>
			</div>


			
		</div>
		</div><!-- .entry-content --> 

	</article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->


<?php get_template_part( 'components/carousel/case-studies-post-carousel' ) ?>