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
    
    <div class="event__text">
        <h1><?php echo $banner_title ?></h1>
        <p><?php echo $banner_text; ?></p>
        <div class="btn__wrapper"><a href="#" class="btn">Find Events</a></div>
    </div>

</section>