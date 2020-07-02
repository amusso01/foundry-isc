<?php
/**
 * @author Jontahan Soto 
*
* @package Foundry
*
*Template Name: Ranking List
*Template Post Type: page
 */


get_header();

?>

<?php get_template_part( 'components/page/hero-leader' ) ?>

<main role="main" class="site-main women-main">

	<section class="women__cards row row-block">
	<?php 
		// The Loop
	if( have_rows('members') ):
		 while ( have_rows('members') ) : the_row();
		 	$member = get_sub_field('member');
			$postId = $member->ID;
			$womanImage = get_the_post_thumbnail_url( $postId );
			$role = get_field('member_role' , $postId);
			$own_page = get_field('has_its_own_page', $postId);
			?>
			<div class="col-xs-12 col-md-6">
				<?php echo $own_page ? '<a href="'. get_the_permalink($postId).'">' : ' ' ?>
				<div class="profile-card <?php echo $own_page ? '' : 'no-hover'; ?>">
					<div class="profile-card__image">
						<img class="lozad" data-src="<?php echo $womanImage ?>" alt="woman in sport image">
						<?php if($own_page) : ?>
						<div class="slider slider__right slider__big	">
							<?php get_template_part( 'svg-template/svg', 'chevron' ) ?>
						</div>
						<?php endif; ?>
					</div>
					<div class="profile-card__body">
						<h4><?php the_title() ?></h4>
						<p><?php echo $role?></p>
					</div>
				</div>
				<?php echo $own_page ? '</a>' : ' ' ?>
			</div>

		<?php
		endwhile;
	endif;
	
	// Reset Post Data
	wp_reset_postdata();
	?>
	</section>

	<div class="content-block">
	
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					the_content( );

				endwhile; // End of the loop.

			endif;
		?>
				
	</div>

</main>

<?php
get_footer();
