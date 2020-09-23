<?php
/**
 * The template for displaying frontpage by default
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

get_header();
?>



<main class="main homepage-main" role="main">

	<?php
	if( !is_user_logged_in() ){ 
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post(); 
				get_template_part('components/front/carousel');
				get_template_part( 'components/front/dark_section' );

			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
	}else{ ?>

		<div class="row status-community">
		<div class="col-md-3"><?php get_template_part( 'template-parts/content', 'user-sidebar' ); ?></div>
			<div class="col-md-9" style="background-color: #EEF2F4;">
				<?php  get_template_part( 'template-parts/content', 'user-info-home' );  ?>
			</div>
		</div> 
	<?php } ?>

</main>

<?php get_footer(); ?>
