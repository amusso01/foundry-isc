<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Special
*Template Post Type: page
 */
$tax = $wp_query->get_queried_object();
dd($tax);
get_header();


?>
<?php get_template_part( 'components/page/hero-image-title' ) ?>

<main role="main" class="site-main special-main">

<div class="row row-block">


<article class="case col-xs-12 col-md-10 col-md-offset-1 ">
<a href="<?php echo get_the_permalink() ?>">
	<div class="case__inner">
		<div class="case__image" style="background-image:url(<?php echo $image; ?>);">
			<div class="case__body">
				<div class="case__body-header">
					<p class="tag"><span><?php echo $tax->name; ?></span></p>
					<h2><?php echo get_the_title($post->ID); ?></h2>
					<p class="text-small"><?php echo get_the_excerpt(  ); ?></p>
					<div class="btn__wrapper"><a href="<?php echo get_the_permalink() ?>" class="btn">READ MORE</a></div>
				</div>
			</div>
		</div>
	</div>	
</a>
</article>

</div>


</main>

<?php
get_footer();
