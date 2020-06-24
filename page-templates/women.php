<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Women in sport
*Template Post Type: page
 */





$args = array(
	'post_type'     => 'women_sport',
	'post_status'   => 'published',
	'posts_per_page' => -1,
);

$the_women = new WP_Query( $args );
 

get_header();

?>

<?php get_template_part( 'components/page/hero-leader' ) ?>

<main role="main" class="site-main women-main">

	<section class="women__cards row row-block">
	<?php 
		// The Loop
	if ( $the_women->have_posts() ) :
		while ( $the_women->have_posts() ) : $the_women->the_post();
		$postId = $post->ID;
		$womanImage = get_the_post_thumbnail_url();
		$role = get_field('member_role' , $postId);
		$own_page = get_field('has_its_own_page', $postId);
		?>
		<div class="col-xs-12 col-md-6">
			<?php echo $own_page ? '<a href="'. get_the_permalink().'">' : ' ' ?>
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
