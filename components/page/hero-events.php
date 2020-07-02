<?php
/**
 * Page Hero image and title
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$banner_title = get_field('banner_title');
$banner_text = get_field('banner_text');

?>


<section class="section hero-events" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>);" >
	  	<video autoplay >
			  <source src="<?php echo get_template_directory_uri(); ?>/dist/video/ISC-temp-video.mp4" type="video/mp4">
		</video> 

		<div class="filter-video"></div>
 

    <div class="event__text">
        <h1><?php echo $banner_title ?></h1>
        <p><?php echo $banner_text; ?></p>
        <div class="btn__wrapper"><a href="<?php echo get_the_permalink(110840); ?>" class="btn">Find Events</a></div>
    </div>

</section>