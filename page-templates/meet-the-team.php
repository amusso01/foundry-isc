<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Meet the team
*Template Post Type: page
 */

$args = array(
	'post_type'     => 'leadership_team',
	'post_status'   => 'published',
);

$the_leader = new WP_Query( $args );

$members = get_field('team_members');

get_header();
?>

<?php get_template_part( 'components/page/hero-simple' ) ?>

<main role="main" class="site-main meet-the-team-main">

<section class="leadership content-block">
	<div class=" leadership-title">
		<h2>Leadership team</h2>
	</div>



	<?php 
		// The Loop
	if ( $the_leader->have_posts() ) :
		while ( $the_leader->have_posts() ) : $the_leader->the_post();
		$postId = $post->ID;
		$leaderIamge = get_the_post_thumbnail_url();
		$role = get_field('member_role' , $postId);
		?>
		
		<div class="leadership-card ">
			<a href="<?php the_permalink() ?>">
				<div class="leadership-card__inner">
					<div class="leadership-card__image">
						<img class="lozad img-fluid" data-src="<?php echo $leaderIamge ?>" alt="team leader at Isportconnect">
					</div>
					<div class="leadership-card__body">
						<p class="tag">leadership team</p>
						<h4><?php the_title() ?></h4>
						<p><?php echo $role?></p>
					</div>
				</div>
			</a>
		</div>

		<?php
		endwhile;
	endif;
	
	// Reset Post Data
	wp_reset_postdata();
	?>

	
</section>

<section class="team-members content-block">
	<div class=" team-members-title">
		<h2>UK office</h2>
	</div>
	<?php foreach($members as $member) :  ?>
	<div class="member">
		<div class="member-image" style="background-image:url('<?php echo $member['member_image'] ?>');">

		</div>
		<div class="member-body">
			<h4><?php echo $member['member_name'] ?></h4>
			<p><?php echo $member['member_role'] ?></p>
		</div>
	</div>
	<?php endforeach; ?>
</section>

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
