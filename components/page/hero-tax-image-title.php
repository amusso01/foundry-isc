<?php
/**
 * Page Hero image and title
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$tax = $wp_query->get_queried_object();
$intro = get_field('banner_intro'); 
$image = get_the_post_thumbnail_url( );
?>

<section class="section hero-image-title " >
    <div class="title content-block">
        <h1><?php echo $tax->name; ?></h1>
        <p><?php echo term_description( );  ?></p>
    </div>
    <div class="bg-image" style="background-image:url(<?php echo get_field('hero_image', $tax) ?>);">

    </div>
</section>