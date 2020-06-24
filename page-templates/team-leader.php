<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Team leader / Women in sport
*Template Post Type: leadership_team, women_sport
 */

get_header();


$post = get_post($post_id);

$previous_post = get_previous_post();
$next_post = get_next_post();
$right_post = $next_post == false ? $previous_post: $next_post;


$post_id = $right_post->ID;
$title = $right_post->post_title;
$role = get_field('member_role', $post_id);
$image =get_field('image', $post_id);
$url = get_the_permalink( $post_id );
$own = get_field('has_its_own_page', $postId);
?>

<?php get_template_part( 'components/page/hero-leader' ) ?>

<main role="main" class="site-main teamleader-main">
	<div class="row row-block">
		<div class="col-xs-1">
			<?php get_template_part( 'components/page/share' ) ?>
		</div>
		<div class="col-xs-11 col-sm-6 col-md-6">
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					the_content( );


				endwhile; // End of the loop.

			endif;
		?>
		</div>

		<div class="col-xs-11 col-xs-offset-1 col-sm-4 col-md-4">
		<?php 	
			if ( is_active_sidebar( 'ads-portrait' ) ) : ?>
			
			<div  class="widget-area ">
			<?php dynamic_sidebar( 'ads-portrait' ); ?>
			</div>
		
		<?php endif; ?>
		</div>
		<?php if($own) : ?>
		<div class="col-xs-11 col-xs-offset-1 col-sm-4 col-md-4">
			<a href="<?php echo $url ?>">
				<div class="leaderNext">
					<div class="leaderNext__image">
						<img class="img-fluid" src="<?php echo $image['sizes']['medium'] ?>" alt="Image of <?php echo $title ?>">
						<div class="slider slider__right slider__big">
							<?php get_template_part( 'svg-template/svg', 'chevron' ) ?>
						</div>
					</div>
					<div class="leaderNext__info">
						<p>UP NEXT</p>
						<h2><?php echo $title ?></h2>
						<p><?php echo $role ?></p>
					</div>
				</div>
			</a>
		</div>
		<?php endif; ?>
	</div>


</main>

<?php
get_footer();
